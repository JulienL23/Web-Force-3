$(function() {
	var btn = $("#toggle-nav");
	
	btn.on("click", function(e) {
		e.preventDefault();
		
		$("#main-nav").toggleClass("opened");
		// $("selecteur"); // équivalent de document.querySelectorAll("selecteur")
	});
	
	//btn.off("click"); // supprime l'écouteur d'événement click sur btn
});