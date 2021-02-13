<?php
require_once("pdo.php");
require_once("perso.class.php");

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