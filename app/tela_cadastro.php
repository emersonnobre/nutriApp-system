<?php

require_once("config.php");
$user=new Paciente();
$sql=new Sql();

if (isset($_POST["nome"]) && isset($_POST["DataDeNascimento"]) && isset($_POST["telefone"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["cpf"])){
  $nome = $_POST['nome'];
  $dataNascimento=$_POST['DataDeNascimento'];
  $telefone=$_POST['telefone'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
  $cpf = $_POST['cpf'];

  if ($user->ValidaNumero($telefone)==true || $user->ValidaEmail($email)==true || $user->ValidaCpf($cpf)==true ){
  
    $err = 1;
  
  }else {
    $sql->solquery("insert into pacientes (nome,telefone,dataNascimento,email,senha,cpf, id_plano) values($sql->conn->quote($nome),'$telefone','$dataNascimento','$email','$senha','$cpf', default)");
    $results = $sql->select("select id from pacientes where cpf = :CPF", array(':CPF'=>$cpf));
    foreach ($results as $result) {
      foreach($result as $key => $value){
        $idpaciente = $value;
      }
    }
    $sql->solquery("insert into tb_planos (id_paciente) values (:ID)", array(':ID'=>$idpaciente));
    $user->loadbyId($idpaciente);
    $user->insertPlanoId();
    $user->loadPlanoId();
    $sql->solquery("insert into tb_planos_refeicoes (id_plano, id_refeicao) values (:ID, 1), (:ID, 2), (:ID, 3), (:ID, 4), (:ID, 5), (:ID, 6)", array(':ID'=>$user->getPlanoId()));
    ?>
    <div id="modalAviso" class="modal">
      <div class="modal-aviso text-little">
        <h3 class="text-bold">Cadastrado com sucesso!</h3>
        <p class="text-min">Agora, faça seu log in</p>
        <a href="tela_login.php" class="btn">LOG IN</a>
      </div>
    </div>
    <script>
      function mostraModal(idModal) {
        const modal = document.getElementById(idModal);
        modal.classList.add('mostrar');
      }
      mostraModal('modalAviso');
    </script>
  <?php
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cadastre-se</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/estilo.php" />
  <link rel="stylesheet" type="text/javascript" href="js/alerts.js"/>
</head>

<body class="bodyA">
  <header>
    <div class="box-md">
      <h1 class="text-xl"><strong>Cadastro</strong><br /></h1>
      <form class="form" method="post" action="">
        <div class="inputBox widthh">
          <input type="text" name="nome" placeholder="" required="" />
          <label for="nome">Nome:</label>
        </div>
        <div class="inputBox widthh">
          <input type="tel" name="telefone" placeholder="" required="" />
          <label for="telefone">Telefone:</label>
        </div>
        <div class="inputBox widthh">
          <input type="date" name="DataDeNascimento" placeholder="" required="" />
          <label for="dataDeNascimento">Data de nascimento:</label>
        </div>
        <div class="inputBox widthh">
          <input type="text" name="email" placeholder="" required="" />
          <label for="email">E-mail:</label>
        </div>
        <div class="inputBox widthh">
          <input type="password" name="senha" placeholder="" required="" />
          <label for="senha">Senha:</label>
        </div>
        <div class="inputBox widthh">
          <input type="cpf" name="cpf" placeholder="" required="" />
          <label for="cpf">CPF:</label>
        </div>
        <img class="perfil" src="imagens/usuario.png" alt="fotoperfil" />
        <input type="submit" value="Enviar" />
      </form>
    </div>
  </header>
  <div id="error" class="toasts toast--error">
  Erro!
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
      window.location.href("tela_cadastro.php")
    </script>
    <?php
  }
  ?>
  <button class="btn btnAbsolute" onclick="document.location='tela_login.php'">Voltar</button>
</body>

</html>