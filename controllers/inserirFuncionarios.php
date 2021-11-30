<?php

include("../models/conexao.php");
include("../models/bancoFuncionarios.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(inserirFuncionarios($conexao,$codUsuFK,$nomeFun,$funcaoFun,$telefoneFun,$datadenascFun)){
    echo("Funcionário cadastrado com sucesso");
}else{
    echo("Funcionário não cadastrado.");
}

include("../views/footer.php");
