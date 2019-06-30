<script type="text/javascript">
  function validaCampos(){
    if(document.getElementById("cod_prod").value == "Selecione um Produto" || document.getElementById("cod_cat").value == "Selecione uma Categoria" ){
      $('#erroCampos').show();
      setTimeout(function() {
        $('#erroCampos').hide()
      }, 2000);
    }else{
      document.getElementById("formulario").submit();
    }
  }
</script>
<?php require_once('header.php'); 
  require_once('../include_dao.php');

  session_start();
  if (empty($_SESSION['cod'])) {
    header('location:loginView.php');
  }

  $operacao = isset($_POST['operacao'])?$_POST['operacao']:"";
  $confirma = new ProdutoDAO();

  if ($operacao == "cadastrar") {
    
    $dao = new Produto_categoriaDAO();
    $daoP = new ProdutoDAO();
    $cod_cat = isset($_POST['cod_cat'])?$_POST['cod_cat']:"";
    $cod = isset($_POST['cod_prod'])?$_POST['cod_prod']:"";

    $confirmou = $confirma->confirmaCat($cod_cat,$cod);

    if ($confirmou) {
      $produto = new Produto();
      $produto -> setCod_cat($cod_cat);
      $produto -> setCod($cod);
      $daoP->inserirCod($produto);  
      header("location:?cadastrado");
      header("location:escolhaView.php");
    }else{
      header("location:?erro");
    }    
  }

  $funcoesProduto = new ProdutoDAO();
  $funcoesCategoria = new CategoriaDAO(); 

  $produtos=$funcoesProduto->listarTodos();
  $categorias=$funcoesCategoria->listarTodos();

?>
<div class="row justify-content-center no-gutters block-9" style="padding-top: 10%;background-color:#76ABAB;padding-bottom: 15%">
  <form class="bg-light p-5 contact-form" method="POST" style="padding-top: 10%" id="formulario">
    <h2 class="mb-4 text-center" >Atribuições</h2>
        <div class="">
          <div class="form-group">
            <div id="erroCampos" style='display:none; color:white; background-color: red; text-align: center; margin-top: 5%; margin-bottom: 5%; padding-left:2%; padding-right:2%'>
              Preencha os campos!
            </div>
            <?php
              if(isset($_GET['erro'])){
                echo ("<div style='color:white; background-color: red; text-align: center; margin-top: 5%; margin-bottom: 5%; padding-left:2%; padding-right:2%'>Produto já está nessa categoria!</div>");
              }
    
              if(isset($_GET['cadastrado'])){
                echo ("<div style='color:white; background-color: green; text-align: center; margin-top: 5%;margin-bottom: 5%'>Adicionado com <strong>Sucesso</strong>!</div>");
              }
            ?>
            <select name="cod_prod" class="form-control" id="cod_prod">
              <option readonly>Selecione um Produto</option>
              <?php foreach ($produtos as $produto): ?>
                <option value="<?=$produto['cod']?>" ><?=$produto['nome']?></option>  
              <?php endforeach ?>
            </select>
          </div>
          <div class="">
            <select name="cod_cat" class="form-control" id="cod_cat">
              <option readonly>Selecione uma Categoria</option>
              <?php foreach ($categorias as $categoria): ?>
                <option value="<?=$categoria['cod']?>" ><?=$categoria['nome']?></option>  
              <?php endforeach ?>
            </select>
          </div>
          <!--<div class="ui fluid large teal submit button">Cadastrar</div>-->
          <input onclick="validaCampos();"  name="operacao" value="cadastrar" style="margin-top: 10%;background-color: #91B8B8" class="btn  py-2 px-4 mt-4">
        </div>

      </form>
</div>
<?php require_once("footer.php");?>