<?php

function inserirUsuarios($conexao,$email,$senha,$pin){
    $option = ['cost =>8'];
    $senhacripto = password_hash($senha,PASSWORD_BCRYPT,$option);
    $query="insert into tbusuarios(emailUsu,senhaUsu,pinUsu)values('{$email}','{$senhacripto}','{$pin}')";

    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function listaTudoUsuarios($conexao){
    $query = "Select * From tbusuarios";
    
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}
function listaTudoUsuariosCod($conexao,$codUsu){
    $query = "Select * From tbusuarios where codUsu={$codUsu}" ;
    $resultados = mysqli_query($conexao,$query);
    $resul = mysqli_fetch_array($resultados);
    return $resul;
}
function alterarUsuarios($conexao,$codUsu,$emailUsu,$senhaUsu,$pinUsu){
    $option = ['cost =>8'];
    $senhaUsu = password_hash($senhaUsu,PASSWORD_BCRYPT,$option);
   $query = "Update tbusuarios set 
    emailUsu = '{$emailUsu}', 
    pinUsu = '{$pinUsu}',
    senhaUsu = '{$senhaUsu}' where codUsu = '{$codUsu}' ";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;

}
function deletarUsuarios($conexao,$codUsuDeletar){
    $query = "delete from tbusuarios where codUsu = $codUsuDeletar";
    $resultados = mysqli_query($conexao,$query);
    return $resultados;
}

function buscarAcesso($conexao,$email,$senha){
    $query = "select * from tbusuarios where emailUsu='{$email}'";

    $resultados = mysqli_query($conexao,$query);
    
    if(mysqli_num_rows($resultados) > 0 ){
        $linha = mysqli_fetch_assoc($resultados);

         if(password_verify($senha,$linha['senhaUsu'])){
             $_SESSION["emailUsuario"] = $linha["emailUsu"]; 
             $_SESSION["codigoUsuario"] = $linha["codUsu"]; 
            
             return $linha["emailUsu"];
            
            }else{
                return "Senha não confere";
            }
            }else{
                return "Email não cadastrado";
            }

}

function sairSistema(){
    session_destroy();
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert' role='alert'>Sua sessão expirou.</div>";
    header("Location:../views/logar.php");
}