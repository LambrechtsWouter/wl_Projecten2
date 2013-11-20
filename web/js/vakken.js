  $(document).ready(function () {
  	   $('.well-sm').hide();
  	   $('.img').hide();
  	   $('.img1').hide();
  	   $('#sem2').hide();
  	  
       $('#semester1').click(function() {
       	    	$('#sem2').hide();
       	    	$('.sem1').show();
       });
       $('#semester2').click(function() {
       	    	$('#sem2').show();
       	    	$('.sem1').hide();
       });
  	   $('.OLA').each(function () {
                if($(this).val() == "success"){ //kleuren blijven zichtbaar na refresh
                         $(this).parent().parent().addClass('lightgreen');
                         $(this).parent().parent().find('.img1').hide();
                         $(this).parent().parent().find('.well-sm').hide();
                         $(this).parent().parent().find('.img').hide();
                 }else if($(this).val() == "unsuccess"){
                         $(this).parent().parent().addClass('red');
                         $(this).parent().parent().find('.img1').show();
                 }else if($(this).val() == "tolerate") {
                         $(this).parent().parent().addClass('lightblue');
                 }
       	$(this).change(function () {       	
       		if($(this).val() == "success"){
       			$(this).parent().parent().addClass('lightgreen');
       			$(this).parent().parent().removeClass('red');
                        $(this).parent().parent().removeClass('lightblue');
       			$(this).parent().parent().find('.img1').hide();
       			$(this).parent().parent().find('.well-sm').hide();
       			$(this).parent().parent().find('.img').hide();
       		}else if($(this).val() == "unsuccess"){
       			$(this).parent().parent().addClass('red');
       			$(this).parent().parent().removeClass('lightgreen');
                        $(this).parent().parent().removeClass('lightblue');
       			$(this).parent().parent().find('.img1').show();
       		}else if($(this).val() == "tolerate") {
       			$(this).parent().parent().addClass('lightblue');
       			$(this).parent().parent().removeClass('lightgreen');
       			$(this).parent().parent().removeClass('red');
                        $(this).parent().parent().find('.img1').hide();
       			$(this).parent().parent().find('.well-sm').hide();
       			$(this).parent().parent().find('.img').hide();
       		}else {
       			$(this).parent().parent().removeClass('lightblue');
       			$(this).parent().parent().removeClass('lightgreen');
       			$(this).parent().parent().removeClass('red');
       		}
       		var success = $('.lightgreen').length;
       		var unsuccess = $('.red').length;
       		$('#OLA_sucess').html(success);
       		$('#OLA_unsucess').html(unsuccess);
       });
       });
       $('.img1').click(function() {
       	    	$(this).next('.well-sm').show();
       	    	$(this).hide();
       	    	$(this).prev('.img').show();
       });
       $('.img').click(function() {
       	    	$(this).next().next('.well-sm').hide();
       	    	$(this).hide();
       	    	$(this).next('.img1').show();
       });
       $('#first').change(function(){
       		if($('#first').is(':checked')) {
    			$(".first").show();
			} else {
    			$(".first").hide();
			}
       });
       $('#second').change(function(){
       		if($('#second').is(':checked')) {
    			$(".second").show();
			} else {
    			$(".second").hide();
			}
       });
       $('#third').change(function(){
       			if($('#third').is(':checked')) {
    			$(".third").show();
			} else {
    			$(".third").hide();
			}
       });
       
       $('.first').change(function(){
       		if($('.first').is(':checked')) {
    			$(".1").show();
			} else {
    			$(".1").hide();
			}
       });
       $('.second').change(function(){
       		if($('.second').is(':checked')) {
    			$(".2").show()
			} else {
    			$(".2").hide();
			}
       });
       $('.third').change(function(){
       			if($('.third').is(':checked')) {
    			$(".3").show();
			} else {
    			$(".3").hide();
			}
       });
	
  });
 
$(function () {
    $("#L").sortable({
        connectWith: '.L',
        containment: '#ListContainer',
        receive: function (event, ui) {
            $(ui.item).find('input:radio')[0].checked = true;
        },
        start: function (event, ui) {
            if ($(ui.item).hasClass("noA")) {
                $("#L").addClass("disabled");
            }
            if ($(ui.item).hasClass("noB")) {
                $("#L_B").addClass("disabled");
            }
            if ($(ui.item).hasClass("noC")) {
                $("#L_C").addClass("disabled");
            }
        },
        stop: function (event, ui) {
        	doosomething();
        	if ($(ui.item).hasClass("noA")) {
                $("#L").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noB")) {
                $("#L_B").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noC")) {
                $("#L_C").removeClass("disabled");
            }
        }
    }).disableSelection();
    $("#L_B").sortable({
        connectWith: '.L',
        containment: '#ListContainer',
        receive: function (event, ui) {
            if ($(ui.item).hasClass("noB")) {
                $(ui.sender).sortable("cancel");
            }
            else {
            $(ui.item).find('input:radio')[1].checked = true;
            }
        },
        start: function (event, ui) {
        	if ($(ui.item).hasClass("noA")) {
                $("#L").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noB")) {
                $("#L_B").addClass("disabled");
            }
            if ($(ui.item).hasClass("noC")) {
                $("#L_C").addClass("disabled");
            }
        },
        stop: function (event, ui) {
        	doosomething();
        	if ($(ui.item).hasClass("noA")) {
                $("#L").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noB")) {
                $("#L_B").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noC")) {
                $("#L_C").removeClass("disabled");
            }
        }
    }).disableSelection();
    $("#L_C").sortable({
        connectWith: '.L',
        containment: '#ListContainer',
        receive: function (event, ui) {
            if ($(ui.item).hasClass("noC")) {
                $(ui.sender).sortable("cancel");
            }
            else {
                $(ui.item).find('input:radio')[2].checked = true;
            }
        },
        start: function (event, ui) {
        	if ($(ui.item).hasClass("noA")) {
                $("#L").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noB")) {
                $("#L_B").addClass("disabled");
            }
            if ($(ui.item).hasClass("noC")) {
                $("#L_C").addClass("disabled");
            }
        },
        stop: function (event, ui) {
        	doosomething();
        	if ($(ui.item).hasClass("noA")) {
                $("#L").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noB")) {
                $("#L_B").removeClass("disabled");
            }
            if ($(ui.item).hasClass("noC")) {
                $("#L_C").removeClass("disabled");
            }
        }
    }).disableSelection();
});
$(document).ready(function () {
   
    $('.C').closest('li').appendTo("#L_C");
    $('input:radio, label').hide();
    $('ul.ui-sortable').width("10em");
    $('ul.ui-sortable li').css({
        cursor: 'pointer'
    });
    
});

function doosomething(){
		var s1 = 0,s2 = 0,tot = 0;
    	var semester1 = $('#L_B li').map(function(i,n) {
     		s1 += parseInt($(n).attr('name'),10);
			}).get().join(',');
		var semester2 = $('#L_C li').map(function(i,n) {
     		s2 += parseInt($(n).attr('name'),10);
			}).get().join(',');
		tot = s1 + s2;
		$('#s1').html(s1);
		$('#sem1').html(s1);
		$('#s2').html(s2);
		$('#sem2').html(s2);
		$('#tot').html(tot);
}