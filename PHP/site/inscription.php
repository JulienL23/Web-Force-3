<?php
require_once('inc/init.inc.php');

// Traitement pour rediriger l'utilisateur s'il est déjà connecté
if (userConnecte()) {
    header('location:profil.php');
}
//Traitement pour l'inscription
// -> Vérifie si le formulaire est activé
// -> Affiche avec print_r()
// -> Controle sur les champs (pseudo & mdp)
// -> Enregistrer l'utilisateur
//      --> Pseudo disponible ? / Email disponible ?
//      --> INSERT
//      --> Redirection vers la connexion

if(!empty($_POST)) {
        debug($_POST);
        // Vérification Pseudo :
        $verif_pseudo = preg_match('#^([a-zA-Z-0-9._-]{3,20})$#', $_POST['pseudo']); // Cette fonction me permet de mettre une règle en place pour les caractères autorisés :
        // arg 1 : REGEX - EXPRESSIONS REGULIERES
        // arg 2 : La chaîne de caractères
        // Retour : TRUE (si OK) - FALSE (si pas OK)
        if(!empty($_POST['pseudo'])) {
                if(!$verif_pseudo) { // Si verif_pseudo nous retourne false
                        $msg .= '<div class="erreur">Pseudo : Caractères autorisés (A à Z et de 0 à 9), minimun 3 caractères, maximun 20 caractères.</div>';
                }
        }
        else {
                $msg .= '<div class="erreur">Veuillez renseigner un pseudo.</div>';
        }
        // Vérification  du Mot de passe
        $verif_pwd = preg_match('#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$#', $_POST['mdp']);
        if(!empty($_POST['mdp'])) {
                if(!$verif_pwd) { // Si verif_pseudo nous retourne false
                        $msg .= '<div class="erreur">Mot de passe : Veuillez renseigner 8 caractères minimun (20 max)  au moins une MAJUSCULE et au moins un chiffre.</div>';
                }
        }
        else {
                $msg .= '<div class="erreur">Veuillez renseigner un mot de passe.</div>';
        }
        // vérification Email :
        $pos = strpos($_POST['email'], '@'); // la position de @
        $ext = substr($_POST['email'], $pos +1); //'gmail.com'
        $ext_non_autorisees = array ('wimsg.com' , 'yopmail.com' , 'mailinator.com' , 'tafmail.com' , 'mvrht.net');
        $verif_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // Vérifie que le format est OK (retourne TRUE si OK) - (FALSE si pas OK)
        if(!empty($_POST['email'])) {
                if(!$verif_email || in_array($ext, $ext_non_autorisees)) {
                        $msg .= '<div class="erreur">Veuillez saisir un email valide.</div>';
                }
        }
        else {
                $msg .= '<div class="erreur">Veuillez renseigner un email.</div>';
        }
        // A ce stade, si notre variable $msg est encore vide, cela signifie qu'il n'y a pas d'erreur au moins sur email, pseudo et MDP (pensez à faire les vérifs des autres champs)
        if(empty($msg)) { // Tout est OK !
                // Enregistrement du nouvel utilisateur :
                // Attention, le pseudo et le mail est-il disponible ?
                $resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
                $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
                $resultat -> execute();
                if($resultat -> rowCount() > 0) { // Signifie que le pseudo est déjà utilisé.
                        // Nous aurions pu lui proposer 2/3 variate de son pseudo, en ayant vérifié qu'ils sont disponibles
                        $msg .= '<div class="erreur">Le pseudo ' . $_POST['pseudo'] . ' n\'est pas disponible, veuillez choisir un autres pseudo.</div>';
                }
                else { // Ok le pseudo est dispo on va enregistrer le membre dans la BDD .. (Attention , nous devrions également vérifier la disponibilité de l'email)
                        // Attention, le pseudo et le mail est-il disponible ?
                        $resultat = $pdo -> prepare("SELECT * FROM membre WHERE email = :email");
                        $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                        $resultat -> execute();
                        if($resultat -> rowCount() > 0) {
                                $msg .= '<div class="erreur">L\'email ' . $_POST['email'] . ' n\'est pas disponible, veuillez choisir un autres email.</div>';
                        }
                        else{ //Ok email dispo !!
                                // crypte le MDP
                                $mdp = md5($_POST['mdp']); // md5() va crypté le mdp selin en hashage 64 octet

                                // requete INSERT
                                $resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES(:pseudo,:mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse,'0')");
                                $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
                                $resultat -> bindParam(':mdp', $mdp, PDO::PARAM_STR);
                                $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
                                $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
                                $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                                $resultat -> bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR);
                                $resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
                                $resultat -> bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_INT);
                                $resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);

                                // redirection
                                if($resultat -> execute()) { // Si la requete est OK !
                                        header('location:connexion.php');
                                }
                        } // fin du else verif dipo email
                } // fin du else rowCount()
        } // Fin du if !empty $msg
} //Fin du if !empty $_POST

// Pour sauvegarder les infos dans le formulaire, en cas d'erreur, on doit définir une variable pour chaque champs.

// if(isset($_POST['pseudo'])){
//     $pseudo = $_POST['pseudo'];
// }else{
//     $pseudo = '';
// }

$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';
$nom = (isset($_POST['nom'])) ? $_POST['nom'] : '';
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$civilite = (isset($_POST['civilite'])) ? $_POST['civilite'] : '';
$adresse = (isset($_POST['adresse'])) ? $_POST['adresse'] : '';
$ville = (isset($_POST['ville'])) ? $_POST['ville'] : '';
$code_postal = (isset($_POST['code_postal'])) ? $_POST['code_postal'] : '';

        require_once('inc/header.inc.php');
        ?>
        <!-- CONTENU HTML -->
        <h1>Inscription</h1>

        <form action="" method="post">
            <?= $msg; ?>
            <label>Pseudo:</label>
            <input type="text" name="pseudo" value="<?= $pseudo ?>">
            <label>Mot de passe:</label>
            <input type="text" name="mdp">
            <label>Nom:</label>
            <input type="text" name="nom" value="<?= $nom ?>">
            <label>Prénom:</label>
            <input type="text" name="prenom" value="<?= $prenom ?>">
            <label>Email:</label>
            <input type="text" name="email" value="<?= $email ?>">
            <label>Civilité:</label>
            <select name="civilite">
                <option value="m">Homme</option>
                <option value="f" <?= ($civilite == 'f') ? 'selected' : '' ?> >Femme</option>
            </select>
            <label>Ville:</label>
            <input type="text" name="ville" value="<?= $ville ?>">
            <label>Code Postal:</label>
            <input type="text" name="code_postal" value="<?= $code_postal ?>">
            <label>Adresse:</label>
            <input type="text" name="adresse" value="<?= $adresse ?>">
            <input type="submit" name="inscription">

        </form>






        <?php
        require_once('inc/footer.inc.php')
        ?>
