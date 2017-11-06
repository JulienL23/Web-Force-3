<?php

class Model
{
    // Au moment de l'instanciation, on va se connecter à la BDD (new PDO), grace aus infos stocker dans $user, $database et dans $password.
    // On en profite également pour enregistrer dans $table le nom de la table à interroger et dans $pdo notre connexion à la BDD.

    public $pdo;
    public $table;
    public $attributes = [];
    public $database = 'contact';
    public $user = 'root';
    public $password = '';
    public $is_new = true;

    public function __construct($table)
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname='.$this->database, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
        $this->table = $table;
    }

    // __set et __get sont des méthodes magiques qui permettent de récupérer les infos liées à l'affectation ou à l'utilisation de variable s n'exsistant pas ou créés à la vollées (prenom, nom, phone)
    // puisse que ces variables n'existe pas, on les stockes dans $attributes qui est un array.


    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    public function __get($key)
    {
        return $this->attributes[$key];
    }

    public function save()
    {
        if($this->is_new){ // Si new est TRUE alors on enregistre un contact, sinon on modifie un contact existant.

            // La requete INSERT INTO, va récupérer toutes les variables créées à la volés et stockées dans la variable $ attributes, pour en faire une requete dynamique. Pour que cela fonctionne il faut absolument que les name des champs du formulaire correspondent aux names des champs dans la BDD.
            $query = 'INSERT INTO '
             . $this->table
             . ' ('
             . implode(', ', array_keys($this->attributes))
             . ') VALUES (:'
             . implode(', :', array_keys($this->attributes))
             . ')';
             $this->execute($query, $this->attributes);
             $this->id = $this->pdo->lastInsertId();
        } else {
            $query = 'UPDATE ' . $this->table . ' SET ';
            foreach($this->attributes as $key => $attributes){
                $query .= $key . ' = :' . $key . ', ';
            }
            $query = substr($query, 0, strlen($query) - 2);
            dd($query);
            $query .= ' WHERE id = :id';

            $this->execute($query, $this->attributes);
        }
    }

    public function execute($query, $params = [], $query_type = '')
    {
        $statement = $this->pdo->prepare($query);
        foreach($params as $key => &$param) {
            if(is_null($param)){
                $type = PDO::PARAM_NULL;
            } else if (is_bool($param)){
                $type = PDO::PARAM_BOOL;
            } else if (is_int($param)){
                $type = PDO::PARAM_INT;
            } else {
                $type = PDO::PARAM_STR;
            }
            $statement->bindParam($key, $param, $type);
        }
        $q = $statement->execute();
        if($query_type == 'all'){
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }else if($query_type == 'select'){
        $this->attributes = $statement->fetch(PDO::FETCH_ASSOC);
        $this->is_new = false;
    }
        return $q;
    }

    public function all()
    {
        $query = 'SELECT * FROM ' . $this->table;
        return $this->execute($query, [], 'all');
    }

    public function find($id)
    {
        $this->execute('SELECT * FROM ' . $this->table . ' WHERE id = :id', ['id' => $id], 'select');
    }

    public function delete($id)
    {
        $this->execute('DELETE FROM ' . $this->table . ' WHERE id = :id', ['id' => $id]);
    }
}

$contact = new Model('contacts');
$contacts = $contact->all();
dd($contacts);

// $model = new Model('contacts');
// $model->execute('INSERT INTO contacts(prenom, nom, phone) VALUES (:prenom, :nom, :phone)', [
//     'prenom' => 'Julien',
//     'nom' => 'Humm',
//     'phone' => '01 23 45 67 89'
// ]);
