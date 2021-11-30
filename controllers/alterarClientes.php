<?php

include("../models/conexao.php");
include("../models/bancoClientes.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if (alterarClientes($conexao,$codigo,$codigoUsuFK,$nomeCliente,$cpfCliente,$foneCliente,$datanasCli)){
    echo("Cliente alterado com sucesso");
}else{
    echo("Cliente não alterado.");
}

include("../views/footer.php");
