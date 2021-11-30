<?php 
function inserirPedidos($conexao,$codCliFK,$codFunFK,$codJogFK){
    $query="insert into tbpedidos(codCliFK,codFunFK,codJogFK)values('{$codCliFK}','{$codFunFK}','{$codJogFK}')";

    $resultados = mysqli_query($conexao,$query);
    return $resultados;

}

?>