<?php 
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoFuncionarios.php");
include_once("../models/bancoUsuarios.php");
?>


<div class="container m-5 p-5">
  <form action="listaTudoFuncionariosCod.php" method="GET">
    <div class="row mb-3">
      <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o código do funcionario:</label>
      <div class="col-sm-3">
        <input type="text" required name="CodFun" class="form-control" id="inputCodigo">
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
      <th scope="col">Função</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Deletar</th>
      <th scope="col">Alterar</th>

      
    </tr>
  </thead>
  <tbody>
    <?php
    $codFuncionario = isset($_GET['CodFun'])?$_GET['CodFun'] : 0;

    if ($codFuncionario > 0) {

      $cliente = listaTudoFuncionariosCod($conexao,$codFuncionario);


    ?>
      <tr>
        <th scope="row"><?= $funcionario['codFun'] ?></th>
        <td><?= $funcionario['nomeFun'] ?></td>
        <td><?= $funcionario['funcaoFun'] ?></td>
        <td><?= $funcionario['foneCli'] ?></td>
        <td><?= $funcionario['datanascFun'] ?></td>
        <td>
          <form action="../controllers/deletarFuncionarios.php" method="POST">
            <input type="hidden" name="codFundeletar" value="<?=$funcionario['codFun']?>"> 
             <button type="submit" class="btn btn-danger"> X </button>
          </form>
        </td>
        
        <td>
          <form action="formAlterarFuncionarios.php" method="POST">
            <input type="hidden" name="codFunalterar" value="<?=$funcionario['codFun']?>"> 
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