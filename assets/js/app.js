$(document).ready(function(){
var path = window.location.origin
//hace grande el text area del comentario de una forma muy precaria.
	$(".my-textarea").focus(function(){
		$(this).css("height", '100px');
	});
//enviar comentarios
	
	$("#enviar-comentario").click(function(){
		var comentario = $(".my-textarea").val();
		var actividadId = $("input:hidden").val();

		console.log(actividadId);
		$.post(path + "/comentario/nuevo",
        		{comentario:comentario, 
        		 actividadId:actividadId},
        		function(data){
          			console.log(data);
        			$(".my-comentary-header").after(data);
          				
          		}

		);
	});


	$('.comentario').click(function(){
		
		var comentario = $(this).prev().val();
		//var actividadId = $("input:hidden").val();
		var actividadId = $(this).prev().prev().val();
		var $clicked = $(this)
		console.log(comentario);
		
		$.post(path + "/comentario/nuevo",
        		{comentario:comentario, 
        		 actividadId:actividadId, 
        		 stream: 1 },
        		function(data){
          			console.log(data);
        			$clicked.parent().parent().parent().before(data);
        			$clicked.prev().val("");
          				
          		}
				
		);
	});

});
