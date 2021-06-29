<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
header("Location: tela_dicas_nutri_nutri.php");
$action = $_GET["action"];
$dica  = $_GET["dica"];
$paciente = new Paciente();
$paciente->loadbyId($_SESSION["idpaciente"]);
if ($action == 'add') {
    $paciente->insertDica($dica);
}
else if ($action == 'remove'){
    $paciente->removeDica($dica);
}