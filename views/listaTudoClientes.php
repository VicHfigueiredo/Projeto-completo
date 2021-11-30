<?php 
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}
include_once("../views/header.php");
include_once("../models/conexao.php");
include_once("../models/bancoClientes.php");
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Deletar</th>
      <th scope="col">Alterar</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $clientes = listaTudoClientes($conexao);
      foreach($clientes as $cliente):
      ?>
    <tr>
      <th scope="row"><?=$cliente['codCli'] ?></th>
      <td><?=$cliente['nomeCli'] ?></td>
      <td><?=$cliente['cpfCli'] ?></td>
      <td><?=$cliente['foneCli'] ?></td>
      <td><?=$cliente['datanasCli'] ?></td>
      
      
      <td>
          <form action="../controllers/deletarClientes.php" method="POST">
            <input type="hidden" name="codClideletar" value="<?=$cliente['codCli']?>"> 
             <button type="submit" class="btn btn-danger"> X </button>
          </form>
        </td>
      
    
      <td>
          <form action="formAlterarClientes.php" method="POST">
            <input type="hidden" name="codClialterar" value="<?=$cliente['codCli']?>"> 
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