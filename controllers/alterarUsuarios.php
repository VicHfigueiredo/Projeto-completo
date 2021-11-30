<?php

include("../models/conexao.php");
include("../models/bancoUsuarios.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if  
(alterarUsuarios($conexao,$codigo,$email,$senha,$pin)){
    echo("Usuário alterado com sucesso");
}else{
    echo("Usuário não alterado.");
}

include("../views/footer.php");
