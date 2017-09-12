<?php
//démarrage de la Session
session_start();
// print_r($_GET);
// echo $_GET['nomEmploye'];

//si le formulaire a été envoyé en méthode POST
// print_r($_POST);

//Si on ne reçois pas d'action, alors retourne d'où tu viens
if (!isset($_GET['action'])) {
    header('Location:'.$_SERVER['HTTP_REFERER']);
    exit;
}

if ($_GET['action']=="new") {
    $error = "";
    //je verifie que le nom et prénom ont bien été saisis
    if(empty($_POST['nomEmploye']) || trim($_POST['nomEmploye']) == ""){
        $error .= "Le nom n'a pas été saisi.<br />";
    }
    if(empty($_POST['prenomEmploye']) || trim($_POST['nomEmploye']) == ""){
        $error .= "Le prénom n'a pas été saisi.<br />";
    }
    //si j'ai une erreur je la met en session et je retourne le formulaire pour l'afficher
    if (!empty($error)) {// $error != ""
        $_SESSION['error'] = $error;
        // retourne au formulaire
        header('Location:../index.php');
        exit;
    }else{
        //on se connecte à la Bdd
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=mardi;charset=utf8','root','');

        } catch (PDOException $e) {
            die ("Impossible de se connecter.");
        }
        // 1- On utilise les données envoyées dans $_POST

        // 2- On prépare la requête
        $req = $bdd->prepare('INSERT INTO contacts(co_name, co_firstname, co_gender) VALUES (:nomEmploye, :prenomEmploye, :hommeFemme)');
        // 3- On éxécute la requête
        $req->execute($_POST);

        $_SESSION['message'] = "C'est enregistré !";

        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
} else {
    //redirection en php
    // header('Location:../index.php')

    //retourne d'où tu viens
    header('Location:'.$_SERVER['HTTP_REFERER']);
    exit;
}
?>
