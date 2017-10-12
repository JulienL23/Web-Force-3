
document.addEventListener("DOMContentLoaded", function(event){

    document.getElementById("submit").addEventListener('click', function(event){

        event.preventDefault(); // annule le comportement par default du submit qui est censé recharger la page
        ajax();

    });

    function ajax(){

        r = new XMLHttpRequest();
        var p = document.getElementById("personne");
        var personne = p.value; // permet de récupérer la valeur de l'input
        //  console.info(personne);

        var parameters = "personne="+personne; // prepare les paramètres à envoyer à la requete SQL
        // console.info(parameters);

        r.open("POST", "ajax_insert.php", true); // je prépare le fichier php

        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        r.send(parameters); // on donne le feu vert, la requete peut être envoyé et exécuté.

        document.getElementById("resultat").innerHTML = "<span style='background: #22d3a7'>Employé " + p.value + " ajouté.</span>";

        
    }
});
