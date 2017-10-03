<?php
require_once('inc/init.inc.php');

// traitement pour vider le panier

if (isset($_GET['action']) && $_GET['action'] == 'vider') {
	unset($_SESSION['panier']);
	// On ne vide que la partie PANIER de la session, si USER était connecté cela n'aurais pas d'impact !
}

// traitement pour supprimer un produit du panier :
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
	retirerProduit($_GET['id']);
}

// traitement pour finaliser une commande
// Vérifier la disponibilité des produits : DE TOUS LES PRODUITS !! ===> BOUCLE !
	// Si un produit n'est plus dispo, 2 cas de figure :
		// 1 - Le stock est inférieur à la commande
			// -> diminuer la quantité commandé et prévenir l'utilisateur
		// 2 - Le stock est nul !
			// -> Supprimer le produit et prévenir l'utilisateur

// Enregistrer les infos en BDD :
	// Table commande on enregistre la commande
	// Table détails on enregistre les détails POUR CHAQUE PRODUIT ===> BOUCLE !
	// Table on retire les stock commandés POUR CHAQUE PRODUIT ===> BOUCLE !

// On envoi un email au client avec sont numéro de commande !

if (isset($_POST['paiement'])) { // Cela signifie que l'utilisateur à cliqué sur le bouton pour payer

	for($i = 0; $i < sizeof($_SESSION['panier']['id_produit']); $i++){

		$stock_commande = $_SESSION['panier']['quantite'][$i];
		$id_produit_commande = $_SESSION['panier']['id_produit'][$i];

		$resultat = $pdo -> query("SELECT stock FROM produit WHERE id_produit = $id_produit_commande");
		$produit = $resultat -> fetch(PDO::FETCH_ASSOC);

		// La requete ci-dessus nous permet de récupérer le stock du produit pour ensuite le comparé à la quantité de produit commandé.

		if ($stock_commande > $produit['stock']) { // Si la commande est supérieur au stock restant dans la BDD.
			// On a un probleme pas suffisament de stock, mais 2 cas de figures sont possibles:

			if ($produit['stock'] > 0) { // Il reste quand même quelques produits
				$_SESSION['panier']['quantite'][$i] = $produit['stock'];
				$msg .= '<div class="erreur">Le stock du produit' . $_SESSION['panier']['titre'][$i] . ' n\'est malheureusement pas suffisant. Votre commande a été modifiée, veuillez vérifier la nouvelle quantité avant de valider votre panier.</div>';

			}else{ // Il ne reste plus du tout de produit
				$msg .= '<div class="erreur">Le produit' . $_SESSION['panier']['titre'][$i] . ' n\'est malheureusement plus disponlible. Votre commande a été modifiée, veuillez la vérifier avant de valider votre panier.</div>';
				retirerProduit($_SESSION['panier']['id_produit'][$i]);

				$i--;
				// ATTENTION !!! Etant donnée que $i pacourt toutes les lignes du panier, lorsque je supprime un produit (une ligne) et les suivantes remontent (array_splice) $i risque de rater un élément du tableau. On doit donc OBLIGATOIREMENT décrémenter $i afin de corriger l'erreur possible.

			}

		} // fin du if
	} // fin de la boucle FOR

	if (empty($msg)) { // cela signifie que tout est OK les stocks sont bien disponibles pour chacun des produits !
		// LE PAIEMENT s'éxécute chez notre partnaire (paypal, stripe, banque, paysafe ...) et la réponse est positive.

		$id_membre = $_SESSION['membre']['id_membre'];
		$montant = montantTotal();

		$resultat = $pdo -> exec("INSERT INTO commande (id_membre, montant, date_enregistrement, etat) VALUES ($id_membre, $montant, NOW(), 'en cours de traitement')");

		$id_commande = $pdo -> lastInsertID(); // L'id de la commande que l'on vient d'enregister.

		for($i = 0; $i < sizeof($_SESSION['panier']['id_produit']); $i++){

			$id_produit = $_SESSION['panier']['id_produit'][$i];
			$quantite = $_SESSION['panier']['quantite'][$i];
			$prix = $_SESSION['panier']['prix'][$i];

			// enregistrer les infos dans details_commande :
			$resultat = $pdo ->exec("INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES ($id_commande, $id_produit, $quantite, $prix)");


			// modifier le stock dans Produit :
			$resultat = $pdo -> exec("UPDATE produit SET stock = (stock - $quantite) WHERE id_produit = $id_produit");
			// La requete ci-dessus modifie la valeur du stock pour chaque produit commandé. On prend le stock actuel, moins le stock commandé.

		}
		// FELICITATIONS !
		$msg .= '<div class="validation">Félicitations, votre commande numéro' . $id_commande . ' est terminée. Vous allez recevoir un mail de confirmation.</div>';
		// UNSET PANIER - VIDER LE PANIER
		unset($_SESSION['panier']);
		// MAIL de confirmation
		// mail(); // ce référé formulaire5.php dans le dossier POST du cours
	}
}

$page="Panier";
require_once('inc/header.inc.php');
?>
<h1>Panier</h1>
<?= $msg ?>
<table border="1" style="border-collapse : collapse; cellpadding:7;">
	<tr>
		<th colspan="6" >PANIER <?= (quantitePanier()) ? quantitePanier() : '' ?></th>
	</tr>
	<tr>
		<th>Photo</th>
		<th>Titre</th>
		<th>Quantité</th>
		<th>Prix unitaire</th>
		<th>Total</th>
		<th>Supprimer</th>
	</tr>

	<?php if (empty($_SESSION['panier']['id_produit'])) : ?>
	<tr>
		<td colspan="6">Votre panier est vide, n'hésitez pas à consulter notre <a href="boutique.php"><u>Boutique</u></a></td>
	</tr>
	<?php else : ?>

		<?php for($i = 0; $i < sizeof($_SESSION['panier']['id_produit']) ; $i ++) : ?>
		<!-- Ligne Produit -->
		<tr>
			<td><a href="fiche_produit.php?id=<?= $_SESSION['panier']['id_produit'][$i] ?>"><img src="<?= RACINE_SITE ?>photo/<?= $_SESSION['panier']['photo'][$i] ?>" height="30" /></a></td>
			<td><?= $_SESSION['panier']['titre'][$i] ?></td>
			<td><span style="padding: 3px; border: solid 1px black; text-align;: center; width: 20px; display: inline-block"><?= $_SESSION['panier']['quantite'][$i] ?></span></td>
			<td><?= $_SESSION['panier']['prix'][$i] ?>€</td>
			<td><?= ($_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i] ) ?>€</td>
			<td>
				<a href="?action=supprimer&id=<?= $_SESSION['panier']['id_produit'][$i] ?>"><img src="img/delete.png" height="22"/></a>
			</td>
		</tr>
		<!-- Fin ligne Produit -->

	<?php endfor ; ?>

		<tr>
			<td colspan="4">TOTAL :</td>
			<td colspan="2"><?= montantTotal() ?> €</td>
		</tr>


		<tr>
			<td colspan="6">
				<?php if(userConnecte()) : ?>
				<form method="post" action="">
					<input type="hidden" name="amount" value="" />
					<input type="submit" value="Payer" name="paiement" />
				</form>
				<?php else : ?>
					Veuillez vous connecter pour finaliser votre commande.<a href="connexion.php">Connexion</a>
				<?php endif; ?>
			</td>
		</tr>

		<tr>
			<td colspan="6"><a href="?action=vider"><u>Vider le panier</u></a></td>
		</tr>
	<?php endif ; ?>

</table>






<?php
require_once('inc/footer.inc.php');
?>
