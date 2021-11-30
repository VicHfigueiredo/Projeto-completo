

<?php

include("../models/conexao.php");
include("../models/bancoPedidos.php");
include("../views/header.php");


extract($_REQUEST,EXTR_OVERWRITE);


if(inserirPedidos($conexao,$codCliFK,$codFunFK,$codJogFK)){
    echo("<div class='container'> Pedido realizado com sucesso</div>");
}else{
    echo("Pedido não realizado.");
}

include("../views/footer.php");
