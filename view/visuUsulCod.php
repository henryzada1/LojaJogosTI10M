<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/usuarioModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Código do usuario</label>
    <div class="input-group">
      <div class="input-group-text">Código</div>
      <input type="text" name="codigoUsu" class="form-control" id="inlineFormInputGroupUsername" placeholder="Código do usuario">
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
$codigousu = isset ($_POST["codigoUsu"])? $_POST["codigoUsu"]:"" ;

if($codigousu){

$dado1 = visuUsuarioCodigo($conn,$codigousu);

foreach($dado1 as $codigoUsuarios): 
  ?>
      <tr>
        <th scope="row"><?=$dado1["idusu"] ?></th>
        <td><?=$dado1["nomeusu"] ?></td>
        <td><?=$dado1["emailusu"] ?></td>
        <td><?=$dado1["foneusu"] ?></td>
        <td>
        <form action="../view/alterarForm.php" method="post">
          <input type="hidden" value="<?=$dado1["idusu"] ?>" name="codigousu">
          <button type="submit" class="bnt btn-primary">Alterar</button>
        </form>

        </td>
        <td>
            <!-- Button trigger modal -->
        <td><button type="button" class="btn btn-danger"  codigo="<?=$dado1["idusu"] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
          Apagar
        </button></td>
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
      <form action="../controler/deletarUsuario.php" method="get">
          <input type="hidden" class="codigo form-control" name="codigousu">
          <button type="submit" class="btn btn-danger">Sim</button>
      </form>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>

<script>
  var deletarUsuarioModal = document.getElementById('deleteModal');
      deletarUsuarioModal.addEventListener('show.bs.modal', function(event){
        var button = event.relatedTarget;
        var codigo = button.getAttribute('codigo');

        var modalBody = deletarUsuarioModal.querySelector('.modal-body');
        modalBody.textContent = 'Gostaria de excluir o usuário de código ' + codigo + '?'

        var Codigo = deletarUsuarioModal.querySelector('.modal-footer .codigo');
        Codigo.value = codigo;

      })

</script>

<?php

include_once("../view/footer.php")

?>