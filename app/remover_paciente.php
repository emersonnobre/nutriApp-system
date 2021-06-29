<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$paciente = new Paciente();
$paciente->loadbyId($_SESSION["idpaciente"]);
$paciente->autoRemove();
session_destroy();
header('Location: tela_pacientes_nutri.php');