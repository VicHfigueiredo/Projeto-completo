<?php

function inserirFuncionarios($conexao,$codUsuFK,$nomeFun,$funcaoFun,$foneFun,$datanasFun){
    $query="insert into tbfuncionarios(codUsuFK,nomeFun,funcaoFun,foneFun,datanasFun)values('{$codUsuFK}','{$nomeFun}','{$funcaoFun}','{$foneFun}','{$datanasFun}')";

    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function listaTudoFuncionarios($conexao){
    $query = "Select * From tbfuncionarios";
    
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}
function listaTudoFuncionariosCod($conexao,$codFun){
    $query = "Select * From tbfuncionarios where codFun={$codFun}" ;
    $resultados = mysqli_query($conexao,$query);
    $resul = mysqli_fetch_array($resultados);
    return $resul;
}
function alterarFuncionarios($conexao,$codFun,$codUsuFK,$nomeFun,$funcaoFun,$foneFun,$datanasFun){
   $query = "Update tbfuncionarios set 
   codUsuFK = '{$codUsuFK}', 
   nomeFun= '{$nomeFun}',
   funcaoFun = '{$funcaoFun}',
   foneFun = '{$foneFun}'
   where datanasFun = '{$datanasFun}'";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;

}
function deletarFuncionarios($conexao,$codFunDeletar){
    $query = "delete from tbfuncionarios where codFun = $codFunDeletar";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function listaTudoFuncionariosNome($conexao,$nomeFuncionario){
   $query = "select * from tbfuncionarios where nomeFun like'%{$nomeFuncionario}%'";
   $resultados = mysqli_query($conexao,$query);
   return $resultados;
}

function listabuscafunUsu($conexao,$codUsuFK){
    $query = "select * from tbfuncionarios where codUsuFK = '{$codUsuFK}'";
    $resultados = mysqli_query($conexao,$query);
    $resul=mysqli_fetch_array($resultados);
    return $resul;
}