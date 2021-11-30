<?php

include("../models/conexao.php");
include("../models/bancoClientes.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);
var_dump($codUsu);
if(inserirClientes($conexao,$codUsu,$nome,$cpf,$telefone,$datadenasc)){
    echo("Cliente cadastrado com sucesso");
}else{
    echo("Cliente não cadastrado.");
}

include("../views/footer.php");
