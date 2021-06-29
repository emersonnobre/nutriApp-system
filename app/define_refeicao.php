<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$_SESSION["refeicao"] = $_GET["ref"];
header("Location: tela_amostra_refeicao_paciente.php?ref=".$_GET["ref"]);

