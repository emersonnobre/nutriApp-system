<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
if ($_GET["ref"]){
  $_SESSION["refeicao"] = $_GET["ref"];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Plano alimentar</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="css/estilo.php" />
  </head>
  <body class="bodyA">
    <header class="cabecalho">
        <h1 class="text-xl"><?php echo $_SESSION["refeicao"];?><h1>
    </header>
    <div class="box-little">
	  	<form class="form" method="get" action="tela_amostra_refeicao_nutri_search.php">
        <div class="searchBox">
          <input type="text" name="search" required=""/>
          <input type="submit" id="btnBusca" value="Buscar">
        </div>
      </form>
          <h1 class="text-little text-center text-bold">Alimentos da dieta</h1>
          <?php
          $alimentosdieta = Alimento::alimentosPlano($_SESSION["idpaciente"], $_SESSION["refeicao"]);
          echo "<ul>";

          if (count($alimentosdieta) > 0) {
            foreach ($alimentosdieta as $alimento) {
              foreach ($alimento as $key => $value) {
                $quantidades = $sql->select("
                select qtd from tb_refeicoes_alimentos, alimentos, tb_planos, tb_refeicoes where
                id_alimento = alimentos.id and
                id_plano = tb_planos.id and
                id_refeicao = tb_refeicoes.id and
                tb_refeicoes.nome = :REF and
                alimentos.nome = :ALIMENTO and
                tb_planos.id_paciente = :IDPACIENTE 
                ", array(
                  ':REF'=>$_SESSION["refeicao"],
                  ':ALIMENTO'=>$value,
                  ':IDPACIENTE'=>$_SESSION["idpaciente"]
                ));
  
                foreach ($quantidades as $quantidade) {
                  foreach ($quantidade as $key => $valuee) {
                    $q = $valuee;
                  }
                }
  
                echo "<li class='text-little'>".ucfirst($value)." (".$valuee."g)";
                echo "<a href='tela_editar_alimento_plano.php?alimento=$value&qtd=$valuee' class='button check'><img src='imagens/editar.png' alt='edit' width='14px' height='14px'/></a>";
                echo "<a href='excluir_alimento_plano.php?alimento=$value&qtd=$valuee' class='button check'><img src='imagens/x.png' alt='excluir' width='14px' height='14px'/></a>";
                echo "</li>";
              }
              
            }
          } else {
            echo "<p class = 'text-center'>Sem alimentos cadastrados para esta refeição</p>";
          }
          echo "</ul>";
          ?>
      <button class="btn btnAbsolute" onclick="document.location='tela_plano_nutri.php'">Voltar</button>
    </div>
  </body>
</html>
