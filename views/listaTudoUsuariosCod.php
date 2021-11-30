<?php 
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoUsuarios.php");
?>


<div class="container m-5 p-5">
  <form action="listaTudoUsuariosCod.php" method="GET">
    <div class="row mb-3">
      <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o código do usuario:</label>
      <div class="col-sm-3">
        <input type="number" required name="CodUsu" class="form-control" id="inputCodigo">
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
    </div>
  </form>
</div>

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
    $codUsu = isset($_GET['CodUsu'])?$_GET['CodUsu'] : 0;

    if ($codUsu > 0) {
      $usuario = listaTudoUsuariosCod($conexao,$codUsu);
      if($usuario){
    ?>


      <tr>
        <th scope="row"><?= $usuario['codUsu'] ?></th>
        <td><?= $usuario['emailUsu'] ?></td>
        <td><?= $usuario['senhaUsu'] ?></td>
        <td><?= $usuario['pinUsu'] ?></td>
        <td>
        <td>
          <form action="../controllers/deletarUsuarios.php" method="POST">
            <input type="hidden" name="codUsuDeletar" value="<?=$usuario['codUsu']?>"> 
             <button type="submit" class="btn btn-danger"> X </button>
          </form>
        </td>
        
        <td>
          <form action="formAlterarUsuarios.php" method="POST">
            <input type="hidden" name="codUsuAlterar" value="<?=$usuario['codUsu']?>"> 
             <button type="submit" class="btn btn-danger"> Alterar</button>
          </form>
        </td>


        
      </tr>
    <?php
      }
    }
    ?>

  </tbody>
</table>


<?php include_once("footer.php");
?>