<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$paciente = new Paciente();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.php">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body class="bodyA">
    <div class="box-little">
        <h1 class="text-little text-center text-bold">Dicas cadastradas</h1>
        <ul>
            <?php
            $paciente->loadbyId($_SESSION["idpaciente"]);            
            $dicas = $paciente->returnDicas();
            
            if (count($dicas) > 0) {
                foreach ($dicas as $dica) {
                    foreach ($dica as $key => $value) {
                        ?>
                        <li class="text-little">
                        <a href="trata_dica_paciente.php?action=remove&dica=<?=$value?>">
                        <div class="box-border box-transition-color red">
                        <p>
                        <?=$value?>
                        </p>
                        </div>
                        </a>
                        </li>
                        <?php
                    }
                }
            } else {
                echo "<p class='text-min important-text'>Sem dicas cadastradas para este paciente.</p>";
            }
            
            ?>
        </ul>
        <h1 class="text-little text-center text-bold">Adicionar dicas</h1>
        <ul>
            <?php
            $allDicas = Nutricionista::getAllDicas();
            $array = array();
            foreach ($allDicas as $allDica) {
                foreach ($allDica as $key => $valuee) {
                    $dicasPaciente = $paciente->returnDicas();
                    if (count($dicasPaciente) > 0){
                        $valida = 1;
                        foreach ($dicasPaciente as $dicaPaciente) {
                            foreach ($dicaPaciente as $key => $valuep) {
                                
                                array_push($array, $valuep);
                            } 
                        }
                        foreach ($array as $key => $valuearray) {
                            if ($valuee == $valuearray) {
                                $valida = 2;
                            }
                        }
                        if ($valida != 2) {
                            ?>
                            <li class="text-little">
                            <a href="trata_dica_paciente.php?action=add&dica=<?=$valuee?>">
                            <div class="box-border box-transition-color">
                            <p>
                            <?=$valuee?>
                            </p>
                            </div>
                            </a>
                            </li>
                            <?php
                        }
                        
                    } else {
                        ?>
                        <li class="text-little">
                        <a href="trata_dica_paciente.php?action=add&dica=<?=$valuee?>">
                        <div class="box-border box-transition-color">
                        <p>
                        <?=$valuee?>
                        </p>
                        </div>
                        </a>
                        </li>
                        <?php
                    }
                        
                }
            }
            ?>
        </ul>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_plano_nutri.php'">Voltar</button>

</body>
</html>