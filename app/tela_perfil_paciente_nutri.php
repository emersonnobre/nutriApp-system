<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$user = new Paciente();
$user->loadbyId($_SESSION["idpaciente"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri</title>
    <link rel="stylesheet" href="css/estilo.php">
    <link rel="stylesheet" href="css/reset.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
</head>
<body class="bodyA">
    <header class="cabecalho animated">
        <img src="imagens\usuario.png" alt="usuario" width="170px" height="170px">
        <p class="text-md"><?php echo $user->getNome();?></p>
    </header>
    <div class="box-xl text-little">
        <div class="box-half text-left">
            <p class="text-bold important-text">Data de nascimento: <?php echo "<p >".$user->showdt_nascimento()."</p>";?></p>
            <!-- <p class="text-little"></p> -->
            <br>
            <p class="text-bold important-text">Peso: <?php echo "<p >".$user->getPeso()."</p>";?></p>
            <!-- <p class="text-little"></p> -->
            <br>
            <p class="text-bold important-text">Início do acompanhamento: <?php echo "<p >".$user->showdt_acompanhamento()."</p>";?></p>
            <!-- <p class="text-little"></p> -->
            <br>
            <p class="text-bold important-text">Objetivo: <?php echo "<p >".$user->getObjetivo()."</p>";?></p>
            <!-- <p class="text-little"></p> -->
            <br>
            <p class="text-bold important-text">Anotações: <?php echo "<p >".$user->getAnotacoes()."</p>";?></p>
            <!-- <p class="text-little"></p> -->
            <br>
            <button class="btn" onclick="document.location='tela_edicao_perfil_paciente_nutri.php'">Editar</button>
        </div>
        <div class="box-half">

        </div>
        <div class="box-half">
            <button class="btn" onclick="document.location='tela_plano_nutri.php'">Editar plano alimentar</button>
            <button class="btn" onclick="document.location='tela_relatorio_alimentar.php'">Relatório alimentar</button>
            <button class="btn" onclick="document.location='tela_sol_historico_alimentar.php'">Histórico alimentar</button>
            <button class="btn btn-logout" onclick="document.location='remover_paciente.php'">Remover paciente</button>
        </div>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_plano_nutri.php'">Voltar</button>
</body>
</html>