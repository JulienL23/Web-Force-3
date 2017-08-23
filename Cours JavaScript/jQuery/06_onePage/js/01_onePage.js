$ (function () {
    /*********DECLARATION DES VARIABLES*********/
    var links = $("#main-nav a");
    var lastScrollPos = $(document).scrollTop(); // on récupère la position du scroll au chargement de la page

    /********DECLARATION DES FONCTIONS*********/

    /********DECLARATION DES ECOUTEURS D'EVENEMENT******/
    links.on("click", function (e) {
        e.preventDefault();

        var target = $(this).attr("href");// récpère la valeur de l'attribut href du lien qui a envoyé le l'évenement

        var targetTop = $(target).position().top;// récupère la position verticale de la cible par rapport au document

        //window.scrollTo(0, targetTop);
        //$(document).scrollTop(targetTop);
        //$("body").scrollTop(targetTop);

        $("html, body").animate({scrollTop : targetTop});// on anime la propriété scrollTop (la distance de la fenêtre à partir du haut du dodument)
    });

    $(document).on("scroll", function(e){
        if ($("html, body").is(":animated") == false) { //vérifie que html, body ne sont pas en cours d'animation
        var pageIndex = $(document).scrollTop() / $(window).height();// on récupère la position du scroll au chargement de la page
        if ($(document).scrollTop() > lastScrollPos){
            //l'utilisateur a défilé vers le bas
            pageIndex = Math.ceil(pageIndex); // arrondit la valeur de pageIndex à l'entier inférieur

            var pagePosition = $(".page").eq(pageIndex).position().top;
            $("html, body").animate({scrollTop : pagePosition});

        } else {
            pageIndex = Math.floor(pageIndex);


        }
        var pagePosition = $(".page").eq(pageIndex).position().top;
        $("html, body").animate({scrollTop : pagePosition}, function() {
            lastScrollPos = $(document).scrollTop(); // on met à jour la dernière position du scroll
        });
    }
});
/****** EXECUTION *******/
});
