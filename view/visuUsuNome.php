<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Nome do usuario</label>
    <div class="input-group">
      <div class="input-group-text">Nome</div>
      <input type="text" name="nomeUsu" class="form-control" id="inlineFormInputGroupUsername" placeholder="Nome do usuario">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pesquisar</button>
  </div>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Fone</th>
      <th scope="col">Alterar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  <?php
$nomeusu = isset ($_POST["nomeUsu"])? $_POST["nomeUsu"]:"" ;

if($nomeusu){

  $dado2 = visuUsuarioNome($conn,$nomeusu);
  
  foreach($dado2 as $nomeUsuarios): 
    ?>
        <tr>
          <th scope="row"><?=$nomeUsuarios["idusu"] ?></th>
          <td><?=$nomeUsuarios["nomeusu"] ?></td>
          <td><?=$nomeUsuarios["emailusu"] ?></td>
          <td><?=$nomeUsuarios["foneusu"] ?></td>
          <td>
          <form action="../view/alterarForm.php" method="post">
          
          <input type="hidden" value="<?=$nomeUsuarios["idusu"] ?>" name="codigousu">
          <button type="submit" class="bnt btn-primary">Alterar</button>
    
          </form>
    
        </td>
           <!-- Button trigger modal -->
        <td><button type="button" class="btn btn-danger"  codigo="<?=$nomeUsuarios["idusu"] ?>" codigo="<?=$nomeUsuarios["nomeusu"] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
          Apagar
        </button></td>
        </tr>
        <?php
          endforeach;
        }
        ?>
  </tbody>
</table>

</div>

<?php

?>
<!-- Modal -->
<div class="modal" tabindex="-1" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Exclusão de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
        <button type="button" class="btn btn-danger">Sim</button>
      </div>
    </div>
  </div>
</div>

<?php

include_once("../view/footer.php")

?>