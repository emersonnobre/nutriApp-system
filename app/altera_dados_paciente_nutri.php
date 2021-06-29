<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$nutri = new Nutricionista();
$user = new Paciente();
$user->loadbyId($_SESSION["idpaciente"]);
$dados;



if ($_GET["peso"]){
    $user->setPeso($_GET["peso"]);
} if ($_GET["date_ac"]){
    $user->setdt_acompanhamento($_GET["date_ac"]);
} if ($_GET["obj"]){
    $user->setObjetivo($_GET["obj"]);
} if ($_GET["anot"]){
    $user->setAnotacoes($_GET["anot"]);
}

$dados = array(
    $user->getPeso(),
    $user->getdt_acompanhamento(),
    $user->getObjetivo(),
    $user->getAnotacoes(),
    $user->getId()
);

if (count($dados) > 0){
    Nutricionista::updatePaciente($dados);
}

header("Location: tela_perfil_paciente_nutri.php");

?>