<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");


extract($_REQUEST,EXTR_OVERWRITE);


if(inserirJogos($conn,$nomejogo,$valorjogo,$generojogo,$qtdjogo,$datalancamentojogo,$studiojogo)){
echo("O jogo foi adicionado com sucesso!");
}else{
echo("O jogo não atende aos requisitos, tente novamente.");

}

include_once("../view/footer.php");
?>