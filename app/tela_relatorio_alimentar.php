<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$user = new Paciente();
$user->loadbyId($_SESSION["idpaciente"]);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório alimentar</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.php">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
</head>
<body class="bodyA">
    <header class="cabecalho">
        <img src="imagens\usuario.png" alt="usuario" width="100px" height="100px">
    	<a href="tela_perfil_paciente_nutri.php"><p class="text-little"><?php echo $user->getNome();?></p></a>
        <h1 class="text-xl">Relatório alimentar</h1>
    </header>
    <div class="box-little">
        <p class="text-little text-bold text-center">
            Insira um intervalo de tempo, por favor.
        </p>
        <br>
        <br>
        <br>
        <form action="tela_relatorio_alimentar_3.php" method="post" class="form">
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
                <input type="submit" value="Confirmar" class="btn" >
            </div>
            <button class="btn" onclick="document.location='tela_relatorio_alimentar_2.php'">Relatório completo</button>
        </form>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_perfil_paciente_nutri.php'">Voltar</button>
</body>
</html>