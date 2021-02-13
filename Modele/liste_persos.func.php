<?php
require_once("pdo.php");
function liste_persos():array{
    $result = $GLOBALS['database']->query("SELECT id_perso AS id, nom FROM perso");    
    return $result->fetchAll();
}