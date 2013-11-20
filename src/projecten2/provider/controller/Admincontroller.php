<?php

namespace projecten2\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;


class adminController implements ControllerProviderInterface {
var $loginAdmin;


    public function connect(Application $app) {

        $controllers = $app['controllers_factory'];
		//homepagina
        $controllers->get('/', array($this, 'Home'))
                    ->before(array($this, 'checkLogin'));  
		//loginpagina
        $controllers->get('/login', array($this, 'Login'));
        $controllers->post('/login', array($this, 'inloggen'));
		//logout
        $controllers->get('/logout', array($this,'logout'))
                    ->before(array($this, 'checkLogin'));  

        //aanvragen
        $controllers->get('/aanvragen', array($this, 'aanvragen'))
                    ->before(array($this, 'checkLogin'));        
        $controllers->get('aanvragen/{itemId}', array($this, 'AanvraagDetail'))->assert('itemId', '\d+')
                    ->before(array($this, 'checkLogin'));
        $controllers->get('aanvragen/goedkeuren/{itemId}', array($this,'Goedkeuren'))->assert('itemId', '\d+')
                    ->before(array($this, 'checkLogin')); 
        $controllers->get('aanvragen/afkeuren/{itemId}', array($this,'Afkeuren'))->assert('itemId', '\d+')
                    ->before(array($this, 'checkLogin'));            

        //vakken
        $controllers->get('/vakken', array($this, 'vakken'))
                    ->before(array($this, 'checkLogin'));

        //volgtijdelijkheden
        $controllers->get('/volgtijdelijkheden', array($this, 'volgtijdelijkheden'))
                    ->before(array($this, 'checkLogin'));
					
		// lesrooster per klasgroep
		$controllers->get('/lesperklasgroep', array($this, 'lesrooster'))
                    ->before(array($this, 'checkLogin'));			
		$controllers->get('/lesperklasgroep/{groep}', array($this, 'lesperklasgroep'))->assert('groep', '\d+')
                    ->before(array($this, 'checkLogin'));				
		$controllers->POST('/lesperklasgroep', array($this, 'lesperklasgroep'))
                    ->before(array($this, 'checkLogin'));
		$controllers->GET('/lesperklasgroep/delete/{itemId}', array($this, 'delete_les'))->assert('itemId', '\d+')
                    ->before(array($this, 'checkLogin'));				
		$controllers->POST('/lesperklasgroep/addles', array($this, 'addles'))
                    ->before(array($this, 'checkLogin'));
		
		//modelstudent - geef een klasgroep			
		$controllers->get('/toewijzen_klasgroep', array($this, 'setKlasgroep'))
                    ->before(array($this, 'checkLogin'));
					
		$controllers->POST('/toewijzen_klasgroep', array($this, 'saveSetKlasgroep'))
                    ->before(array($this, 'checkLogin'));
					
		//Klasgroepen aanmaken
		$controllers->get('/klasgroepen', array($this, 'klasgroepen'))
                    ->before(array($this, 'checkLogin'));
		$controllers->POST('/klasgroepen', array($this, 'Saveklasgroepen'))
                    ->before(array($this, 'checkLogin'));		
		$controllers->get('/klasgroepen/delete/{itemId}', array($this, 'Deleteklasgroep'))->assert('itemId', '\d+')
                    ->before(array($this, 'checkLogin'));			
        return $controllers;

    }

    public function logout(Application $app) {
        $app['session']->remove('admin');
        return $app->redirect('../admin/login');
    }
    
    public function checkLogin(Request $request, Application $app) {    
        if (!$app['session']->get('admin')) {
                return $app->redirect('./login');
        }
        else{
            $this->loginAdmin = $app['admin']->getUsersbyName($app['session']->get('admin'));
        }
    }

    public function inloggen(Application $app) {
        if(count($_POST['username']) > 0 && count($_POST['password']) > 0 ){
            $user = $app['admin']->getUsersbyEmail($_POST['username']);
            
            if($user['password'] == $_POST['password']){
                
                $app['session']->set('admin', $user['Name']); 
                $app['session']->start();
                return $app->redirect('../admin');
            }
            else{
                return $app['twig']->render('admin/login.twig');
            }
        }
    }

    public function Home(Application $app) {
        	return $app['twig']->render('admin/home.twig');
    }	

    public function Login(Application $app) {
            return $app['twig']->render('admin/login.twig');
    }

    //aanvragen
    public function Aanvragen(Application $app) {
    	$itemDetails = $app['ispAanvraag']->getIsp_Aanvragen();
        return $app['twig']->render('admin/aanvragen.twig',
        array(
                    'itemDetails' => $itemDetails
        ));
    }

    public function Goedkeuren(Application $app, $itemId) {
        $data = [
            "idISP_aanvraag" => $itemId,
            "toestand" => "Bevestigd",
        ];

        $app['ispAanvraag']->getIsp_Goedkeuren($data, array('idISP_aanvraag' => $itemId));
        return $app->redirect('../'.$itemId);
    }

    public function Afkeuren(Application $app, $itemId) {
        $data = [
            "idISP_aanvraag" => $itemId,
            "toestand" => "Afgekeurd",
        ];

        $app['ispAanvraag']->getIsp_Afkeuren($data, array('idISP_aanvraag' => $itemId));
        return $app->redirect('../'.$itemId);
    }   

    public function AanvraagDetail(Application $app, $itemId) {
            $itemDetails = $app['ispAanvraag']->getIsp_AanvraagDetail($itemId);
            return $app['twig']->render('admin/AanvraagDetail.twig', array('itemDetails' => $itemDetails));
    }
    //vakken
    public function Vakken(Application $app) {
            return $app['twig']->render('admin/vakken.twig');
    }

    //volgtijdelijkheden
    public function Volgtijdelijkheden(Application $app) {
            return $app['twig']->render('admin/volgtijdelijkheden.twig');
    }
	//lesrooster
    public function lesrooster(Application $app){
    		$klas = $app['klasgroep']->getklas();
			
			return $app['twig']->render('admin/les_klasgroep.twig',array('vakken' => null, 'sem1' => null,'sem2' => null,'klassen' => $klas));
	}
	public function lesperklasgroep(Application $app,$groep = null){
			$klas = $app['klasgroep']->getklas();
			
			if($groep){
				$id_klas = $app['lesrooster']->getklasbyId($groep);
				$vakken = $app['vakken']-> getAllOlobyJaar($id_klas['jaar']);
				$sem1 = $app['lesrooster']->getbyKlasSem1($groep);
				$sem2 = $app['lesrooster']->getbyKlasSem2($groep);
			}else{
				$id_klas = $app['lesrooster']->getklasbyId($_POST['klas']);
				$vakken = $app['vakken']-> getAllOlobyJaar($id_klas['jaar']);
				$sem1 = $app['lesrooster']->getbyKlasSem1($_POST['klas']);
				$sem2 = $app['lesrooster']->getbyKlasSem2($_POST['klas']);
			}
			
			return $app['twig']->render('admin/les_klasgroep.twig',array('klasgroep' => $id_klas, 'vakken' => $vakken, 'sem1' => $sem1,'sem2' => $sem2,'klassen' => $klas));
	}
	public function delete_les(Application $app,$itemId){
			$klas = $app['lesrooster']->getLes($itemId);
			$app['lesrooster']->deleteLes($itemId);
			return $app->redirect($app['request']->getBaseUrl() .'/admin/lesperklasgroep/' . $klas['klasgroep_idklasgroep']);
	}
	public function addles(Request $request,Application $app){
			$klas = $app['lesrooster']->addLessen($_POST['vak'],$_POST['uur'],$_POST['dag'],$_POST['max'],$_POST['klasgroep'],$_POST['week'],$_POST['opmerking']);
			return $app->redirect($app['request']->getBaseUrl() . '/admin/lesperklasgroep/' . $_POST['klasgroep']);
	}	
	
	// set klasgroep bij modelstudenten
	public function setKlasgroep(Application $app){
			$klas = $app['klasgroep']->getklas();
			$students = $app['student']->getmodelstudents();
			return $app['twig']->render('admin/setklasgroep.twig',array('students' => $students,'klassen' => $klas));
	}
	public function saveSetKlasgroep(Application $app){
			foreach($_POST as $key => $value) {
				$app['student']->saveKlasgroep($value,$key);
			}
			return $this->setKlasgroep($app);
	}
	//weergeven klasgroepen + opslaan
	public function klasgroepen(Application $app){
			$klas = $app['klasgroep']->getklas();
			return $app['twig']->render('admin/klasgroepen.twig',array('klasgroepen' => $klas));
	}
	public function Saveklasgroepen(Application $app){
			$klas = $app['klasgroep']->saveNewKlas($_POST['klas'],$_POST['jaar'],$_POST['max']);
			return $this->klasgroepen($app);
	}
	public function Deleteklasgroep(Application $app,$itemId){
			$klas = $app['klasgroep']->deleteKlasgroep($itemId);
			return $this->klasgroepen($app);
	}
}