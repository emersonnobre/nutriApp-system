<?php
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.php">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
</head>
<body class="bodyA">
    <div class="box-little">
        <button class="btn-inline" onclick="document.location='tela_plano_historico.php'">Ver todo o período</button>
        <button class="btn-inline" onclick="document.location='tela_det_data_historico.php'">Período personalizado</button>
    </div>
    <button class="btn btnAbsolute" onclick="document.location='tela_perfil_paciente_nutri.php'">Voltar</button>
</body>
</html>