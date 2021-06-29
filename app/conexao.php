<?php

require_once("config.php");
global $pdo;
try{
    $pdo = new PDO("mysql:dbname=id17044767_nutri;host=localhost", "root", "");
    //id17044767_root - usuario
    //6&6xqgE3Ho9s_m@T - senha
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "ERRO".$e->getMessage();
    exit;

}

?>