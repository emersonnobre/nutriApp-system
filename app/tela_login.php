<?php

if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["senha"])){
  require_once("conexao.php");
  require_once("config.php");
  $sql = new Sql();
  $results = $sql->select("select email from tb_nutricionista");
  foreach ($results as $result) {
    foreach ($result as $key => $value) {
      $emailNutri = $value;
    }
  }
  $paciente=new Paciente();
  $email=addslashes($_POST["email"]);
  $senha=addslashes($_POST["senha"]);

  if ($email == $emailNutri) {
    if (Nutricionista::login($emailNutri, $senha)) {$_SESSION["id"] = 1; header("location: tela_pacientes_nutri.php"); } else {$err=1;}
  }else {
    if ($paciente->login($email,$senha)){
      if(isset($_SESSION['id'])){
        header("location:tela_refeicoes_paciente.php");
      } else{
        header("location:tela_login.php");
      }
    } else{
      $err = 1;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Entrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.php" />
  </head>
  <body class="bodyA">
    <header>
      <div class="box-md">
        <h1 class="text-xl"><strong>Login</strong></h1>
        <form class="form" method="POST" action="">
          <div class="inputBox">
            <input type="text" name="email" placeholder="" required="" />
            <label for="email">E-mail</label>
          </div>
          <div class="inputBox">
            <input
              type="password"
              name="senha"
              placeholder="" required=""
            />
            <label for="senha">Senha</label>
          </div>
          <strong><input type="submit" value="LOGIN"/></strong>
        </form>
        <a class="text-little"
          href="tela_esqueci_senha.html"
          style="color: yellow; text-decoration: none;"
          ><strong>Esqueci minha senha</strong></a
        >
        <p class="text-little">Não tem uma conta?</p>
        <a class="text-little" href="tela_cadastro.php" style="color: yellow; text-decoration: none;"
          ><strong>Cadastre-se</br></strong></a
        >
        
      </div>
    </header>
    <div id="error" class="toasts toast--error">
    E-mail ou senha inválidos
    </div>
    <?php
    if (isset($err)) {
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
      $err = 0;
    }
    ?>
    
  </body>
</html>
