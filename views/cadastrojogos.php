<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Você não tem acesso nesta página.</div>";
    header("Location:../views/logar.php");
}
    include("../views/header.php");
    
?>  
<div style="margin-top: 30px;" class="container" text-align="center" bg-secondary >
    <form method="Post" action="../controllers/inserirJogos.php">
        <p>Jogo <input type="text" name="jogo"></p>
        <p>Tamanho do jogo<input type="text" name="tamanho"></p>
        <p>Preço <input type="text" name="preco"></p>
        <p>Requisitos <input type="text" name="requisitos"></p>
        <p>Console <input type="text" name="console"></p>
        <p>Classificação<input type="text" name="classificacao"></p>
        <p>Avaliação <input type="text" name="avaliacao"></p>
        <button type="submit" class="btn btn-danger" >Salvar</button>
    </form>
    </div>
    </div>
<?php
include("../views/footer.php");
?>