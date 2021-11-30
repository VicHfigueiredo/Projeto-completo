<?php 
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoClientes.php");
?>


<div class="container m-5 p-5">
  <form action="listaTudoClientesCod.php" method="GET">
    <div class="row mb-3">
      <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o código do cliente:</label>
      <div class="col-sm-3">
        <input type="number" required name="CodCli" class="form-control" id="inputCodigo">
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
    $codCliente = isset($_GET['CodCli'])?$_GET['CodCli'] : 0;

    if ($codCliente > 0) {

      $cliente = listaTudoClientesCod($conexao,$codCliente);


    ?>
      <tr>
        <th scope="row"><?= $cliente['codCli'] ?></th>
        <td><?= $cliente['nomeCli'] ?></td>
        <td><?= $cliente['cpfCli'] ?></td>
        <td><?= $cliente['foneCli'] ?></td>
        <td>
          <form action="../controllers/deletarClientes.php" method="POST">
            <input type="hidden" name="codClideletar" value="<?=$cliente['codCli']?>"> 
             <button type="submit" class="btn btn-danger"> X </button>
          </form>
        </td>
        
        <td>
          <form action="formAlterarClientes.php" method="POST">
            <input type="hidden" name="codClialterar" value="<?=$cliente['codCli']?>"> 
             <button type="submit" class="btn btn-danger"> Alterar</button>
          </form>
        </td>

      </tr>
    <?php
    }
    ?>

  </tbody>
</table>


<?php include_once("footer.php");
?>