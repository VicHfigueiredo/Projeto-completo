<?php
session_start();
$email = isset($_SESSION["emailUsuario"])
?$_SESSION["emailUsuario"]:null;
if($email !=null){
    include("../views/header.php");
}

?>  
<div style="margin-top: 30px;" class="container" text-align="center" bg-secondary >
    <form method="Post" action="../controllers/inserirUsuarios.php">
        <p>Email<input type="email" name="email"></p>
        <p>Senha<input type="password" name="senha"></p>
        <p>PIN<input type="text" name="pin"></p>
  
 
        <button type="submit" class="btn btn-danger">Salvar</button>
    </form>
</div>
<?php

include("../views/footer.php");
?>