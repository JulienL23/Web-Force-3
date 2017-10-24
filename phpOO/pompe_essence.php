<?php
/*
Créer une class Vehicule
Attribut : $litreEssence.
Méthode : getter et setter pour $litreEssence

Créer une class Pompe
Attribut : $littreEssence
Méthodes : getter et setter pour $litreEssence ainsi qu'une autre méthode  donnerEssence ($vehicule). donnerEssence fait le plein de la voiture (ajoute 50 litres à son reservoir)  et soustrait autant de litres au reservoir de la pompe  à essence.

Instancier un véhicule.
Instancier une pompe à essence.
Donner 0 litres d'essence au véhicule.
Donner 800 litres d'essence à la pompe.
Faire le plein de la voiture avec la pompe à essence

*/

class Vehicule
{
    // un attribut $litreEssence qui représente combien de litre d'essence il y a dans le reservoir de la voiture
   private $litreEssence;

   public function getLitreEssence()
   {
       return $this->litreEssence;
   }
   public function setLitreEssence($essence)
   {
       $this->litreEssence = $essence;
   }

}
class Pompe
{
   private $litreEssence;
   public function getLitreEssence()
   {
       return $this->litreEssence;
   }
   public function setLitreEssence($essence)
   {
       $this->litreEssence = $essence;
   }

   public function donnerEssence(Vehicule $vehicule)
   {
       $vehicule->setLitreEssence(50);
       $this->setLitreEssence($this->getLitreEssence() -50);
   }

}
$vehicule = new Vehicule;
$vehicule->setLitreEssence(0);

$pompe = new Pompe;
$pompe->setLitreEssence(800);

$pompe->donnerEssence($vehicule);

echo '<pre>';
var_dump($vehicule);
echo '</pre>';

echo '<pre>';
var_dump($pompe);
echo '</pre>';
