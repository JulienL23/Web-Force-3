<?php
class Animal
{
    protected function deplacement()
    {
        return 'Je me déplace';
    }
    public function manger()
    {
        return 'Je mange chaque jour';
    }
}

class Elephant extends Animal
{
    public function quiSuisJe()
    {
        return 'Je suis éléphant et ' . $this->deplacement();
    }
}

class Chat extends Animal
{
    public function quiSuisJe()
    {
        return 'Je suis un chat';
    }
    public function manger()
    {
        return 'Je mange comme un chat';
    }
}

$eleph = new Elephant;
echo 'Elephant : ' . $eleph->manger() . '<br>';
echo 'Elephant : ' . $eleph->quiSuisJe() . '<hr>';

$chat = new Chat;
echo 'Chat : ' . $chat->manger() . '<br>';
echo 'Chat : ' . $chat->quiSuisJe() . '<hr>';

// remarquez que la méthode manger() de la class Chat réécrit la methode manger() de la class Animal

?>
