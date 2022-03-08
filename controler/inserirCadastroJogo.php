<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");


extract($_REQUEST,EXTR_OVERWRITE);


if(inserirJogos($conn,$nomejogo,$valorjogo,$generojogo,$qtdjogo,$datalancamentojogo,$studiojogo)){
echo("O perfil foi criado com sucesso!");
}else{
echo("O perfil está incompleto, tente novamente.");

}

include_once("../view/footer.php");
?>