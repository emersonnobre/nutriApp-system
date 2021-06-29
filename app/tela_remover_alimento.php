<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$results = Alimento::list();

?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <header class="cabecalho text-bold">
        <h1 class="text-xl">Remover alimento</h1>
    </header>
    <section class="box-md">
        <div class="box-half scroll text-md line-space-lt">
            <ul>
            <?php
            
            foreach ($results as $row) {
                foreach ($row as $value) {
                    $html = "<li class = 'text-little'>";
                    $ali = $value;
                    $html .= ucfirst($ali);
                    $html .= "<a href='tela_remover_alimento_exec.php?name=$value' class='button check'><img src='imagens/x.png' alt='x' width='14px' height='14px'/></a>";
                    $html .="</li>";

                    echo $html;                    
                }
            }
            ?>
            </ul>
        </div>
    </section>
    <button class="btn btnAbsolute" onclick="document.location='tela_lista_alimentos_cadastrados.php'">Voltar</button>
</body>
</html>

