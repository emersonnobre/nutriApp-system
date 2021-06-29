<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
header("Location: tela_remover_dica.php");
$dica = $_GET["dica"];
echo $dica;
Nutricionista::deleteDica($dica);
die();