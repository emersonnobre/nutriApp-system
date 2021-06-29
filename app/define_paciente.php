<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");

$_SESSION["idpaciente"] = $_GET["idpaciente"];

header("Location: tela_plano_nutri.php");

die();

?>