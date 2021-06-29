<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$nomeAlimento = $_GET["alimento"];
$alimento = new Alimento();
$alimento->loadbyName($nomeAlimento);
$paciente = new Paciente();
$paciente->loadbyId($_SESSION["idpaciente"]);
$paciente->loadPlanoId();

if (isset($nomeAlimento) && isset($_POST["qtd"])){
    header("Location: tela_amostra_refeicao_nutri.php?ref=".$_SESSION["refeicao"]);
    
    $idref = Paciente::returnIdbyName($_SESSION["refeicao"]);
    Nutricionista::insertAlimentoPlano($alimento->getCodigo(), $paciente->getPlanoId(), $idref, $_POST["qtd"]);
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
<body class = "bodyA">
    <div class="box-little">
        <h2 class="text-md text-center" style="margin-top: 1px;">Inserir alimento. Plano: <?=$paciente->getPlanoId()?></h2>
        <br>
        <br>
        <br>
        <div>
            <form class="form1" action="" method="post">
                <div class="campo">
                    <label class = "text-bold" for="alimento">Nome: </label>
                    <input type="text" name="nome" value="<?=$alimento->getNome()?>" readonly="">
                </div>
                <div class="campo">
                    <label class = "text-bold" for="qtd">Quantidade: </label>
                    <input type="text" name="qtd" value="0">
                </div>
                <input type="submit" value="Confirmar">
            </form>
        </div>
    </div>
    
    <button class="btn btnAbsolute" onclick="document.location='tela_amostra_refeicao_nutri.php?ref=<?=$_SESSION['refeicao']?>'">Voltar</button>
</body>
</html>
