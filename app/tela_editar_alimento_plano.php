<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$paciente = new Paciente();
$paciente->loadbyId($_SESSION["idpaciente"]);
$paciente->loadPlanoId();
$idref = Paciente::returnIdbyName($_SESSION["refeicao"]);
$alimento = new Alimento();
$alimento->loadbyName($_GET["alimento"]);

if (isset($_POST["qtd"])) {
    header("Location: tela_amostra_refeicao_nutri.php?ref=".$_SESSION["refeicao"]);
    Nutricionista::updateAlimentoPlano($alimento->getCodigo(), $paciente->getPlanoId(), $idref, $_POST["qtd"]);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano alimentar</title>
    <link rel="stylesheet" href="css/estilo.php">
    <link 
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
</head>
<body class="bodyA">
    <div class="box-little">
        <h2 class="text-md text-center" style="margin-top: 1px;">Editar alimento</h2>
        <br>
        <br>
        <br>
        <form action="" method="post" class="form1">
            <div class="campo">
                <label for="nome" class="text-bold">Nome: </label>
                <input type="text" name="nome" readonly="" value="<?=$alimento->getNome()?>">
            </div>
            <div class="campo">
                <label for="qtd" class="text-bold">Quantidade(g): </label>
                <input type="text" name="qtd" value="<?=$_GET['qtd']?> " required="">
            </div>
            <input type="submit" value="Confirmar">
        </form>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_amostra_refeicao_nutri.php?ref=<?=$_SESSION['refeicao']?>'">Voltar</button>
</body>
</html>