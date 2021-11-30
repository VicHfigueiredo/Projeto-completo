<?php
    include("../views/header.php");
    include_once("../models/conexao.php");
include_once("../models/bancoUsuarios.php");
?>  
    <form method="Post" action="../controllers/alterarUsuarios.php">
    <?php
    $codUsu =$_POST['codUsuAlterar'];
    $usuario = listaTudoUsuariosCod($conexao,$codUsu);
    ?>
        <p>Código <input type="text" name="codigo" value="<?=$usuario['codUsu']?>" ></p>
        <p>Usuário <input type="text" name="email" value="<?=$usuario['emailUsu']?>" ></p>
        <p>Senha do Usuário<input type="senha" name="senha" value="<?=$usuario['senhaUsu']?>" ></p>
        <p>PIN<input type="text" name="pin"></p>
  
        <button type="submit" >Salvar</button>
    </form>
<?php
include("../views/footer.php");
?>