<?php
require_once('./Modele/perso.class.php');
require_once('./Modele/action.class.php');

if(isset($_GET['perso1'])){ 
    $perso1=$_GET['perso1'];
}
else{
    $perso1=3;
}
if(isset($_GET['perso2'])){ 
    $perso2=$_GET['perso2'];
}
else{
    $perso2=4;
}

$persoGauche = new Perso();
$persoGauche->persoFromDb($perso1);
$persoDroite = new Perso();
$persoDroite->persoFromDb($perso2);

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
        $faucheuse= new Perso();
        $faucheuse->createPerso("La mort",new Arme());
        $actions[]= new Action($faucheuse, "fin", "<h2>Tout le monde est mort</h2>");
    break;
    case 1:
        $actions[]= new Action($persoGauche, "fin", "$persoGauche->nom a gagné");
    break;    
}

require("./Modele/liste_persos.func.php");
$liste_personnages=liste_persos();
require("./Vue/combat.php");