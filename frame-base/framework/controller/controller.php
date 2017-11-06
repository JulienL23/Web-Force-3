<?php

class controller
{
    // Ce controller général est instancié dans l'index.php

    // La fonction handlerequest, va "scanner" l'URL pour savoir quelle astion a été demandée.
    public function handleRequest()
    {
        require('model/model.php');// On require model qui va effectuer la connexion à la base de donnée.
        // framework.dev/contact/create
        // Explode va créé un tableau : array('framework.dev', 'contact', 'create'), en décomposant les infos dans l'URL
        $exploded = explode('/', $_SERVER['REQUEST_URI']);
        // $controller va contenir le controller : contact
        $controller = $exploded[1];
        // $method va contenir l'action à effectuer : create
        $method = $exploded[2];

        require('controller/' . $controller . '.php'); // require le controller dont on a besoin : controller/contact.php
        $controller = ucfirst($controller) . 'Controller';
        $controller = new $controller;// On instancie le controller dont on a besoin : $controller = new contactController;
        $controller->$method();// Depuis le controller que l'on vient de créer, on lance la méthode demandée dans l'URL : $controller -> create();

        // En résumé :
        // require ('controller/contact.php');
        // $controller = new contactController;
        // $controller = new ContactController;
        // $controller -> create();
    }
    public function render($view)
    {
        // Cette fonction attends un argument du type : nom_du_dossier.nom_du_fichier : contact.create
        // Elle va recréer le chemin complet de la vue à require en commencant par le dossier View , puis le nom du dossier puis le nom du fichier
        // str_replace permet de remplacer le '.'par un '/'
        // Le chemin de notre vue devient : view/contact/create.php
        $chemin_view = 'view/' . str_replace('.', '/', $view) . '.php';
        require($chemin_view);
        // On require la vue demandée
    }
}
 ?>
