<?php

class Maison
{
    public static $espaceTerrain = '500m²'; // Static signifie que l'attribut appartient à la classe.
    public $couleur = 'blanc'; // l'attribut appartient à l'objet...
    private static $nbPiece = 7; // propriété privée et static (accès par un getter)
    const HAUTEUR = '10m'; // une constante appartient toujours à la classe

    public static function getNbPiece() // getter d'une propriété static privée
    {
        return self::$nbPiece; // self signifie 'cette class'. L'équivalent de $this mais pour la classe.
    }
}

echo 'Espace terrain : ' . Maison::$espaceTerrain .'<br>';
$mon_objet = new Maison;

echo 'Couleur : ' .$mon_objet->couleur .'<br>';
echo 'Nombre de pièces : ' . Maison::getNbPiece() . '<br>';
echo 'Hauteur : ' . Maison::HAUTEUR . '<br>';
?>
