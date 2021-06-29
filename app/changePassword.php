<?php

require_once("config.php");
if ($_SESSION["id"] == null) header("location:../index.html");
$idUser = $_SESSION["id"];
$sql = new Sql();
$results = $sql->select("select senha from pacientes where id = :ID", array(':ID' => trim($idUser)));
foreach ($results as $result)
{
    foreach ($result as $key => $value)
    {
        $realPassword = $value;
    }
}


if ($_POST['oldPassword'])
{
    if ($_POST['newPassword']) 
    {
        if ($_POST['c_newPassword']) 
        {
            if ($_POST['c_newPassword'] == $_POST['newPassword'])
            {
                $verify = password_verify($_POST['oldPassword'], $realPassword);
                if ($verify)
                {
                    $newHashPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
                    $sql->solquery("update pacientes set senha = :PASSWORD where id = :ID", array(':ID' => $idUser, ':PASSWORD'     =>$newHashPassword));
                    header("location: tela_perfil_usuario.php");
                } else
                {
                    $_SESSION["error"] = "Senha antiga incorreta";
                    header("location: tela_editar_senha_paciente.php");
                }
            } else {
                $_SESSION["error"] = "As novas senhas não coincidem";
                header("location: tela_editar_senha_paciente.php");
            }
            
        } else {
            $_SESSION["error"] = "Digite a confirmação da nova senha";
            header("location: tela_editar_senha_paciente.php");
        }
    } else {
        $_SESSION["error"] = "Digite a nova senha";
        header("location: tela_editar_senha_paciente.php");
    }
} else {
    $_SESSION["error"] = "Digite a senha antiga";
    header("location: tela_editar_senha_paciente.php");
}
