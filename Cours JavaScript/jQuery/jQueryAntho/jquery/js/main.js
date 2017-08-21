// équivalent de window.onload = function() {};
// équivalent à $(function() {});
$(document).ready(function(){
	$("body").css("background", "red");
	
	// sélectionne un élément, on utilise un sélecteur CSS
	var body = $("body");
	var contentBlock = $("#content");
	var articles = $(".text"); // liste d'éléments
	
	var firstArticle = articles.eq(0); // sélectionne l'élément à l'index 0 de la liste articles
	
	var parentBlock = firstArticle.parent(); // récupère le parent direct de l'élément firstArticle (contentBlock)
	
	var childBlocks = contentBlock.children(); // récupère tous les enfants directs de contentBlock
	
	var paragraph = contentBlock.find("p"); // récupère tous les descendants de contentBlock qui correspondent au sélecteur p
	
	var pParent = paragraph.parents("#content"); // récupère les parents de paragraph qui correspondent au sélecteur #content
	
	var secondArticle = firstArticle.next(); // sélectionne l'élément suivant
	
	var reFirstArticle = secondArticle.prev(); // sélectionne l'élément précédent
});