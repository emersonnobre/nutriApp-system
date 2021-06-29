<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");


$nome = isset($_GET["search"])?$_GET["search"]:null;

$sql = new Sql();
$results = $sql->select("select nome from alimentos where lower(nome) like :NOME", array(
    ':NOME'=>'%'.$nome.'%'
));

?>

<!DOCTYPE html>
<html lang="en">
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
<header class="cabecalho">
    <h1 class="text-xl"><?php echo $_SESSION["ref"];?><h1>
    </header>
    <div class="box-little">
	  	<form  class="form" method="get" action="">
        <div class="searchBox">
          <input type="text" name="search" placeholder="" required=""/>
		  	  <input type= "submit" id="btnBusca" value="Buscar">
        </div>
      </form>
      <?php

      if (count($results) > 0){
        echo "<ul>";
        foreach($results as $row){
            foreach($row as $key=>$value){
              
              echo  "
              <li class='text-little'>" .ucfirst($value)."
              <a class='btn-insert' href='tela_adicionar_alimentos_consumidos.php?nomealimento=".$value."'>INSERIR</a></li>
              ";
            }   
        }
        echo "</ul>";
      } else {
          echo "<p class='text-little'>Alimento não encontrado</p>";
      }
        
      ?>
      
	</div>
    <button class="btn btnAbsolute" onclick="document.location='tela_refeicoes_paciente.php'">Voltar</button>
</body>
</html>