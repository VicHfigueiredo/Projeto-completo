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
  <form action="listaTudoClienteNome.php" method="GET">
    <div class="row mb-3">
      <label for="inputNome" class="col-sm-2 col-form-label">Digite o nome do Usuário</label>
      <div class="col-sm-3">
        <input type="text" required name="nomeCliente" class="form-control" id="inputNome">
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
      <th scope="col">Código Usuário</th>
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
    $nomeCliente = isset($_GET['nomeCliente'])?$_GET['nomeCliente'] :"";
    IF($nomeCliente != "") {
    $cliente = listaTudoClienteNome($conexao,$nomeCliente);
    if ($cliente) {

       foreach($cliente as $clientes) :

    ?>
      <tr>
        <th scope="row"><?= $clientes['codCli'] ?></th>
        <td><?= $clientes['codUsuFK'] ?></td>
        <td><?= $clientes['nomeCli'] ?></td>
        <td><?= $clientes['cpfCli'] ?></td>
        <td><?= $clientes['foneCli'] ?></td>
        <td>
          <form action="../controllers/deletarClientes.php" method="POST">
            <input type="hidden" name="codClideletar" value="<?=$clientes['codCli']?>"> 
             <button type="submit" class="btn btn-danger"> X </button>
          </form>
        </td>
        
        <td>
          <form action="formAlterarClientes.php" method="POST">
            <input type="hidden" name="codUsuAlterar" value="<?=$clientes['codCli']?>"> 
             <button type="submit" class="btn btn-danger"> Alterar</button>
          </form>
        </td>

      </tr>
    <?php
    endforeach;
      }
    }
    
    ?>

  </tbody>
</table>


<?php include_once("footer.php");

?>