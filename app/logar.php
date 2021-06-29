<?php

if(isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["senha"])){
    require_once("conexao.php");
    require_once("config.php");
    $paciente=new Paciente();
    $email=addslashes($_POST["email"]);
    $senha=addslashes($_POST["senha"]);

    if ($paciente->login($email,$senha)==true){
        if(isset($_SESSION['id'])){

        header("location:tela_refeicoes_paciente.php");

        } else{
            header("location:tela_login.php");
        }

    } else{
        header("location:tela_login.php");
    }
}


?>