<?php

class ContactController extends Controller
{
    public function create()
    {
        // Cette fonction create n'a pas vraiment de traitement particulier. Son objectif est simplement de nous retourner la vue : Formulaire de contact : view/contact/create.php
        $this->render('contact.create');
        // la fonction a été créée dans le controller général mais est disponible car ContactController hérite du controller général.
        // L'objectif de la fonction render est de faire un require du bon fichier de vue
    }

    public function store()
    {
        // Dans cette fonction on va devoir interagir avec la BDD et donc on récupère un objet de la classe Model en précisant la table a interroger : contacts.
        $contact = new Model('contacts');
        // On créer 3 variables à la volée dans notre objet (prenom, nom, phone) auxquelles on affecte les infos transmises via le formulaire.
        $contact->prenom = $_POST['prenom'];
        $contact->nom = $_POST['nom'];
        $contact->phone = $_POST['phone'];
        // La fonction save permet d'effectuer un INSERT dans la BDD. 
        $contact->save();
        header('Location: /contact/index');
    }

    public function index()
    {
        $contact = new Model('contacts');
        $GLOBALS['contacts'] = $contact->all();
        $this->render('contact.index');
    }

    public function edit()
    {
        $contact = new Model('contacts');
        $contact->find($_GET['id']);
        $GLOBALS['contact'] = $contact;
        $this->render('contact.edit');
    }

    public function update()
    {
        $contact = new Model('contacts');
        $contact->find($_GET['id']);
        $contact->prenom = $_POST['prenom'];
        $contact->nom = $_POST['nom'];
        $contact->phone = $_POST['phone'];
        $contact->save();
    }

    public function delete()
    {
        $contact = new Model('contacts');
        $contact->delete($_GET['id']);
    }
}
 ?>
