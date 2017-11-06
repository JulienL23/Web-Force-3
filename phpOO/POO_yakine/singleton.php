<?php
// design pattern : Modèle de conecption : Le design pattern est la réponse trouvée par des développeurs pour répondre à une problématique rencontrée par la communauté.

// Singleton : Est un design pattern qui répond à la question suivante : Comment créer une classe qui soit instanciable UNE SEUL FOIS !??! Une classe pour laquelle in ne puisse exister qu'un SEUL OBJET.


class Singleton
{
    private static $instance = NULL;

    private function __construct(){}; // En mettant le constructeur en private, il devient impossible d'instancier cette classe comme on le fait habituellement.
    private function __clone(){}; // En mettant la fonction clone en private, il devient impossible de cloner un objet de cette classe.

        public static function getInstance(){
            if(is_null(self::$instance)){ // (is_null = !self)
                self::$instance = new Singleton;
                //self::$instance = new self;
            }
            return self::$instance;
        }
}

$singleton = Singleton::getInstance(); // $singleton contient le seule et unique objet de la class Singleton.

// $a = new Singleton; // IMPOSSIBLE !! INSTANCIATION IMPOSSIBLE !!

 ?>
