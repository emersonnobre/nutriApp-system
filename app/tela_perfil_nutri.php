<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$nutri = new Nutricionista();
$nutri->loadbyId();

?>
<!DOCTYPE html>
<html>
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
	<header class="cabecalho">
    <h1 class="text-xl">Perfil do nutricionista</h1>
	</header>
	<section class="box-xl">
    <div class="text-left text-little">
      <p class="important-text text-bold">Nome: <?php echo "<p class='text-min'>".$nutri->getNome()."</p>";?></p>
      <br>
      <p class="important-text text-bold">E-mail: <?php echo "<p class='text-min'>".$nutri->getEmail()."</p>";?></p>
      <br>
    </div>
    
    <button class="btn" onclick="document.location='tela_edicao_perfil_nutri.php'">Editar</button>
    <button class="btn" onclick="document.location='tela_editar_senha_nutri.php'">Editar senha</button>
    <button class="btn" onclick="document.location='tela_cadastrar_alimento.php'">Cadastrar um novo alimento na base</button>
    <button class="btn" onclick="document.location='tela_lista_alimentos_cadastrados.php'">Lista de alimentos cadastrados na base</button>
    <button class="btn" onclick="document.location='tela_lista_dicas_cadastradas.php'">Lista de dicas cadastradas na base</button>
    <button class="btn btn-logout" onclick="document.location='destroy_session.php'">Sair da conta</button>


	</section>
  <button class="btn btnAbsolute" onclick="document.location='tela_pacientes_nutri.php'">Voltar</button>

</body>
</html>