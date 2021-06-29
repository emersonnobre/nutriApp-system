<?php 
require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
$sql = new Sql();
$ts = new DateTime(); 
$ts->setDate(2020, 11, 19);
$time = $ts->getTimestamp();
$refeicao = $_GET["ref"];
$_SESSION["ref"] = $_GET["ref"];
$results = $sql->select(
"select alimentos.nome
from alimentos_consumidos, alimentos, pacientes,tb_refeicoes
where id_alimento = alimentos.id and 
id_paciente = pacientes.id and
pacientes.id = :ID and
id_refeicao = tb_refeicoes.id and
tb_refeicoes.nome = :REF and
data = :DATE"
, array(
  ':ID'=>$_SESSION["id"],
  ':REF'=>$refeicao,
  ':DATE'=>date("Y-m-d")
));


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Página inicial</title>
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
    <header class="cabecalho animate_animated animate__fadeIn">
        <h1 class="text-xl"><?php echo $refeicao. " ". date("Y-m-d");?><h1>
    </header>
    <div class="box-little animate_animated animate__fadeIn">
	  	<form  class="form" method="get" action="tela_amostra_refeicao_paciente_search.php?refeicao=<?php echo $_GET["ref"]?>">
        <div class="searchBox">
          <input type="text" name="search" placeholder="" required=""/>
		  	  <input type= "submit" id="btnBusca" value="Buscar">
        </div>
      </form>
      <h1 class="text-little text-bold text-center">Alimentos da dieta</h1>
      
      <?php
      
      $alimento = new Alimento();
      $alimentosdieta = Alimento::alimentosPlano($_SESSION["id"], $refeicao);
      echo "<ul class='text-little'>";
      if(count($alimentosdieta) > 0) {
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
              ':REF'=>$refeicao,
              ':ALIMENTO'=>$value,
              ':IDPACIENTE'=>$_SESSION["id"]
            ));

            foreach ($quantidades as $quantidade) {
              foreach ($quantidade as $key => $valuee) {
                $q = $valuee;
              }
            }
            
            $validando = $sql->select(
            "select * from alimentos_consumidos, alimentos, tb_refeicoes_alimentos, tb_refeicoes where
            alimentos_consumidos.id_alimento = alimentos.id and
            alimentos_consumidos.id_paciente = :IDPACIENTE and
            alimentos_consumidos.data = :DATA and
            alimentos_consumidos.id_refeicao = tb_refeicoes.id and
            alimentos_consumidos.quantidade >= :QUANTIDADE and 
            tb_refeicoes.nome = :NOMEREFEICAO and
            alimentos.nome = :NOMEALIMENTO
            ", array(
              ':IDPACIENTE'=>$_SESSION["id"],
              ':DATA'=>date("Y-m-d"),
              ':QUANTIDADE'=>$valuee,
              ':NOMEREFEICAO'=>$refeicao,
              ':NOMEALIMENTO'=>$value
            ));

            // Mostrando o alimento da dieta apenas se o cara ainda não o ingeriu.
            if (count($validando) == 0){
              echo "<li class='text-little'>".ucfirst($value)." (".$valuee."g)";
              echo "<a class='button check' href='tela_adicionar_alimentos_consumidos.php?nomealimento=".$value."&ref=".$_GET["ref"]."&qtd=".$valuee."'><img src='imagens/visto.png' alt='inserir' width='14px' height='14px'/></a>";
              echo "</li>";
              $valida = 1;
            }
  
          }
        }
        if (!isset($valida)) {
          echo "<li class='text-min important-text'>No dia de hoje, você já consumiu todos os alimentos previstos da dieta. Parabéns!!</li>";
        }
      } else {
        echo "<li class='text-min important-text'>Sem alimentos cadastrados nesta refeição.</li>";
      }
      
      echo "</ul>";
      ?>
      <?php
        echo "<p class='text-little text-bold' style='text-align: center;'>Alimentos consumidos</p>";
        echo "<br>";
        echo "<ul>";
        foreach($results as $row){
          foreach($row as $key=>$value){
            $qtds = $sql->select("
            select quantidade from alimentos_consumidos, alimentos, pacientes, tb_refeicoes where
            id_alimento = alimentos.id and
            id_paciente = pacientes.id and
            id_refeicao = tb_refeicoes.id and
            tb_refeicoes.nome = :REF and
            alimentos.nome = :ALIMENTO and 
            pacientes.id = :IDPACIENTE
            ", array(
              ':REF'=>$refeicao,
              ':ALIMENTO'=>$value,
              ':IDPACIENTE'=>$_SESSION["id"]
            ));
            foreach ($qtds as $qtd) {
              foreach ($qtd as $key => $valuee) {
                $q = $valuee;
              }
            }

            echo  "<li class='text-little'>" .ucwords($value)." (".$q."g)";
            echo "<a href='tela_editar_alimento_consumido.php?nome=$value&qtd=$q' class='button check'><img src='imagens/editar.png' alt='edit' width='14px' height='14px'></a>";
            echo "<a href = 'tela_excluir_alimento_consumido.php?nome=$value' class='button check'><img src='imagens/x.png' alt='excluir' width='14px' height='14px'/></a>";
            echo "</li>";
            
          }   
        }
        echo "</ul>";
      ?>
      
		</div>
    <button class="btn btnAbsolute" onclick="document.location='tela_refeicoes_paciente.php'">Voltar</button>
  </body>
</html>

