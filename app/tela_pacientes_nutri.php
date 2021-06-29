<?php

require_once("config.php");
if (!$_SESSION["id"]) {
   header("location: tela_login.php");
}
$ids = Nutricionista::returnPacientes();
$nutri = new Nutricionista();
$nutri->loadbyId();
$paciente = new Paciente();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Pacientes</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="css/estilo.php" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="bodyA">
    <header class="cabecalho">
    	<img src="imagens\usuario.png" alt="usuario" width="100px" height="100px">
    	<a href="tela_perfil_nutri.php"><p class="text-little"><?php echo $nutri->getNome();?></p></a>
      <h1 class="text-xl">Lista de pacientes</h1>
    </header>

    <div class="box-md text-center scroll flex">
      <form class="form" method="get" action="">
        <div class="searchBox">
          <input type="search" name="search" />
          <input  id="btnBusca" type="submit" value="Go">
        </div>
      </form>
      <?php
      if(isset($_GET["search"])){
        $results = Nutricionista::searchPacientes($_GET["search"]);
        if (count($results) > 0 ){
          foreach ($results as $result) {
            foreach ($result as $value) {
                $paciente->loadbyId($value);
              echo "<a href='define_paciente.php?idpaciente=".$paciente->getId()."'>";
            echo "<div class='item-container '>";
            echo "<img src='imagens/usuario.png' alt='usuario' width='100em' height='100em'>";
            echo "<p class='text-little text-center'>"; 
            echo "<strong>". $paciente->getNome() ."</strong>";
            echo "</p>";
            echo "</div>";
            echo "</a>";      
            }
                 
          }
        }
      }else {
        foreach ($ids as $id) {
          foreach ($id as $value) {
            $paciente->loadbyId($value);
            echo "<a href='define_paciente.php?idpaciente=".$paciente->getId()."'>";
            echo "<div class='item-container '>";
            echo "<img src='imagens/usuario.png' alt='usuario' width='100em' height='100em'>";
            echo "<p class='text-little text-center'>"; 
            echo "<strong>". $paciente->getNome() ."</strong>";
            echo "</p>";
            echo "</div>";
            echo "</a>";                    
          }
        }
      }
      ?>
    </div>
  </body>