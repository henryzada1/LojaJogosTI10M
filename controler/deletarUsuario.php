<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(deletarUsuario($conn,$codigousu)){
    echo("Usuário excluído com sucesso.");
}else{
    echo("Usuário não excluído.");
}

include_once("../view/footer.php");
?>