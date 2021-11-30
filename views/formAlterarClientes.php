<?php
    include("../views/header.php");
    include_once("../models/conexao.php");
include_once("../models/bancoClientes.php");
?>  
    <form method="Post" action="../controllers/alterarClientes.php">
    <?php
    $codCli =$_POST['codClialterar'];
    $cliente = listaTudoClientesCod($conexao,$codCli);
    $codUsuario = $cliente{'codUsuFK'};
    $usuario = listaClienteUsuario($conexao,$codUsuario);
    ?>
        <p>Código Cliente <input type="text" name="codCli" readonly value="<?=$cliente['codCli']?>" ></p>
        <p>Código do usuário <input type="text" name="codUsuFK" readonly value="<?=$cliente['codUsuFK']?>" ></p>
        <p>Email <input type="text" name="emailUsu"  readonly value="<?=$usuario['emailUsu']?>"></p>
        <p>Nome <input type="text" name="nomeCli" value="<?=$cliente['nomeCli']?>" ></p>
        <p>CPF<input type="text" name="cpfCli" value="<?=$cliente['cpfCli']?>" ></p>
        <p>Telefone<input type="text" name="foneCli" value="<?=$cliente['foneCli']?>" ></p>
        <p>Data de Nascimento<input type="date" name="datanasCli" value="<?=$cliente['datanasCli']?>" ></p>
        
  
        <button type="submit" >Salvar</button>
    </form>
<?php
include("../views/footer.php");