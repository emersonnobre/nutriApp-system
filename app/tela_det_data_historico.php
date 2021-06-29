<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$paciente = new Paciente();
$paciente->loadbyId($_SESSION["idpaciente"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico personalizado</title>
    <link rel="stylesheet" href="css/estilo.php">
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
    rel="stylesheet"
    >
</head>
<body class="bodyA">
    <header class="cabecalho">
        <img src="imagens\usuario.png" alt="usuario" width="100px" height="100px">
    	<a href="tela_perfil_paciente_nutri.php"><p class="text-little"><?=$paciente->getNome()?></p></a>
        <h1 class="text-xl">Histórico alimentar personalizado</h1>
    </header>
    <div class="box-little">
        <p class="text-little text-bold text-center">
            Insira um intervalo de tempo, por favor.
        </p>
        <br>
        <br>
        <br>
        <form action="tela_plano_historico_2_re.php" method="post" class="form">
            <div class="campo">
                <label for="dat_inic" class="text-bold">
                    Data inicial: 
                </label>
                <input type="date" name="dat_inic" id="" required="" autofocus>
            </div>
            <div class="campo">
                <label for="dat_fin" class="text-bold">
                    Data final: 
                </label>
                <input type="date" name="dat_fin" id="" required="">
            </div>
            <div class="text-center">
                <input type="submit" value="Confirmar" class="btn">
            </div>
        </form>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_sol_historico_alimentar.php'">Voltar</button>
</body>
</html>