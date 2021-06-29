<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
    
$nutri = new Nutricionista();
$nutri->loadbyId();

if($_GET["name"]){
	$nutri->setNome($_GET["name"]);
	$nutri->updateNutri();
}
if($_GET["email"]){
	$nutri->setEmail($_GET["email"]);
	$nutri->updateNutri();
}
if($_GET["password"]){
	$nutri->setSenha(password_hash($_GET["password"], PASSWORD_DEFAULT));
	$nutri->updateNutri();
}

header("Location: tela_perfil_nutri.php");
?>