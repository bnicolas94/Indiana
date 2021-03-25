$(document).ready(function(){

	$('#btn-reserva').click(function(){ //Click en boton reserva

		var name = $('#name').val()
		var time = $('#hora').val();
		var tel = $('#tel').val();
		var date = $('#datepicker').val();
		var count = $('#count').val();

		if(name != '' && time != '' && date != '' && time != '' && count !=''){

			$.ajax({
			       url: "php/reserva.php",
			       type: "post",
			       data: 'tel=' + tel + '&name=' + name + '&time=' + time + '&date=' + date + '&count=' + count,
			       success: function(response){
			           
			           $('#_AJAX_').html(response);
			           
			           
			       }
			        }); //peticion AJAX

		}else{
			$('#_AJAX_').html('Debe completar todos los datos.');
		}

	});

});