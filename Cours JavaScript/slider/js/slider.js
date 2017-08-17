$(function(){
    var sliders = $(".slider-wrapper");
    //pour chaque élément contenu dans le tableau sliders
    sliders.each(function () {    
        var container = $(this).find(".slide-container");// contient l'enfant .slide-container du slider

        var slides = $(this).find(".slide"); //contient la liste des éléments .slide qui sont dans le slider

        var containerWidth = slides.lenght * 400;

        container.css("width", containerWidth);

        // on aoute les écouteurs d'événements pour gérer la navigation
        $(this).find(".btn-prev").on("click", function(e){
            e.preventDefault();
            // alert('backward');
            container.css("left", "+=400");
        });

        $(this).find(".btn-next").on("click", function(e){
            e.preventDefault();
            // alert('forward');
            container.css("left", "-=400");
        });
    });
});
