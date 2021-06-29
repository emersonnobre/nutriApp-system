<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$results = Nutricionista::getAllDicas();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Nutri</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.php" />
</head>
<body class="bodyA">
    <header class="cabecalho text-bold">
        <h1 class="text-xl">Remover dica</h1>
    </header>
    <section class="box-md">
        <div class=" scroll text-md line-space-lt">
            <ul>
            <?php
            
            foreach ($results as $row) {
                foreach ($row as $value) {
                    $html = "<li class = 'text-little'>";
                    $html .= "<div class = 'box-border box-inline box-transition-color' >";
                    $html .= "<p>".$value."</p>";
                    $html .= "</div>";
                    $html .= "<a href='tela_remover_dica_exec.php?dica=$value' class='button check'><img src='imagens/x.png' alt='x' width='14px' height='14px'/></a>";
                    
                    $html .="</li>";

                    echo $html;                    
                }
            }
            ?>
            </ul>
        </div>
    </section>
    <button class="btn btnAbsolute" onclick="document.location='tela_lista_dicas_cadastradas.php'">Voltar</button>
</body>
</html>

