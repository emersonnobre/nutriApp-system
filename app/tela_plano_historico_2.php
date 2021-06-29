<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$paciente = new Paciente();
$paciente->loadbyId($_SESSION["idpaciente"]);
$results = $paciente->returnRefeicoes();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico personalizado</title>
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
    	<a href="tela_perfil_paciente_nutri.php"><p class="text-little"><?=$paciente->getNome()?></p></a>
      <h1 class="text-xl">Escolha a refeição desejada</h1>
    </header>
    <div class="containerCaixas animate__animated animate__shakeX">
     
      <?php
      $i = 0;
      $lista = array();
      foreach ($results as $result) {
        foreach ($result as $key => $value) {
            
          array_push($lista, $value);
          $html = "<a class='button-false' href='tela_historico_alimentar_2.php?ref=".str_replace("%20", "+", $lista[$i])."'>";
            
          $html .= "<div class='grid-item green'><p>".$lista[$i]."</p>";
            
          $html .= "</div></a>";
          
          echo $html;
          $i++;
        }
      }
      ?>

    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_sol_historico_alimentar.php'">Voltar</button>
</body>
</html>