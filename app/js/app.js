$(document).ready(function(){

	 setInterval(function(){ location.reload(); }, 600000);

			$('#show').click(function(){
				
			     $('.tabla2').fadeOut();
			     $('.tabla1').fadeIn();
			     $('#img-ok').fadeOut();
			});
			
			$('#enviar').click(function(e){
				e.preventDefault();
				var cod = $('#cod').val();
				if(cod != ''){
				$.ajax({
			       url: "php/class.Reservas.php",
			       type: "post",
			       data: 'cod=' + cod,
			       cache: false,
			       dataType: 'json',
			       success: function(data){
			       	if(data == null){alert('Ese codigo no existe en la base de datos');}else{
			           $('.tabla1').fadeOut();
			           $('.tabla2').fadeIn();
			           
			           $('#img-no').attr("data",data[2]);
			           $('#fecha').html(data[0]);
			           $('#hora').html(data[1]);
			           $('#codigo').html(data[2]);
			           $('#cantidad').html(data[4]);
			           $('#usuario').html(data[3]);
			           $('#user').html(data[3]);
			           $('#telefono').html(data[5]);

			           if(data[6]==0){

			           	$('#img-ok').fadeIn();
			           	$('#img-ok').attr("data",data[2]);


			           }else{
			           	$('#ok').html('Confirmado');
			           }
			        }
			          
			           
			       }
			        }); //peticion AJAX
				}
			});

			$('.confirmar').click(function(){
				var cod = $(this).attr("data");
				$.ajax({
			       url: "php/class.Confirmar.php",
			       type: "post",
			       data: 'cod=' + cod,
			       cache: false,
			       dataType: 'json',
			       success: function(data){
			       
			          if(data==1){
			          	alert('Reserva confirmada correctamente');
			          	location.reload();
			          }
			           
			       }
			        }); //peticion AJAX


			});

			$('.eliminar').click(function(){
				var cod = $(this).attr("data");
				$.ajax({
			       url: "php/class.Eliminar.php",
			       type: "post",
			       data: 'cod=' + cod,
			       cache: false,
			       dataType: 'json',
			       success: function(data){
			       
			          if(data==1){
			          	alert('Reserva eliminada correctamente');
			          	location.reload();
			          }
			           
			       }
			        }); //peticion AJAX


			});

		});