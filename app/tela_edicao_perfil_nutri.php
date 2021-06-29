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
	<title>Perfil do nutricionista</title>
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
		<form class="form" method="get" action="altera_dados_nutri.php">
			<div class="campo">
				<label for="name">Nome:	</label>
				<input type="text" name="name" value="<?php echo $nutri->getNome();?>"/>
				
			</div>
			<div class="campo">
				<label for="email">E-mail:</label>
				<input type="email" name="email" value="<?php echo $nutri->getEmail();?>"/>
				
			</div>
			<div class="campo">
				<label for="password">Senha:</label>
				<input type="password" name="password" value="<?php echo $nutri->getSenha();?>"/>
				
            </div>
			<input type="submit" value="Concluído"/>
		</form>
	</section>
	<button class="btn btnAbsolute" onclick="document.location='tela_perfil_nutri.php'">Voltar</button>
</body>
</html>