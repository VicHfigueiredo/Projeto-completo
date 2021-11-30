<?php

include("../models/conexao.php");
include("../models/bancoClientes.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);


if(deletarClientes($conexao,$codClideletar)){
    echo("Cliente deletado com sucesso");
}else{
    echo("Cliente não deletado.");
}

include("../views/footer.php");
