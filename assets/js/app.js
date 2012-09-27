$(document).ready(function(){

//hace grande el text area del comentario de una forma muy precaria.
	$(".my-textarea").focus(function(){
		$(this).css("height", '100px');
	});
//enviar comentarios
	$("#enviar-comentario").click(function(){
		var comentario = $(".my-textarea").val();
		var actividadId = $("input:hidden").val();

		console.log(actividadId);
		$.post("/secundarias/index.php/comentario/nuevo",
        		{comentario:comentario, 
        		 actividadId:actividadId},
        		function(data){
          			console.log(data);
        			$(".my-comentary-header").after(data);
          				
          		}
				
		);
	});

});
