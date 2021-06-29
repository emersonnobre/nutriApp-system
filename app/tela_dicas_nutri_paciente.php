<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$user = new Paciente();
$user->loadbyId($_SESSION["id"]);
$dicas = $user->returnDicas();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dicas do nutri</title>
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
    <header class="cabecalho">
        <img src="imagens\usuario.png" alt="usuario" width="100px" height="100px">
        <a href="tela_perfil_usuario.php"><p class="text-little"><?php echo $user->getNome();?></p></a>
        <h1 class="text-xl">Dicas do nutri</h1>
    </header>
    <div class="containerCaixas">
        <?php
        
        if (count($dicas) > 0){
          foreach ($dicas as $dica) {
            foreach ($dica as $key => $value) {
              echo "<div class='grid-item green '><p class = 'text-little'>".ucfirst($value)."</p></div>";
            }
          }
        } else {
          echo "<p class='text-md important-text text-bold'>Ainda não existem dicas cadastradas para você.</p>";
        }
        
        ?>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_refeicoes_paciente.php'">Voltar</button>
</body>
</html>