<?php

include("../models/conexao.php");
include("../models/bancoFuncionarios.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if (alterarFuncionarios($conexao,$codFun,$codUsuFK,$nomeFun,$funcaoFun,$foneFun,$datanasFun)){
    echo("Funcionário alterado com sucesso");
}else{
    echo("Funcionário não alterado.");
}

include("../views/footer.php");
