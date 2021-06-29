<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$user = new Paciente();
$user->loadbyId($_SESSION["id"]);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil do usuário</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.php" />
</head>
<body class="bodyA">
	<header class="cabecalho">
		<h1 class="text-xl">Perfil do usuário</h1>
	</header>
	<section class="box-xl text-little">
  <div class="box-half auto-height text-left">
    <p class="text-bold important-text">Nome: <?php echo "<p class='text-min'>".$user->getNome()."</p>";?></p>
    <br>
    <p class="text-bold important-text">E-mail: <?php echo "<p class='text-min'>".$user->getEmail()."</p>";?></p>
    <br>
    <p class="text-bold important-text">Data de nascimento: <?php $ts = strtotime($user->getdt_nascimento()); echo "<p class='text-min'>".date("d/m/Y", $ts)."</p>";?></p>
    <br>
    <p class="text-bold important-text">Telefone: <?php echo "<p class='text-min'>".$user->getTelefone()."</p>";?></p>
    <br>
    <button class="btn" onclick="document.location='tela_edicao_perfil_paciente.php'">Editar</button>
    <button class="btn" onclick="document.location='tela_editar_senha_paciente.php'">Editar senha</button>
    <button class="btn btn-logout" onclick="document.location='destroy_session.php'">Sair da conta</button>
  </div>
  <div class="box-half"></div>
  <div class="box-half"></div>
		
	</section>
  <button class="btn btnAbsolute" onclick="document.location='tela_refeicoes_paciente.php'">Voltar</button>
  
</body>
</html>