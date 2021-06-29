<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$_SESSION["ref"] = $_GET["ref"];
$paciente = new Paciente();
$paciente->loadbyId($_SESSION["idpaciente"]);
$idref = Paciente::returnIdbyName($_SESSION["ref"]);
$sql = new Sql();
$alimento = new Alimento();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.php">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
</head>
<body class="bodyA">
    <header class="cabecalho">
        <h1 class="text-xl">Histórico alimentar do <?=$paciente->getNome()?> (<?=$_SESSION["ref"]?>)</h1>
    </header>
    <div class="box-xl scroll xl">
            <?php 
            
            $datas = $paciente->getAllDateByRef($_SESSION["ref"]);
            if (count($datas) > 0){
                foreach ($datas as $data) {
                    foreach ($data as $key => $data) {
                        $ts = new DateTime();
                        $ts = strtotime($data);
                ?>
                    <div class="historico block">
                        <p class="text-little text-bold important-text"><?=date("d/m/Y", $ts)?></p>
                        <table class="table">
                            <tr>
                                <th class="text-little important-text">Alimento</th>
                                <th class="text-little important-text">Carboidratos(g)</th>
                                <th class="text-little important-text">Proteínas(g)</th>
                                <th class="text-little important-text">Gorduras(g)</th>
                                <th class="text-little important-text">Calorias(cal)</th>
                            </tr>
                            <?php
                            $nomesalimentos = $paciente->getAlimentosByDate($data, $idref);
                        
                            foreach($nomesalimentos as $alimentoo){
                                foreach ($alimentoo as $key => $nomealimento) {
                                    $ids = $sql->select("
                                    select id from alimentos where 
                                    nome = :NOME
                                    ", array(
                                        ':NOME'=>$nomealimento
                                    ));
    
                                    foreach ($ids as $id) {
                                        foreach ($id as $key => $valueid) {
                                            $alimento->loadbyId($valueid);
                                        }
                                    }
                            ?>        
                                    <tr>
                                        
                                        <?php
                                        
                                        $quantidades = Alimento::returnQuantidade($nomealimento, $_SESSION["idpaciente"], $idref, $data);
    
                                        foreach ($quantidades as $quantidade) {
                                            foreach ($quantidade as $key => $valuequantidade) {
                                                $qtd = $valuequantidade;
                                            }
                                        }
                                        
                                        ?>
                                        <td class="text-little text-left"><?=$alimento->getNome()?> (<?=$qtd?> g)</td>
                                        <td class="text-little"><?=$alimento->calculaCarboidratos($qtd)?></td>
                                        <td class="text-little"><?=$alimento->calculaProteinas($qtd)?></td>
                                        <td class="text-little"><?=$alimento->calculaGorduras($qtd)?></td>
                                        <td class="text-little"><?=$alimento->calculaCalorias($qtd)?></td>
                                    </tr>
                            <?php
                            }
                            }
                            ?>
                        </table>
                    </div>
                <?php
                }
                }
            } else {
                ?>
                <p class="text-min important-text text-bold">Nenhum alimento foi inserido até o momento.</p>
                <?php
            }
            ?>
        </div>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_plano_historico.php'">Voltar</button>
</body>
</html>