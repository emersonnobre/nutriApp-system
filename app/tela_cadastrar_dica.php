<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");

if (isset($_POST["dica"])) {
    header("Location: tela_lista_dicas_cadastradas.php");
    $trimDica = ltrim($_POST["dica"]);
    $trimDica2 = rtrim($trimDica);
    Nutricionista::insertDica(ucfirst($trimDica2));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.php">
</head>
<body class="bodyA">
    <header class="cabecalho text-bold">
        <h1 class="text-xl">Inserir dica</h1>
    </header>
    <div class="box-little center">
        <form action=""  method="post" class="form">
            <div class="campo">
                <textarea class="text-area" name="dica" cols="70" rows="10" required=""></textarea>
            </div>
            <input type="submit" value="Inserir">
        </form>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_lista_dicas_cadastradas.php'">Voltar</button>

</body>
</html>