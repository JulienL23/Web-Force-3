// fonction permettant d'éxécuter la onction ajax() toutes les 10 secondes pour afficher les employés de manière à actualisé
setInterval("ajax()", 10000);

ajax(); // exécutionde de la méthode ajax() immédiatement pour ne pas attendre 10 secondes lors du 1er affichage de la page.

function ajax(){

    r = new XMLHttpRequest();
    console.log(r);
    //document.write('test<br>');

    r.open("POST", "ajax07.php", true);// On prépare le fichier PHP auquel on envoi des données

    r.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // on prépare la requete http

    r.send();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var obj = JSON.parse(r.responseText);
            console.info(obj);
            document.getElementById("resultat").innerHTML = obj.resultat;
        }
    }
}
