<?php
include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

extract($_REQUEST, EXTR_OVERWRITE);

$informa = visuJogoCodigo($conn, $codigojogo);


?>

<div class="container">

<form class="row g-3" action="../controler/alterarJogo.php" method="post">
    <input type="hidden" name="codigojogo" value="<?=$informa["idjogo"]?>">
  <div class="col-md-6">
    <label for="inputJogo" class="form-label">Nome</label>
    <input type="text" name="nomejogo" value="<?=$informa["nomejogo"]?>" class="form-control" id="inputJogo" required>
  </div>
  <div class="col-md-6">
    <label for="inputValor" class="form-label">Valor</label>
    <input type="text" name="valorjogo" value="<?=$informa["valorjogo"]?>" class="form-control" id="inputValor" required>
  </div>
  <div class="col-md-6">
    <label for="inputGenero" class="form-label">Gênero</label>
    <select id="inputGenero" name="generojogo" value="<?=$informa["generojogo"]?>" class="form-select" placeholder="Escolha...">
      <option selected>Escolha...</option>
      <option value="RPG">RPG</option>
      <option value="Aventura">Aventura</option>
      <option value="Puzzle">Puzzle</option>
      <option value="FPS">FPS</option>
      <option value="Corrida">Corrida</option>
    </select>
  </div> 
  </div>
  <div class="col-6">
    <label for="inputQuantidade" class="form-label">Quantidade de Jogos</label>
    <input type="number" name="qtdjogo" value="<?=$informa["qtdjogo"]?>" class="form-control" id="inputQuantidade" placeholder="XXX" required>
  </div>
  <div class="col-md-4">
    <label for="inputdata" class="form-label">Data de Lançamento</label>
    <input type="date" name="datalancamentojogo" value="<?=$informa["datalancamentojogo"]?>" class="form-control" id="inputdata" placeholder="XX/XX/XXXX" required>
  </div>
  <div class="col-4">
    <label for="inputstudio" class="form-label">Studio</label>
    <input type="text" name="studiojogo" value="<?=$informa["studiojogo"]?>" class="form-control" id="inputstudio" placeholder="XXXXXXXXX" required>

  </div> 

    </select>
  </div>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar</button>
  </div>
</form>

</div>

<?php
include_once("footer.php");
?>