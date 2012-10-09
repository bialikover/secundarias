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
		$.post("/comentario/nuevo",
<<<<<<< HEAD
=======
		//	$.post("/secundarias/index.php/comentario/nuevo",
>>>>>>> 9dbe15abe604a8ed499f75259c89202aa2354093
        		{comentario:comentario, 
        		 actividadId:actividadId},
        		function(data){
          			console.log(data);
        			$(".my-comentary-header").after(data);
     				$('.close').attr('onclick','close_click(this)');
          		}

		);
	});


	$('.comentario').click(function(){
		
		var comentario = $(this).prev().val();		
		var actividadId = $(this).prev().prev().val();
		var $clicked = $(this)
		console.log(comentario);
		
		$.post("/comentario/nuevo",
<<<<<<< HEAD
=======
		//$.post("/secundarias/index.php/comentario/nuevo",
>>>>>>> 9dbe15abe604a8ed499f75259c89202aa2354093
        		{comentario:comentario, 
        		 actividadId:actividadId, 
        		 stream: 1 },
        		function(data){
          			console.log(data);
        			$clicked.parent().parent().parent().before(data);
        			$clicked.prev().val("");
          			$('.close').attr('onclick','close_click(this)');	
          		}
				
		);
	});


	$(".close").attr('onclick', 'close_click(this)');

});

	function close_click(e){		
		var comentarioId = $(e).val();
		var nodo = $(e).parent().parent().parent().parent();
		console.log(comentarioId);
		$.post("/comentario/eliminar",
		//$.post("/secundarias/comentario/eliminar",
        		{comentarioId:comentarioId}, 
        		function(data){
        			console.log(data);        			
        			nodo.hide("slow");
        		});

	}
