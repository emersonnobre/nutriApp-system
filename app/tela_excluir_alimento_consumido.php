<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
header('Location: tela_amostra_refeicao_paciente.php?ref='.$_SESSION["ref"]);
$sql = new Sql();
$ref = $_SESSION["ref"];
$idalimento = $sql->select("
select id from alimentos where
nome = :NOME
", array(
    ':NOME'=>$_GET["nome"]
));

$alimento = new Alimento();
foreach ($idalimento as $id) {
    foreach ($id as $key => $value) {
        $alimento->loadbyId($value);
    }
}

$idref = Paciente::returnIdbyName($ref);

$alimento->excluirAlimentoConsumido($_SESSION["id"], $idref, date("Y-m-d"));

die();