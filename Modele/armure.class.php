<?php
require_once("pdo.php");

class Armure{
    public $nom;
    public $niveau;

    public function __construct(string $nom, int $niveau){
        $this->nom = $nom;
        $this->niveau=$niveau;
    }
}
