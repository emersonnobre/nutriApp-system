<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");

if (isset($_POST["name"]) && isset($_POST["cal"]) && isset($_POST["carb"]) && isset($_POST["prot"]) && isset($_POST["gord"])) {
    $valida = Alimento::validaAlimento($_POST["name"]);
    if ($valida == 1){?>
        <script>
            alert("Alimento já cadastrado!");
        </script>
    <?php
    } else {
        Alimento::insereAlimento(lcfirst($_POST["name"]), $_POST["cal"], $_POST["carb"], $_POST["prot"], $_POST["gord"]);
        header("Location: tela_lista_alimentos_cadastrados.php");
    }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nutri</title>
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
    <header class="cabecalho text-bold">
        <h1 class="text-xl">Cadastrar alimento</h1>
    </header>
    <div class="box-little text-little text-bold">
        <form class="form" method="post" action="">
            <div class="campo">
                <label for="nome_alimento">Nome do alimento:</label>
                <input type="text" name="name" required=""/>
            </div>
            <div class="campo">
                <label for="cal">Calorias(cal): </label>
                <input type="number" name="cal" required=""/>
            </div>
            <div class="campo">
                <label for="carbo">Carboidratos(g): </label>
                <input type="number" name="carb" required=""/>
            </div>
            <div class="campo">
                <label for="prot">Proteínas(g):</label>
                <input type="number" name="prot" required=""/>
            </div>
            <div class="campo">
                <label for="gord">Gorduras(g):</label>
                <input type="number" name="gord" required=""/>
            </div>
            <br/>
            <input type="submit" class="btn" value="Cadastrar"/>
        </form>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_perfil_nutri.php'">Voltar</button>
</body>
</html>