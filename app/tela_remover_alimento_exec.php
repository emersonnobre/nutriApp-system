<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");

$name = $_GET["name"];
Alimento::removerAlimentoDoBanco($name);
header("Location: tela_remover_alimento.php");
?>

<script>
alert("Alimento removido!");
</script>