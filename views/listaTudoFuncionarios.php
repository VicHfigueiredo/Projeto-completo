<?php include_once("../views/header.php");
include_once("../models/conexao.php");
include_once("../models/bancoFuncionarios.php");
?>
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
      $funcionarios = listaTudoFuncionarios($conexao);
      foreach($funcionarios as $funcionario):
      ?>
    <tr>
      <th scope="row"><?=$funcionario['codFun'] ?></th>
      <td><?=$funcionario['nomeFun'] ?></td>
      <td><?=$funcionario['funcaoFun'] ?></td>
      <td><?=$funcionario['foneFun'] ?></td>
      <td><?=$funcionario['datanasFun'] ?></td>
      
      
      <td>
          <form action="../controllers/deletarFuncionarios.php" method="POST">
            <input type="hidden" name="codFunDeletar" value="<?=$funcionario['codFun']?>"> 
             <button type="submit" class="btn btn-danger"> X </button>
          </form>
        </td>
      
    
      <td>
          <form action="formAlterarFuncionarios.php" method="POST">
            <input type="hidden" name="codFunalterar" value="<?=$funcionario['codFun']?>"> 
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