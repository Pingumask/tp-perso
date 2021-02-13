<?php
require_once("pdo.php");

class Arme{
    public $nom;
    public $degats;

    public function armeFromDb($id){
        if($id){
            $prepared = $GLOBALS['database']->prepare("SELECT * FROM arme WHERE id_arme=:id");
            $prepared->execute(array(":id"=>$id));
            $arme = $prepared->fetch();       
            $this->createArme($arme['nom'], $arme['degats']);
        }
        else{
            $this->createArme("Mains nues", 0);
        }
    }

    public function createArme(string $nom, int $degats){
        $this->nom=$nom;
        $this->degats=$degats;
    }
}