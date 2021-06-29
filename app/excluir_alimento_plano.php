<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");

if (isset($_GET["alimento"]) && isset($_GET["qtd"])) {
    header("Location: tela_amostra_refeicao_nutri.php?ref=".$_SESSION["refeicao"]);
    $paciente = new Paciente();
    $paciente->loadbyId($_SESSION["idpaciente"]);
    $alimento = new Alimento();
    $alimento->loadbyName($_GET["alimento"]);
    $paciente->loadPlanoId();
    echo $paciente->getPlanoId();
    $nomeAlimento = $_GET["alimento"];
    $quantidade = $_GET["qtd"];
    $idref = Paciente::returnIdbyName($_SESSION["refeicao"]);
    echo $idref;
    echo $alimento->getCodigo();
    echo $alimento->getNome();
    Nutricionista::deleteAlimentoPlano($alimento->getCodigo(), $paciente->getPlanoId(), $idref, $quantidade);
}

?>