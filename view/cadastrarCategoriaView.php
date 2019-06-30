<!--função que certifica se os campos foram preenchidos-->
<script type="text/javascript">
  function validaCampos(){
    if(document.getElementById("nome").value == ""|| document.getElementById("descricao").value == "" ){
      $('#erroCampos').show();
      setTimeout(function() {
        $('#erroCampos').hide()
      }, 5000);
    }else{
      document.getElementById("formulario").submit();
    }
  }
</script>

<?php 
  require_once('header.php'); 
  require_once('../include_dao.php');
  session_start();
  if (empty($_SESSION['cod'])) {
  header('location:loginView.php');
}
  
  $operacao = isset($_POST['operacao'])?$_POST['operacao']:"";
  $confirma = new CategoriaDAO();

  if ($operacao == "Cadastrar") {

    $dao = new CategoriaDAO(); 
    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $descricao = isset($_POST['descricao'])?$_POST['descricao']:"";

    $confirmou = $confirma->confirma($nome);

    if ($confirmou) {
      
      $categoria = new Categoria();
      $categoria ->  setNome($nome);
      $categoria ->  setDescricao($descricao);
      $dao->inserir($categoria);  
      header("location:?cadastrado");
      header("location:escolhaView.php");
    }else{
      header("location:?erro");
    }    
  }
?>
<div class="row justify-content-center no-gutters block-9" style="padding-top: 10%;background-color:#76ABAB;padding-bottom: 15%">
          
          <div class="col-md-5 order-md-last d-flex" style="margin-left: 15%">
            <form  class="bg-light p-5 contact-form" method="POST" id="formulario">
               <h2 class="mb-4 text-center" >Cadastro de categorias</h2>
              <div id="erroCampos" style='display:none; color:white; background-color: red; text-align: center; margin-top: 5%; margin-bottom: 5%; padding-left:2%; padding-right:2%'>
              Preencha os campos!
              </div>
              <?php
              if(isset($_GET['erro'])){
                echo ("<div style='color:white; background-color: red; text-align: center; margin-top: 5%; margin-bottom: 5%; padding-left:2%; padding-right:2%'>Categoria Existente!</div>");
              }
              if(isset($_GET['cadastrado'])){
                echo ("<div style='color:white; background-color: green; text-align: center; margin-top: 5%;margin-bottom: 5%'>Adicionado com <strong>Sucesso</strong>!</div>");
              }
            ?>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" value="">
              </div>
              <div class="form-group">
                <textarea name="descricao" id="descricao" cols="30" rows="7" class="form-control" placeholder="Descricao"></textarea>
              </div>
              <div class="form-group" style="margin-left: 60%">
                <input type="submit" onclick="validaCampos();"  name="operacao" value="Cadastrar" style="margin-top: 10%;background-color: #91B8B8" class="btn  py-2 px-4 mt-4">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>