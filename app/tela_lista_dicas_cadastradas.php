<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.php">
</head>
<body class="bodyA">
    <div class="box-xl">
        <div class="box-half scroll">
            <?php
            $results =  Nutricionista::getAllDicas();
            foreach ($results as $row) {
                foreach ($row as $key => $value) {
                    ?>
                    <div class="box-border box-transition-color">
                        <p class="text-little">
                        <?=$value?>
                        </p>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="box-half"></div>
        <div class="box-half text-md">
            <button class = "btn" onclick="document.location='tela_cadastrar_dica.php'">Inserir uma nova dica</button>
            <button class="btn btn-logout" onclick="document.location='tela_remover_dica.php'">Remover dicas</button>
        </div>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_perfil_nutri.php'">Voltar</button>
</body>
</html>