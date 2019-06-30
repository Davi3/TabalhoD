
<?php require_once('header.php'); 
  require_once('../include_dao.php');
  session_start();
  if (empty($_SESSION['cod'])) {
  header('location:loginView.php');
}


  $operacao = isset($_POST['operacao'])?$_POST['operacao']:"";
  $confirma = new ProdutoDAO();

  if ($operacao == "Cadastrar"){
    $produto= new Produto(); 
    $dao = new ProdutoDAO();

    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $descricao = isset($_POST['descricao'])?$_POST['descricao']:"";
    $preco = isset($_POST['preco'])?$_POST['preco']:"";
    $imagem = isset($_FILES['imagem'])?$_FILES['imagem']:"";
    $principal = isset($_POST['principal'])?$_POST['principal']:"";

    $explode = explode(".", $imagem['name']);
    $nomeImagem = $explode[0];
    $tipo = $explode[1];
    $novoNome = md5($nomeImagem);
    $novoNome=$novoNome.".".$tipo;

    $destino = 'images/produtos/' . $novoNome;
    $arquivo_tmp = $imagem['tmp_name'];
    move_uploaded_file( $arquivo_tmp, $destino  );
    $confirmou = $confirma->confirma($nome);  
    
    if ($confirmou) {
      $produto = new Produto();
      $produto->setNome($nome);
      $produto->setDescricao($descricao);
      $produto->setPreco($preco);
      $produto->setImagem($novoNome);
      $produto->setPrincipal($principal);
      $dao->inserir($produto);
      header("location:?cadastrado");
      header("location:lista.php");

    }else{
      header("location:?erro");
    
    }    
  }
?>
<div class="row justify-content-center no-gutters block-9" style="padding-top: 10%;background-color:#76ABAB;padding-bottom: 15%">
          <div class="col-md-5 order-md-last d-flex" style="margin-left: 15%">
            <form  class="bg-light p-5 contact-form" enctype="multipart/form-data" method="POST" id="formulario">
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
                <input type="required" class="form-control" placeholder="Nome" name="nome" id="nome">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Preço" name="preco" id="preco">
              </div>
              <div class="form-group">
                <input type="file" class="form-control" placeholder="Imagem" name="imagem" id="imagem">
              </div>
              <div class="form-group">
                <textarea name="descricao" id="descricao" cols="30" rows="7" class="form-control" placeholder="Descricao"></textarea>
              </div>
              <div class="form-group" style="margin-left: 60%">
                <input type="submit"  name="operacao" value="Cadastrar" style="margin-top: 10%;background-color: #91B8B8" class="btn  py-2 px-4 mt-4" onclick="validaCampos();">
              </div>  
            </form>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>