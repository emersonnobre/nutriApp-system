<?php


require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$ref = $_SESSION["ref"];
$idalimento = $sql->select("
select id from alimentos where
nome = :NOME
", array(
    ':NOME'=>$_GET["nomealimento"]
));
$alimento = new Alimento();
foreach ($idalimento as $id) {
    foreach ($id as $key => $value) {
        $alimento->loadbyId($value);
    }
}

$idref = Paciente::returnIdbyName($ref);

if (isset($_GET["qtd"])) $_POST["qtd"] = $_GET["qtd"];

if (isset($_POST["qtd"])) {
    
    $alimento->inserirAlimentoConsumido($_SESSION["id"], date("Y-m-d"), $idref, $_POST["qtd"]);
    $proteina = $alimento->returnMacroCalc("proteina", $_POST["qtd"]);
    $calorias = $alimento->returnMacroCalc("caloria", $_POST["qtd"]); 
    $carboidratos = $alimento->returnMacroCalc("carboidrato", $_POST["qtd"]);
    $gorduras = $alimento->returnMacroCalc("gordura", $_POST["qtd"]);
    $alimento->insertMacroConsumed($_SESSION["id"], $proteina, $calorias, $carboidratos, $gorduras);
    header("Location: tela_amostra_refeicao_paciente.php?ref=$ref");
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
<body class = "bodyA">
    <div class="box-little">
        <h2 class="text-md text-center" style="margin-top: 1px;">Inserir alimento</h2>
        <br>
        <br>
        <br>
        <div>
            <form class="form1" action="" method="post">
                <div class="campo">
                    <label class = "text-bold" for="nome">Nome: </label>
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
    
    <button class="btn btnAbsolute" onclick="document.location='tela_amostra_refeicao_paciente.php?ref=<?=$ref?>'">Voltar</button>
</body>
</html>