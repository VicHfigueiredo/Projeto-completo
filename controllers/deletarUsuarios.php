<?php

include("../models/conexao.php");
include("../models/bancoUsuarios.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);


if(deletarUsuarios($conexao,$codUsuDeletar)){
    echo("Usuário deletado com sucesso");
}else{
    echo("Usuário não deletado.");
}

include("../views/footer.php");
