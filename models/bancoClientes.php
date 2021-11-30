<?php

function inserirClientes($conexao,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli){
    $query="insert into tbclientes(codUsuFK,nomeCli,cpfCli,foneCli,datanasCli)values('{$codUsuFK}','{$nomeCli}','{$cpfCli}','{$foneCli}','{$datanasCli}')";

    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function listaTudoClientes($conexao){
    $query = "Select * From tbclientes";
    
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}
function listaTudoClientesCod($conexao,$codCli){
    $query = "Select * From tbclientes where codCli = {$codCli}" ;
    $resultados = mysqli_query($conexao,$query);
    $resul = mysqli_fetch_array($resultados);
    return $resul;
}
function alterarClientes($conexao,$codCli,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli){
   $query = "Update tbclientes set 
   nomeCli= '{$nomeCli}',
   cpfCli = '{$cpfCli}',
   foneCli = '{$foneCli}',
   datanasCli = '{$datanasCli}' ";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;

}
function deletarClientes($conexao,$codCliDeletar){
    $query = "delete from tbclientes where codCli = $codCliDeletar";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function listaTudoClienteNome($conexao,$nomeCliente){
   $query = "select * from tbclientes where nomeCli like'%{$nomeCliente}%'";
   $resultados = mysqli_query($conexao,$query);
   return $resultados;
}

function listaClienteUsuario($conexao,$codUsuario){
 $query = "Select * from tbusuarios where codUsu = {$codUsuario}";
 $resultados = mysqli_query($conexao,$query);
 $resul = mysqli_fetch_array($resultados);
 return $resul;
}