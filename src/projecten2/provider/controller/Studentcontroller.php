<?php

namespace projecten2\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use SoapClient;

class StudentController implements ControllerProviderInterface {
var $loginStudent;

    public function connect(Application $app) {
    	
        $controllers = $app['controllers_factory'];
		//homepagina studenten
        $controllers->get('/', array($this, 'Home'))
					->before(array($this, 'checkLogin'));
		$controllers->post('/', array($this, 'Save_home'))
					->before(array($this, 'checkLogin'));	
		//delete ISP_aanvraag						
		$controllers->get('/isp_aanvraag/delete', array($this, 'DeleteISP'))
					->before(array($this, 'checkLogin'));
		//loginpagina's			
		$controllers->get('/login', array($this, 'Login'));
		$controllers->post('/login', array($this, 'inloggen'));
		//Vakken aanduiden
		$controllers->get('/vakken', array($this, 'Vakken'))
					->before(array($this, 'checkLogin'));	
		$controllers->post('/vakken', array($this, 'Save'))
					->before(array($this, 'checkLogin'));	
		//isp opstellen
		$controllers->get('/isp', array($this, 'isp'))
					->before(array($this, 'checkLogin'));
		$controllers->post('/isp', array($this, 'save_isp'))
					->before(array($this, 'checkLogin'));	
		//lesrooster bekijken			
		$controllers->get('/lesrooster', array($this, 'lesrooster'))
					->before(array($this, 'checkLogin'));
		//isp bevestiging
		$controllers->get('/bevestiging', array($this,'bevestigen'))
					->before(array($this, 'checkLogin'));
        $controllers->post('/bevestiging', array($this,'request'))
					->before(array($this, 'checkLogin'));
		//Logout
		$controllers->get('/logout', array($this,'logout'))
					->before(array($this, 'checkLogin'));

        return $controllers;

    }

	public function logout(Application $app) {
		$app['session']->remove('username');
		return $app->redirect($app['request']->getBaseUrl() . '/student/login');
	}
	
	public function DeleteISP(Application $app){
			$idAanvraag = $app['ispAanvraag']->getIsp_Aanvraag($this->loginStudent['idStudents']);
			$app['ispVakken']->Delete_ispvakken($idAanvraag['idISP_aanvraag']);

			$app['ispAanvraag']->Delete_points($this->loginStudent['idStudents']);
			$app['ispAanvraag']->Delete_aanvraag($this->loginStudent['idStudents']);
			return $app->redirect($app['request']->getBaseUrl() .'/student/');
	}
	
	public function checkLogin(Request $request, Application $app) {	
		if (!$app['session']->get('username')) {
			return $app->redirect('./login');
		}
		else{
			$this->loginStudent = $app['student']->getUsersbyName($app['session']->get('username'));
		}
	}

	public function inloggen(Application $app) {
    	if(count($_POST['username']) > 0 && count($_POST['password']) > 0 ){
    		$user = $app['student']->getUsersbyEmail($_POST['username']);
			
            if($user['password'] == $_POST['password']){
            	
				$app['session']->set('username', $user['Name']); 
            	$app['session']->start();
				return $app->redirect('../student');
			}
			else{
				return $app['twig']->render('student/login.twig');
			}
    	}
    }
	public function Home(Application $app) {
		$klas = $app['klasgroep']->getklas();
		$idAanvraag = $app['ispAanvraag']->getIsp_Aanvraag($this->loginStudent['idStudents']);
		$this->loginStudent = $app['student']->getUsersbyName($app['session']->get('username'));
        return $app['twig']->render('student/home.twig',array('klassen' => $klas,'login' => $this->loginStudent,'aanvraag' => $idAanvraag));
    }

	public function Save_home(Application $app){
		$klas = $app['lesrooster']->getklas();
		$app['student']->updateprevklas($this->loginStudent['idStudents'],$_POST['klas'],$_POST['student']);
		$idAanvraag = $app['ispAanvraag']->getIsp_Aanvraag($this->loginStudent['idStudents']);
		$this->loginStudent = $app['student']->getUsersbyName($app['session']->get('username'));
		return $app['twig']->render('student/home.twig',array('klassen' => $klas,'login' => $this->loginStudent,'aanvraag' => $idAanvraag));
	}
	

	 public function Login(Application $app) {
            return $app['twig']->render('student/login.twig');
    }
    
	public function lesrooster(Application $app) {
		$sem1 = null; 
		$sem2 = null ; 
		$error = null;
		if($this->loginStudent['id_Klasgroep'] == null){
			$error ="Er is nog geen Lesrooster gemaakt voor jouw klasgroep";
		}else{
			$sem1 = $app['lesrooster']->getbyKlasSem1($this->loginStudent['id_Klasgroep']);
			$sem2 = $app['lesrooster']->getbyKlasSem2($this->loginStudent['id_Klasgroep']);
		}
        return $app['twig']->render('student/lesrooster.twig',array('sem1' => $sem1,'sem2' => $sem2, 'error' => $error));
    }

	public function Save(Application $app) {
    	foreach($_POST as $key => $value) {
           	if($value == "success" || $value == "unsuccess"){
           		//Controleer vak moet er nog bij
           		$vakken = $app['vakken']->addPoints($this->loginStudent['idStudents'],$value,$key);	
			}  	 
        } 
		return $app->redirect($app['request']->getBaseUrl() .'/student/isp'); 
    }
	
	public function isp(Application $app) {
		$unsuccess = $app['vakken']->unsuccessCourses($this->loginStudent['idStudents']);
		$vakken = $app['vakken']->checkVolgtijdelijkheden($app['vakken']->notdoneCoursesStudent($this->loginStudent['idStudents']));
		return $app['twig']->render('student/isp.twig',array('vakken' => $vakken,'opnieuw' => $unsuccess));
    }
	
	public function save_isp(Application $app){
		$idAanvraag = $app['ispAanvraag']->getIsp_Aanvraag($this->loginStudent['idStudents']);
			foreach($_POST as $key => $value) {
				if($key != 'message' ){
					$id = $app['ispVakken']->addIsp_Vakken($idAanvraag['idISP_aanvraag'],$key);	
				}
			}	
		$app['ispAanvraag']->UpdateCommentaar($_POST['message'],$this->loginStudent['idStudents']);
		return $app->redirect($app['request']->getBaseUrl() . '/student/bevestiging'); 
		
	}
	
	public function Vakken(Application $app) {
		$idAanvraag = $app['ispAanvraag']->getIsp_Aanvraag($this->loginStudent['idStudents']);
		if($idAanvraag == null){
			$idAanvraag = $app['ispAanvraag']->addIsp_Aanvraag($this->loginStudent['idStudents'],"Niet bevestigd","Commentaar: niet aanwezig");	
			$points = null;
		}else{
			$points = $app['vakken']->getPoints($this->loginStudent['idStudents']);
		}
		
        $vakken = $app['vakken']->getAllOpo();
		$vakkenOla = $app['vakken']->getAllOla();
        return $app['twig']->render('student/Vakken.twig',array('vakken' => $vakken,'ola' =>$vakkenOla,'points' =>$points ));
	}
	
	public function bevestigen(Application $app){
		$idAanvraag = $app['ispAanvraag']->getIsp_Aanvraag($this->loginStudent['idStudents']);
		$vakken_Sem1 = $app['ispVakken']->ispSemester1($idAanvraag['idISP_aanvraag']);
		$vakken_Sem2 = $app['ispVakken']->ispSemester2($idAanvraag['idISP_aanvraag']);
                
                $eidguid = isset ($_GET['eidguid']) ? $_GET['eidguid'] : '';
                
                if($eidguid != null && $eidguid != '')  {
                        try {
                                //turn off WSDL caching if not in a production environment
                                $ini = ini_set("soap.wsdl_cache_enabled", "0");
                                $strEIDServiceLicenceID = "d2201526-98ff-4ad4-a0a8-aadefeb74fa5";
                                $client = new SoapClient("https://www.eidtoolkit.be/services/EIDServiceWS.asmx?wsdl");
                                $params = array('strEIDguid' => $eidguid, 'strEIDServiceLicenceID' => $strEIDServiceLicenceID);
                                $eiddataXML = $client->GetXMLByEIDguid($params)->GetXMLByEIDguidResult;
                                $xml = simplexml_load_string($eiddataXML);
                                
                                return $app['twig']->render('student/bevestigen.twig',array('semester1' => $vakken_Sem1, 'semester2' => $vakken_Sem2, 'gegevens' => $xml ));
                        } catch (Exception $exception) {
                                echo($exception);
                        }
                }
		return $app['twig']->render('student/bevestigen.twig',array('semester1' => $vakken_Sem1, 'semester2' => $vakken_Sem2 ));
        }
        
        public function request(Application $app){
                return $app['twig']->render('student/EIDServiceRequest.twig');  
	}
}