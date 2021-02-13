<?php
require_once("pdo.php");
require_once("arme.class.php");
require_once("armure.class.php");
require_once("action.class.php");

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
    
    public function persoFromDb(int $id){
        $prepared = $GLOBALS['database']->prepare("SELECT * FROM perso WHERE id_perso=:id");
        $prepared->execute(array(":id"=>$id));
        $perso = $prepared->fetch();
        $arme=new Arme();
        $arme->armeFromDb($perso['arme']);
        $armeSecondaire=new Arme();
        $armeSecondaire->armeFromDb($perso['armeSecondaire']);
        $this->createPerso($perso['nom'], $arme, $armeSecondaire, $perso['force'], $perso['pvmax'], $perso['nbPotions'], $perso['miniature'], $perso['portrait']);
    }

    public function createPerso(String $nom, Arme $arme, Arme $armeSecondaire=null, int $force=10, int $pvmax=200, int $nbPotions=0, String $miniature="./persos/default.png", String $portrait="./persos/default.png"){
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