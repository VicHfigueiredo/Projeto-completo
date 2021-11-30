<?php 
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}
include_once("../views/header.php");
include_once("../models/conexao.php");
include_once("../models/bancoUsuarios.php");
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Email</th>
      <th scope="col">Senha</th>
      <th scope="col">PIN</th>
      
    </tr>
  </thead>
  <tbody>
      <?php 
      $usuarios = listaTudoUsuarios($conexao);
      foreach($usuarios as $usuario):
      ?>
    <tr>
      <th scope="row"><?=$usuario['codUsu'] ?></th>
      <td><?=$usuario['emailUsu'] ?></td>
      <td><?=$usuario['senhaUsu'] ?></td>
      <td><?=$usuario['pinUsu'] ?></td>
      
      <td>
          <form action="../controllers/deletarUsuarios.php" method="POST">
            <input type="hidden" name="codUsuDeletar" value="<?=$usuario['codUsu']?>"> 
             <button type="submit" class="btn btn-danger"> X </button>
          </form>
        </td>
      
    
      <td>
          <form action="formAlterarUsuarios.php" method="POST">
            <input type="hidden" name="codUsuAlterar" value="<?=$usuario['codUsu']?>"> 
             <button type="submit" class="btn btn-danger"> Alterar </button>
          </form>
        </td>
    </tr>
      <?php endforeach;
       ?>

  </tbody>
</table>

<?php include_once("footer.php") ;
?>