<?php

require_once("config.php");
if (!isset($_SESSION["nutri"])) 
    header ("location: ../index.html");
$user = new Paciente();
$user->loadbyId($_SESSION["id"]);

?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <header class="cabecalho">
        <img src="imagens\usuario.png" alt="usuario" width="170px" height="170px">
        <p class="text-md"><?php echo $user->getNome();?></p>
    </header>
    <div class="box-xl left text-littles">
        <div class="box-half text-left">
            <form action="altera_dados_paciente_nutri.php" method="get" class="form text-left" autocomplete="on">
                <div class="campo">
                    <label class="text-bold important-text" for="peso">Peso:</label>
                    <input type="text" name="peso" id="" value="<?php echo $user->getPeso();?>">
                </div>
                <div class="campo">
                    <label class="text-bold important-text" for="date">Início do acompanhamento:</label>
                    <input type="date" name="date_ac" id="" value="<?php echo $user->getdt_acompanhamento();?>">
                </div>
                <div class="campo">
                    <label class="text-bold important-text" for="obj">Objetivo:</label>
                    <input type="text" name="obj" id="" value="<?php echo $user->getObjetivo();?>">
                </div>
                <div class="campo box-text">
                    <label class="text-bold important-text" for="anot">Anotações:</label>
                    <textarea class=" text-area" name="anot" id="" cols="30" rows="10"><?php echo $user->getAnotacoes();?></textarea>
                </div>
                <input type="submit" value="Salvar">
            </form>
        </div>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_perfil_paciente_nutri.php'">Voltar</button>
</body>
</html>