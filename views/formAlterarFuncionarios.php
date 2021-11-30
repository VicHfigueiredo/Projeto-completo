<?php
    include("../views/header.php");
    include_once("../models/conexao.php");
include_once("../models/bancoFuncionarios.php");
?>  
    <form method="Post" action="../controllers/alterarFuncionarios.php">
    <?php
    $codFun =$_POST['codFunalterar'];
    $funcionario = listaTudoFuncionariosCod($conexao,$codFun);
    ?>
        <p>Código <input type="text" name="codFun" value="<?=$funcionario['codFun']?>" ></p>
        <p>Código FK <input type="text" name="codUsuFK" value="<?=$funcionario['codUsuFK']?>" ></p>
        <p>Nome<input type="text" name="nomeFun" value="<?=$funcionario['nomeFun']?>" ></p>
        <p>Função<input type="senha" name="funcaoFun" value="<?=$funcionario['funcaoFun']?>" ></p>
        <p>Telefone<input type="senha" name="foneFun" value="<?=$funcionario['foneFun']?>" ></p>
        <p>Data de nascimento<input type="senha" name="datanasFun" value="<?=$funcionario['datanasFun']?>" ></p>
        
        <button type="submit" >Salvar</button>
    </form>
<?php
include("../views/footer.php");
?>