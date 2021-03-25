$(document).ready(function(){

	$('#frm-login').keypress(function(e){
		if (e.keyCode == 13) {
        	var usr = $('#userid').val()
			var psw = $('#psw').val();
		

			if(usr != '' && psw != ''){

				$.ajax({
			       url: "php/login.php",
			       type: "post",
			       data: 'user=' + usr + '&pass=' + psw,
			       success: function(response){
			           
			           if(response == 'ok'){
			           	location.reload();
			           }else{
			           $('#_AJAX_').html(response);
			       }
			           
			           
			       }
			        }); //peticion AJAX

		}else{
			$('#_AJAX_').html('Debe completar todos los datos.');

		}
    }
	});
	$('#btn-login').click(function(){ //Click en boton reserva

		var usr = $('#userid').val()
		var psw = $('#psw').val();
		

		if(usr != '' && psw != ''){

			$.ajax({
			       url: "php/login.php",
			       type: "post",
			       data: 'user=' + usr + '&pass=' + psw,
			       success: function(response){
			           
			           $('#_AJAX_').html(response);
			           
			           
			       }
			        }); //peticion AJAX

		}else{
			$('#_AJAX_').html('Debe completar todos los datos.');

		}

	});

});

function enter(e) {
    if (e.keyCode == 13) {
        
    }
}