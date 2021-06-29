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
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&display=swap"
      rel="stylesheet"
    />
</head>
<body class="bodyA">
	<header class="cabecalho">
		<h1 class="text-xl">Editar perfil</h1>
	</header>
	<section class="box-xl" style="text-align:left;">
		<form class="form" method="get" action="altera_dados_paciente.php">
			<div class="campo">
				<label for="name">Nome:</label>
				<input type="text" name="name" value="<?php echo $user->getNome();?>"/>
			</div>
			<div class="campo">
				<label for="email">E-mail:</label>
				<input type="email" name="email" value="<?php echo $user->getEmail();?>"/>				
			</div>
			<div class="campo">
				<label for="date">Data de nascimento:</label>
				<input type="date" name="date" value="<?php echo $user->getdt_nascimento();?>"/>				
			</div>
			<div class="campo">
				<label for="tel">Telefone:</label>
				<input type="tel" name="tel" value="<?php echo $user->getTelefone();?>"/>
			</div>
			<br/>
			<input type="submit" value="Concluído" onclick="document.location='tela_perfil_usuario.php'"/>
		</form>
	</section>
	<button class="btn btnAbsolute" onclick="document.location='tela_perfil_usuario.php'">Voltar</button>
</body>
