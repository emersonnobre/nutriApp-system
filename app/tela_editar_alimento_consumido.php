<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$idref = Paciente::returnIdbyName($_SESSION["ref"]);
echo $idref;
$ids = $sql->select("
select id from alimentos where
nome = :NOME 
", array(
    ':NOME'=>$_GET["nome"]
));

foreach ($ids as $id) {
    foreach ($id as $key => $value) {
        $idalimento = $value;
    }
}

$alimento = new Alimento();
$alimento->loadbyId($idalimento);

if (isset($_POST["qtd"])) {
    header("Location: tela_amostra_refeicao_paciente.php?ref=".$_SESSION["ref"]);
    

    if ($_POST["qtd"] > $_GET["qtd"])
    {
        $realQtd = $_POST["qtd"] - $_GET["qtd"];
        $proteina = $alimento->returnMacroCalc("proteina", $realQtd);
        $calorias = $alimento->returnMacroCalc("caloria", $realQtd); 
        $carboidratos = $alimento->returnMacroCalc("carboidrato", $realQtd);
        $gorduras = $alimento->returnMacroCalc("gordura", $realQtd);
        $alimento->insertMacroConsumed($_SESSION["id"], $proteina, $calorias, $carboidratos, $gorduras);
    } else if ($_GET["qtd"] > $_POST["qtd"])
    {  
        $realQtd = $_GET["qtd"] - $_POST["qtd"];
        $proteina = $alimento->returnMacroCalc("proteina", $realQtd);
        $calorias = $alimento->returnMacroCalc("caloria", $realQtd); 
        $carboidratos = $alimento->returnMacroCalc("carboidrato", $realQtd);
        $gorduras = $alimento->returnMacroCalc("gordura", $realQtd);
        $alimento->insertMacroConsumed($_SESSION["id"], $proteina, $calorias, $gorduras, $carboidratos, 2);
    }

    $alimento->atualizarAlimentoConsumido($_SESSION["id"], $idref, date("Y-m-d"), $_POST["qtd"]);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <button class="btn btnAbsolute" onclick="document.location='tela_amostra_refeicao_paciente.php?ref=<?=$_SESSION['ref']?>'">Voltar</button>
</body>
</html>