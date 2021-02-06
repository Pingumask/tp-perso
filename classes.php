<?php
class Arme{
    public $nom;
    public $degats;

    public function __construct(string $nom, int $degats){
        $this->nom=$nom;
        $this->degats=$degats;
    }
}

class Perso{
    public $nom;
    public $miniature;
    public $portrait;
    public $force;
    public $pvmax;
    public $pv;
    public $arme;
    public $armeSecondaire;
    public $armure;
    public $nbPotions;
    

    public function __construct(String $nom, Arme $arme, Arme $armeSecondaire=null, int $force=10, int $pvmax=200, int $nbPotions=0, String $miniature="default", String $portrait="default"){
        $this->nom = $nom;
        $this->arme = $arme;
        $this->armeSecondaire = $armeSecondaire;
        $this->force = $force;
        $this->pvmax = $pvmax;
        $this->pv = $pvmax;
        $this->nbPotions=$nbPotions;
        $this->miniature=$miniature;
        $this->portrait=$portrait;
        $this->armure = new Armure("",0);
    }

    public function attaque(Perso $cible):int{
        $degats = rand($this->force,$this->force+$this->arme->degats) - $cible->armure->niveau;
        if ($degats <5){
            $degats = 5;
        }
        $cible->pv -= $degats;
        if ($cible->pv<0){
            $cible->pv=0;
        }
        return $degats;
    }

    public function utiliserPotion():int{
        $potion = ceil($this->pvmax/5);
        $this->pv += $potion;
        $this->nbPotions = $this->nbPotions - 1;
        return $potion;
    }

    public function changerArme(Arme $nouvelleArme){
        $this->arme = $nouvelleArme;
    }

    public function changerArmure(Armure $nouvelleArmure){
        $this->armure = $nouvelleArmure;
    }

    public function jouerSonTour($cible){
        if ($this->pv < $this->pvmax/3 && $this->arme != $this->armeSecondaire && $this->armeSecondaire!==null){
            $this->changerArme($this->armeSecondaire);
            return new Action($this, "equipement", "$this->nom change d'arme pour : ".$this->armeSecondaire->nom);
        }
        if($this->nbPotions>0 && $this->pv < $this->pvmax/2){
            return new Action($this, "soin", "$this->nom utilise une potion et récupére ".$this->utiliserPotion()." points de vie.");
        }
        return new Action($this, "attaque", sprintf('%s attaque %s avec %s et inflige %d dégats',$this->nom, $cible->nom, $this->arme->nom, $this->attaque($cible)));       
    }
}

class Armure{
    public $nom;
    public $niveau;

    public function __construct(string $nom, int $niveau){
        $this->nom = $nom;
        $this->niveau=$niveau;
    }
}

class Action{
    public $perso;
    public $type;
    public $texte;
    public function __construct(Perso $perso, String $type, String $texte){
        $this->perso=$perso;
        $this->type=$type;
        $this->texte=$texte;
    }
}