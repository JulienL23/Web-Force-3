$(function () {
    $(".toggle-dropdown").on("click", function(e) {
        e.preventDefault();

        var btnToggle = $(this); // on récupère la cible de l'évenement
        var parentBlock = btnToggle.parents(".dropdown-wrapper"); // on récupère le parent de btnToggle qui correspond au sélecteur .dropdown-wrapper
        var contentBlock = parentBlock.find(".dropdown-content");// on  récupère les descendants de parentBlock qui correspond au sélecteur .dropdown-content

        //contentBlock.show();// affiche un élément
        //contentBlock.hide();// masque un élément ( display : none)

        //element.is(".test"); // vérifie que l'élément element correspond au sélecteur .test (utilisé pour des vérifs)
        /*if (contentBlock.is(":visible")) {// vérifie si contentBlock est visible
            contentBlock.hide();// on masque l'élément
        }else {
            contentBlock.show();
        }*/

        //contentBlock.show(800); // affiche un élément avec une transition de 800 millisecondes

        //contentBlock.toggle(800); // affiche un élément masqué ou masquer un élément déjà affiché

        //contentBlock.slideDown(); // affiche un élément en augmentant progressivement sa hauteur
        //contentBlock.slideUp(); // masque un élément en diminuant sa hauteur
        contentBlock.slideToggle(); // ouvre un élément fermé en augmentant sa hauteur ou ferme un élément ouvert en diminuant sa hauteur

        //contentBlock.fadeIn();//fait apparaître un élément en augmentant progressivement l'opacité
        //contentBlock.fadeOut();// fait disparaître un élément en diminuant progressivement l'opacité
        //contentBlock.fadeToggle();
    });

/****************** POPIN *********************/
        $(".toggle-popin").on("click", function (e){
            e.preventDefault();

            $(".shadow").fadeToggle();
    });
});
