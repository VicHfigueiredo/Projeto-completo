<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}

include_once("header.php");
?>
<img src="img/jogosonline.gif" width="100%"/>

<?php
include_once("footer.php");
?>