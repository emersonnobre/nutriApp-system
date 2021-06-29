<?php

require_once("config.php");
if (!isset($_SESSION["id"])) 
    header ("location: ../index.html");
unset($_SESSION["id"]);
session_unset();
session_destroy();
header("Location: tela_login.php");

?>