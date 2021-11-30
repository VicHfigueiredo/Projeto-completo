<?php

include("../models/conexao.php");
include("../models/bancoUsuarios.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(inserirUsuarios($conexao,$email,$senha,$pin)){
    echo("Usuário cadastrado com sucesso");
}else{
    echo("Usuário não cadastrado.");
}

include("../views/footer.php");
