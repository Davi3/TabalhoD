<script type="text/javascript">
  function validaCampos(){
    if(document.getElementById("enome").value == "" || document.getElementById("epreco").value == ""|| document.getElementById("eimagem").value == ""|| document.getElementById("edescricao").value == "" ){
      $('#erroCampos').show();
      setTimeout(function() {
        $('#erroCampos').hide();
      }, 5000);
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

  $nome = isset($_POST['nome'])?$_POST['nome']:"";
  $descricao = isset($_POST['descricao'])?$_POST['descricao']:"";
  $preco = isset($_POST['preco'])?$_POST['preco']:"";
  $imagem = isset($_POST['imagem'])?$_POST['imagem']:"";
  $principal = isset($_POST['principal'])?$_POST['principal']:"";


  if ($operacao == "Cadastrar"){
    $produto= new Produto(); 
    $dao = new ProdutoDAO();

    $enome = isset($_POST['enome'])?$_POST['enome']:"";
    $edescricao = isset($_POST['edescricao'])?$_POST['edescricao']:"";
    $epreco = isset($_POST['epreco'])?$_POST['epreco']:"";
    $eimagem = isset($_POST['eimagem'])?$_POST['eimagem']:"";
    $eprincipal = isset($_POST['eprincipal'])?$_POST['eprincipal']:"";
    
    if (!empty($enome) and !empty($edescricao) and !empty($epreco) and !empty($eimagem)) {
      $produto= new Produto();
      $produto->setNome($enome);
      $produto->setDescricao($edescricao);
      $produto->setPreco($epreco);
      $produto->setImagem($eimagem);
      $produto->setPrincipal($eprincipal);
      $dao->inserir($produto);
      header("location:?cadastrado");
    }   
  }
?>
<div class="row justify-content-center no-gutters block-9" style="padding-top: 10%">
          <div class="col-md-5 order-md-last d-flex" style="margin-left: 15%">
            <form  class="bg-light p-5 contact-form" method="POST" id="formulario">
               <h2 class="mb-4 text-center" >Cadastro de produtos</h2>
              <div id="erroCampos" style='display:none; color:white; background-color: red; text-align: center; margin-top: 5%; margin-bottom: 5%; padding-left:2%; padding-right:2%'>
              Preencha os campos!
              </div>
              <?php
              if(isset($_GET['erro'])){
                echo ("<div style='color:white; background-color: red; text-align: center; margin-top: 5%; margin-bottom: 5%; padding-left:2%; padding-right:2%'>Produto Existente!</div>");
              }
              if(isset($_GET['cadastrado'])){
                echo ("<div style='color:white; background-color: green; text-align: center; margin-top: 5%;margin-bottom: 5%'>Adicionado com <strong>Sucesso</strong>!</div>");
              }
            ?>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome" name="enome" id="enome">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Preço" name="epreco" id="epreco">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Imagem" name="eimagem" id="eimagem">
              </div>
              <div class="form-group">
                <textarea name="edescricao" id="edescricao" cols="30" rows="7" class="form-control" placeholder="Descricao"></textarea>
              </div>
              <div class="form-group">
                <input type="submit"  name="operacao" value="Cadastrar" style="margin-top: 10%" class="btn btn-primary py-3 px-5" onclick="validaCampos();">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>