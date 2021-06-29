<?php

require_once("../class/Sql.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$bd = new Sql();
$stmt = "select nome from refeicoes;";
$result = $bd->select($stmt);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Perfil do paciente</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
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
      <h1 class="text-xl">Adicionar refeição<h1>
    </header>
    <div class="box-md line-space-lt">
      <form action="" class="form">
        <div class="searchBox">
          <input type="text" name="submit" placeholder="Nova refeição" required="" />
          <input id="btnBusca" type="submit" value="Cadastrar">
        </div>
      </form>
      <h1 class="text-md">Refeições cadastradas</h1></p>
		  <p class="text-little">Café da manhã</p>
	    <p class="text-little">Lanche da tarde</p>
		  <p class="text-little">Almoço</p>
	  </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_plano_nutri.php'">Voltar</button>
  </body>
</html>
