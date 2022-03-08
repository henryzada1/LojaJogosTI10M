<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");


extract($_REQUEST,EXTR_OVERWRITE);


if(inserirUsuario($conn,$nomeusu,$emailusu,$foneusu,$cpfusu,$tipousu,$cepusu,$numusu,$compleusu)){
echo("O perfil foi cadastrado com sucesso!");
}else{
echo("O perfil está incompleto, tente novamente.");

}

include_once("../view/footer.php");
?>