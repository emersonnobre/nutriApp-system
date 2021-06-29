<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$user = new Paciente();
$id = $_SESSION["idpaciente"];
$user->loadbyId($id);
$refeicoes = Paciente::returnRefeicoes();


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Perfil do paciente</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/estilo.php" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="bodyA">
    <header class="cabecalho animate_animated animate_backInDown">
    	<img src="imagens\usuario.png" alt="usuario" width="100px" height="100px">
    	<a href="tela_perfil_paciente_nutri.php"><p class="text-little"><?php echo $user->getNome();?></p></a>
      <h1 class="text-xl">Plano alimentar nutricionista</h1>
    </header>
    <div class="containerCaixas animate_animated animate_backInUp">
      <?php
      $i = 0;
      $lista = array();
      foreach ($refeicoes as $result) {
        foreach ($result as $key => $value) {
            
          array_push($lista, $value);
          $html = "<div class='grid-item green'>";
            
          $html .= "<a class='button-false' href='tela_amostra_refeicao_nutri.php?ref=".str_replace("%20", "+", $lista[$i])."'>".$lista[$i]."</a>";
            
          $html .= "</div>";
          
          echo $html;
          $i++;
        }
      }
      ?>
      <div class="grid-item green">
        <a class="button-false" href="tela_dicas_nutri_nutri.php">Dicas do nutri</a>
      </div>
    </div>
    <button class="btn btnAbsolute btn-logout" onclick="document.location='tela_pacientes_nutri.php'">Sair deste perfil</button>
  </body>
</html>