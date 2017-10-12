

      r = new XMLHttpRequest();

      r.open("POST", "ajax05.php", true);
      r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      r.send(); // on donne le feu vert pour récupérer des données via le fichier PHP

      r.onreadystatechange = function(){
          if(r.readyState == 4 && r.status == 200){
              var obj = JSON.parse(r.responseText);
              console.info(obj);
              document.getElementById("resultat").innerHTML = obj.monresultat;
          }
      }
