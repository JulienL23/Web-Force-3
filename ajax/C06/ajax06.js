document.addEventListener("DOMContentLoaded", function(event){

    document.getElementById("submit").addEventListener('click', function(event){

        event.preventDefault(); // annule le comportement par default du submit qui est censé recharger la page
        ajax();

    });

    function ajax(){

      r = new XMLHttpRequest();

      var p = document.getElementById("personne");
      var personne = p.value;

      var parameters = "personne="+personne;

      r.open("POST", "ajax06.php", true);

      r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      r.send(parameters); // on donne le feu vert pour récupérer des données via le fichier PHP

      document.getElementById("resultat").innerHTML = "<span style='background: #22d3a7'>Employé " + p.value + " ajouté.</span>";

      r.onreadystatechange = function(){
          if(r.readyState == 4 && r.status == 200){
              var obj = JSON.parse(r.responseText);
              console.info(obj);
              document.getElementById("resultat").innerHTML = obj.monresultat;
          }
      }
  }
});
