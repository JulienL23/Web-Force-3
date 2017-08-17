// window.onload = function () {
//     var nav = document.getElementById("main-nav");
//     var btn = document.getElementById("toggle-nav");
// Le code en commentaire ci dessous permet de supprimer le comportement par défault de l'évenement

    /*// var toggleNav = function(e) {
        e.preventDefault();//supprime le comportement par défaut de l'événement
        nav.classList.toogle("opened")
    };

    //on ajoute un écouteur d'évement sur l'évenement click du bouton
    btn.addEventListener("click", toggleNav);

    //on supprime l'écouteur d'événement
    btn.removeEventListener("click", toggleNav);*/

/*****************************/

    // on ajoute un écouteur d'événement sur l'événement click du bouton
//     btn.addEventListener("click", function (e) {
//         e.preventDefault();// supprime le comportement par défaut de l'événement
//         // nav.style.right = "0";
//         nav.classList.toggle("opened");
//     });
//
// }



$(function() {
    // var nav = $("#main-nav");
    var btn = $("#toggle-nav");

    btn.on("click", function(e){
        e.preventDefault();

        $("#main-nav").toggleClass("opened");
    });
});
