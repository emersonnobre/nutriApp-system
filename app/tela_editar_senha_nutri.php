<?php

require_once("config.php");
if ($_SESSION["id"] == null) {header("location: ../index.html");}
$user = new Nutricionista();
$user->loadbyId($_SESSION["id"]);

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
		<h1 class="text-xl">Editar senha</h1>
	</header>
	<section class="box-little" style="text-align:left;">
		<form class="form" method="post" action="changePasswordNutri.php">
			<div class="campo">
				<label for="oldPassword">Senha antiga:</label>
				<input type="password" name="oldPassword" />
			</div>
			<div class="campo">
				<label for="newPassword">Nova senha:</label>
				<input type="password" name="newPassword" />				
			</div>
			<div class="campo">
				<label for="c_newPassword">Confirme a nova senha:</label>
				<input type="password" name="c_newPassword" />				
			</div>
			<br/>
			<input type="submit" value="Trocar senha"/>
		</form>
	</section>
	<button class="btn btnAbsolute" onclick="document.location='tela_perfil_nutri.php'">Voltar</button>
	
	<div id="error" class="toasts toast--error">
    <?php echo $_SESSION["error"]; ?>
    </div>
    <?php
    if (isset($_SESSION["error"])) {
      ?>
      <script>
      function showError(){
        const not = document.getElementById('error')
        not.classList.add('toast--visible')
        setTimeout(() => {
          not.classList.remove('toast--visible')
        }, 2000);
      }
      showError()
      </script>
      <?php
      unset($_SESSION['error']);
    }
    ?>
    
</body>