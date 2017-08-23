$(function (){
    /******** déclaration des variables *********/
    var slider = $("#slider-wrapper");
    var slideContainer = $("#slide-container");
    var slides = $(".slide");
    var isMoving = false;

    /******** déclaration des fontions **********/
    var move = function (direction) {
        if (direction == "next") {
            // on vérifie que le conteneur n'est pas positionné sur le dernier élément.
            if (slideContainer.position().left > -(slides.length - 1) * 600 && !isMoving) {
                isMoving = true;
                slideContainer.animate({"left" : "-=600"}, function(){
                    isMoving = false;
                });
            }
        } else {
            // on vérifie que le conteneur n'est pas positionné sur le premier élément
            if (slideContainer.position().left < 0 && !isMoving) {
                isMoving = true;
                slideContainer.animate({"left" : "+=600"}, function () {
                    isMoving = false;
                });
            }
        }
    };
    /******** déclaration des écouteurs d'évenement*********/
    $(".open-slider").on("click", function(e) {
        e.preventDefault();

        var slideNumber = $(this).data("slide"); //index du slide à afficher
        // var slideNumber = $(this).attr("date-slide");

        var containerLeft = slideNumber * 600; // calcule la position du slide cible

        slideContainer.css({"left" : -containerLeft}); // déplace le slider à la position du slide cible
        $("#shadow").fadeIn();
    });

    $("#shadow").on("click", function(e){
        var target = $(e.target);// récupère la cible de l'event

        if (target.is("#shadow")){// vérifie si la ciblr de l'event correspond a shadow
            $(this).fadeOut ();
        }
    });

    $(".btn-prev, .btn-next").on("click", function(e) {
        e.preventDefault();

        var direction = $(this).data("direction");

        move(direction);
    });
    /*********** EXECUTION ***************/
    var containerWidth = slides.length * 600;
    slideContainer.css({"width" : containerWidth});
});



/* $(function(){     var sliders = $("#slider-wrapper");

     sliders.each(function () {
         var container = $(this).find("#slide-container");

         var slides = $(this).find(".slide");

         var containerWidth = slides.length * 600;

         var isMoving = false;

         container.css("width", containerWidth);


         $(this).find(".btn-prev").on("click", function(e){
             e.preventDefault();

             if (container.position().left < 0 && !isMoving) {
                 isMoving = true;
                 container.animate({"left" : "+=600"}, function() {

                     isMoving = false;
                 });
             }
         });


         $(this).find(".btn-next").on("click", function(e){
             e.preventDefault();
             // alert('forward');
             if (container.position().left > -(slides.length - 1) * 600 && !isMoving) {
                 isMoving = true;
                 container.animate({"left" : "-=600"}, function(){
                     isMoving = false;
                 });
             }
         });
     });
 }); */
