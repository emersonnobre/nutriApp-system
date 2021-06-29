<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
header('Location: tela_plano_historico_2.php');
$_SESSION["inicial"] = $_POST["dat_inic"];
$_SESSION["final"] = $_POST["dat_fin"];