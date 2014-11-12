(function($){
	$(document).ready(function(){
		// Add portfolio hover
		$('[rel="tooltip"]').tooltip();
		$(".divisor").on("click", function(e){
			e.preventDefault();
		});
	});
	
	$(document).ready(function(){
		$('.page-microblog #page-title').text("Participación Ciudadana");
		$('#microblog-node-form .control-label').text("Puedes dejar tus comentarios");
	});
})(jQuery);

