<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$alimento = new Alimento();
$results = Alimento::list();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Nutri</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.php" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
        rel="stylesheet"
    />
</head>
<body class="bodyA">
    <header class="cabecalho text-bold">
    <h1 class="text-xl">Lista de alimentos</h1>
    </header>
    <section class="box-md">
        <div class="box-half line-space-lt text-md scroll">
            <ul>
            <?php
            foreach ($results as $row) {
                foreach ($row as $key=>$value) {

                    echo "<li class='text-little'>" .ucfirst($value). "</li>";

                }
            }
            ?>
            </ul>
        </div>

        <div class="box-half"></div>
        <div class="box-half text-md ">
            <button class="btn" onclick="document.location='tela_cadastrar_alimento.php'">Cadastrar alimento</button>
            <button class="btn btn-logout" onclick="document.location='tela_remover_alimento.php'">Remover alimento</button>
        </div>
    </section>
    <button class="btn btnAbsolute" onclick="document.location='tela_perfil_nutri.php'">Voltar</button>
</body>
</html>