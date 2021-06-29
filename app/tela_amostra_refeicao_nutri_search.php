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
    <h1 class="text-xl"><?php echo $_SESSION["refeicao"]?><h1>
    </header>
    <div class="box-little">
	    <form  class="form" method="get" action="">
        <div class="searchBox">
          <input type="text" name="search" placeholder="" />
		  	  <input type= "submit" id="btnBusca" value="Buscar">
        </div>
      </form>
      <?php

      if ($_GET["search"]){
        if (count($results) > 0){
          echo "<ul>";
            foreach($results as $row){
                foreach($row as $key=>$value){
                  echo  "<li class='text-little'>" .ucfirst($value);
                  echo "<a href='inserir_alimento_plano.php?alimento=$value' class='btn-insert'>INSERIR</a>";
                  echo "<li>";
                }   
            }
          echo "</ul>";
        }

        else {
            echo "<p class='text-center text-little'>Alimento não encontrado</p>";
        }
      } else {
        echo "<h1 class='text-md text-bold'>Alimentos da dieta</h1>";
        $alimentosdieta = Alimento::alimentosPlano($_SESSION["idpaciente"], $_SESSION["refeicao"]);
        foreach ($alimentosdieta as $alimento) {
          foreach ($alimento as $key => $value) {
            echo "<p class='text-little'>".ucfirst($value);
            echo "<button onclick='redirect()' class='button check'><img src='imagens/editar.png' alt='edit' width='14px' height='14px'/></button>";
            echo "<button onclick='redirect()' class='button check'><img src='imagens/x.png' alt='excluir' width='14px' height='14px'/></button>";
            echo "</p><br>";
          }
        }
      }
      
        
      ?>
      
	</div>
    <button class="btn btnAbsolute" onclick="document.location='tela_plano_nutri.php'">Voltar</button>
</body>
</html>