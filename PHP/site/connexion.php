<?php
require_once('inc/init.inc.php');
// traitement pour la déconnexion :
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){//Si une action est demandée dans l'url... et que cette action est "déconnexion" alors on procède à la déconnexion.
    unset($_SESSION['membre']);
    header('location:connexion.php');
}
//Traitement pour rediriger l'utilisateur s'il est déjà connecté
if (userConnecte()) {
    header('location:profil.php');
}

//Formulaire activé ?
//Debug() pour vérifier
//On vérifie que les deux champs sont pas vides
//On connecte le membre en enregistrant ses infos dans la SESSION
    // -> Le membre existe-t-il en BDD ?
    // -> Est-ce que le MDP saisie correspond a celui en BDD ?
    // -> Enregistrement en SESSION
    // -> Redirection vers profil

    if(!empty($_POST)) {
        debug($_POST);
        if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
            $resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo=:pseudo");
            $resultat -> bindParam(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
            $resultat -> execute();
            if($resultat -> rowCount() > 0) { // Ok le pseudo existe bien
                $membre = $resultat -> fetch(PDO::FETCH_ASSOC); // On récupère toutes les infos membre qui souhaite se connecter sous la forme d'un ARRAY
                if($membre['mdp'] == md5($_POST['mdp'])) {
                    // si (mdp_crypté_en_BDD == mdp saisi + crypté.. Alors tout est OK!)
                    foreach($membre as $indice => $valeur) {
                        if($indice != 'mdp') {
                            $_SESSION['membre'][$indice] = $valeur;
                        }
                    }

                    // debug($_SESSION);
                    // redirection

                    header('location:profil.php');

                }else {
                    $msg .= '<div class="erreur">Pseudo erroné.</div>';
                }
            }else {
                    $msg .= '<div class="erreur">Veuillez renseigner un Pseudo et un Mot de passe.</div>';
            }
        }
    }

$page = 'Connexion';
require_once('inc/header.inc.php');
?>

 <!-- Contenu HTML -->
 <h1>Connexion</h1>

    <form action="" method="post">
        <?= $msg ?>
        <label for="">Pseudo</label>
        <input type="text" name="pseudo">
        <label for="">Mot de passe</label>
        <input type="password" name="mdp">
        <input type="submit" value="Connexion">

    </form>

<?php
require_once('inc/footer.inc.php')
?>
