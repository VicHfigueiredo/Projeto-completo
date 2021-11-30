<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}
    include("../views/header.php");
    include_once("../models/conexao.php");
    include_once("../models/bancoClientes.php");
    include_once("../models/bancoUsuarios.php");
    
?>  

<div class="container m-5 p-5">
  <form action="../views/cadastroclientes.php" method="POST">
    <div class="row mb-3">
      <label for="inputCodigo" class="col-sm-2 col-form-label">Digite o código do usuario:</label>
      <div class="col-sm-3">
        <input type="number" required name="codUsuario" class="form-control" id="inputCodigo">
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>
    </div>
  </form>
</div>

<?php 

$codUsuario = isset($_POST['codUsuario'])?$_POST['codUsuario']:0;
$usuario = listaTudoUsuariosCod($conexao,$codUsuario);

if($codUsuario){
  

?>


    <form method="Post" action="../controllers/inserirClientes.php">
    <p>Código do Usuário <input type="text" name="codUsu" value="<?=$usuario['codUsu']?>"></p>
        <p>Nome <input type="text" name="nome"></p>
        <p>CPF<input type="text" name="cpf"></p>
        <p>Telefone <input type="text" name="telefone"></p>
        <p>Data de Nascimento <input type="date" name="datadenasc"></p>
        <button type="submit" class="btn btn-danger" >Salvar</button>
    </form>

<?php };?>
<?php
include("../views/footer.php");
?>