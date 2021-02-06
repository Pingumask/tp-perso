<?php
require_once('./classes.php');

$epee= new Arme("Epée",50);
$hache= new Arme("Hache", 80);

$bouclier= new Armure("Bouclier",20);
$brigandine= new Armure("Brigandine", 30);
//tirer une armure au hazard quand le personnage tape à plus de 70

$faucheuse= new Perso("La mort",new Arme("Faux",0));
$gentil = new Perso("Goku",$epee,50,500,3,"goku","goku");
$mechant = new Perso("Freeza",new Arme("Arc", 60),70,400,1,"freeza","freeza");

$actions=[];

while($gentil->pv > 0 && $mechant->pv > 0){
    //quand le gentil a moins d'un tiers de vie, il sort sa hache
    if ($gentil->pv < $gentil->pvmax/3 && $gentil->arme != $hache){
        $gentil->changerArme($hache);
        $actions[]= new Action($gentil, "equipement", "$gentil->nom sort sa Hache !!!");
    }
    $actions[]= new Action($gentil, "attaque", "$gentil->nom attaque $mechant->nom avec ".$gentil->arme->nom." et inflige ".$gentil->attaque($mechant)." dégats.");
    $actions[]= new Action($mechant, "resultat", "Il reste $mechant->pv pv à $mechant->nom.");

    if($gentil->nbPotions>0 && $gentil->pv < $gentil->pvmax/2){
        $actions[]= new Action($gentil, "soin", "$gentil->nom utilise une potion et récupére ".$gentil->utiliserPotion()." points de vie.");
    }    
    $actions[]= new Action($mechant, "attaque", "$mechant->nom attaque $gentil->nom avec ".$mechant->arme->nom." et inflige ".$mechant->attaque($gentil)." dégats.");
    $actions[]= new Action($gentil, "resultat", "Il reste $gentil->pv pv à $gentil->nom.");

    if ($mechant->nbPotions>0 && $mechant->pv < $mechant->pvmax/2){
        $actions[]= new Action($mechant, "soin", "$mechant->nom utilise une potion et récupére ".$mechant->utiliserPotion()." points de vie.");
    }    
}

switch($gentil->pv <=> $mechant->pv){
    case -1:
        $actions[]= new Action($mechant, "fin", "<h2>$mechant->nom a gagné</h2>");
    break;
    case 0:
        $actions[]= new Action($faucheuse, "fin", "<h2>Tout le monde est mort</h2>");
    break;
    case 1:
        $actions[]= new Action($gentil, "fin", "$gentil->nom a gagné");
    break;    
}

?>