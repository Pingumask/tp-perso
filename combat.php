<?php
require_once('./classes.php');

$faucheuse= new Perso("La mort",new Arme("Faux",0));
$persoGauche = new Perso("Goku",new Arme("Kamehameha",50),new Arme("GenkiDama", 100),50,500,3,"goku","goku");
$persoDroite = new Perso("Freeza",new Arme("Coup de poing", 60),null,60,400,1,"freeza","freeza");

$actions=[];

while($persoGauche->pv > 0 && $persoDroite->pv > 0){
    $actions[]=$persoGauche->jouerSonTour($persoDroite);
    $actions[]=$persoDroite->jouerSonTour($persoGauche);
}

switch($persoGauche->pv <=> $persoDroite->pv){
    case -1:
        $actions[]= new Action($persoDroite, "fin", "<h2>$persoDroite->nom a gagné</h2>");
    break;
    case 0:
        $actions[]= new Action($faucheuse, "fin", "<h2>Tout le monde est mort</h2>");
    break;
    case 1:
        $actions[]= new Action($persoGauche, "fin", "$persoGauche->nom a gagné");
    break;    
}

?>