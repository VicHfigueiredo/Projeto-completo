<?php

include("../models/conexao.php");
include("../models/bancoFuncionarios.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);


if(deletarFuncionarios($conexao,$codFunDeletar)){
    echo("Funcionário deletado com sucesso");
}else{
    echo("Funcionário não deletado.");
}

include("../views/footer.php");
