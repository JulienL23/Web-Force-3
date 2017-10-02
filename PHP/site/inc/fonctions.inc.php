<?php

// Fonction pour afficher les debug (print_r())

function debug ($tab) {
    echo '<div style="color: white; padding : 20px; font-weight: bold; background:#' . rand(111111, 999999) . '">';

    $trace = debug_backtrace(); // Retourne les infos sur l'emplacement où est exécutée une fonction
    echo 'Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . 'à la ligne : ' . $trace[0]['line'] . '<hr>';

    echo'<pre>';
    print_r($tab);
    echo'</pre>';

    echo '</div>';
}

// fonction pour voir si un utilisateur est connecté:
function userConnecte(){
    if (isset($_SESSION['membre'])) {
        return TRUE;
    }else{
        return FALSE;
    }
}
// Cette fonction nous retourne TRUE si l'utilisateur est connecté et false, s'il ne l'est pas.

// Fonction pour voir si l'utilisateur est admin :
function userAdmin(){
    if (userConnecte() && $_SESSION['membre']['statut'] == 1) {
        return TRUE;
    }else{
        return FALSE;
    }
}
// Si l'utilisateur est connecté... et en plus si son statut c'est 1 alors il a les droits d'admin et pourra accéder au backoffice.

// Fonction pour créer un panier
function creationPanier(){
    if (!isset($_SESSION['panier'])) {

        $_SESSION['panier'] = array();
        $_SESSION['panier']['id_produit'] = array();
        $_SESSION['panier']['quantite'] = array();
        $_SESSION['panier']['prix'] = array();
        $_SESSION['panier']['titre'] = array();
        $_SESSION['panier']['photo'] = array();
    }
}

// Fonction pour ajouter un produit au panier
function ajouterProduit($id_produit, $quantite, $photo, $titre, $prix){
    creationPanier();

    $position_pdt = array_search($id_produit, $_SESSION['panier']['id_produit']); // Array_search permet de chercher un élément dans un tableau . Contrairement à in_array, qui nous retourne juste TRUE ou FALSE, array_search nous retourne sa position ou FALSE. Pratique !!!

    if ($position_pdt !== FALSE) { // $position_pdt stocke (0, 1, 2, 3 etc...) soit la position du produit ... Cela signifie que le produit existe déjà dans la panier.

        $_SESSION['panier']['quantite'][$position_pdt] += $quantite;
        //Donc... Si le produit existe déjà on prend sa quantité (grâce à sa position) et on ajoute la nouvelle quantite à la quantité déjà présente.
    }else{

    $_SESSION['panier']['id_produit'][] = $id_produit;
    $_SESSION['panier']['quantite'][] = $quantite;
    $_SESSION['panier']['photo'][] = $photo;
    $_SESSION['panier']['titre'][] = $titre;
    $_SESSION['panier']['prix'][] = $prix;
    // le crochet vide permet de stocker la valeur au prochain indice disponible...
    }
}
