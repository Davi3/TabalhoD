
<?php require_once('header.php'); 
  require_once('../include_dao.php');
  session_start();
  if (empty($_SESSION['cod'])) {
  header('location:loginView.php');
}

  $operacao = isset($_POST['operacao'])?$_POST['operacao']:"";
  $confirma = new ConfiguracoeDAO();

  if ($operacao == "Cadastrar"){
    $configuracoe = new Configuracoe(); 
    $dao = new ConfiguracoeDAO();

    $titulo = isset($_POST['titulo'])?$_POST['titulo']:"";
    $nome = isset($_POST['nome'])?$_POST['nome']:"";
    $slide1 = isset($_FILES['slide1'])?$_FILES['slide1']:"";
    $slide2 = isset($_FILES['slide2'])?$_FILES['slide2']:"";
    $frase1 = isset($_POST['frase1'])?$_POST['frase1']:"";
    $frase2 = isset($_POST['frase2'])?$_POST['frase2']:"";
    $subf1 = isset($_POST['subf1'])?$_POST['subf1']:"";
    $subf2 = isset($_POST['subf2'])?$_POST['subf2']:"";
    $bt1 = isset($_POST['bt1'])?$_POST['bt1']:"";
    $bt2 = isset($_POST['bt2'])?$_POST['bt2']:"";
    $local = isset($_POST['local'])?$_POST['local']:"";
    $tel = isset($_POST['tel'])?$_POST['tel']:"";
    $email = isset($_POST['email'])?$_POST['email']:"";

    $explode = explode(".", $slide1['name']);
    $nomeImagem1 = $explode[0];
    $tipo1 = $explode[1];
    $novoNome1 = md5($nomeImagem1);
    $novoNome1=$novoNome1.".".$tipo1;

    $destino1 = 'images/produtos/' . $novoNome1;
    $arquivo_tmp1 = $slide1['tmp_name'];
    move_uploaded_file( $arquivo_tmp1, $destino1 );

    $explode = explode(".", $slide2['name']);
    $nomeImagem2 = $explode[0];
    $tipo2 = $explode[1];
    $novoNome2 = md5($nomeImagem2);
    $novoNome2 =$novoNome2.".".$tipo2;

    $destino2 = 'images/produtos/' . $novoNome2;
    $arquivo_tmp2 = $slide2['tmp_name'];
    move_uploaded_file( $arquivo_tmp2, $destino2  );

    $confirmou = $confirma->confirma($nome);  
    
    if ($confirmou) {
      $configuracoe= new Configuracoe();
      $configuracoe->setTitulo($titulo);
      $configuracoe->setNome($nome);
      $configuracoe->setSlide1($novoNome1);
      $configuracoe->setSlide2($novoNome2);
      $configuracoe->setFrase1($frase1);
      $configuracoe->setFrase2($frase2);
      $configuracoe->setSubf1($subf1);
      $configuracoe->setSubf2($subf2);
      $configuracoe->setBt1($bt1);
      $configuracoe->setBt2($bt2);
      $configuracoe->setLocal($local);
      $configuracoe->setTel($tel);
      $configuracoe->setEmail($email);
      $dao->inserir($configuracoe);
      header("location:?cadastrado");
      header("location:escolhaView.php");

    }else{
      header("location:?erro");
    
    }    
  }
?>
<div class="row justify-content-center no-gutters block-9" style="padding-top: 10%;background-color:#76ABAB">
          <div class="col-md-5 order-md-last d-flex" style="margin-left: 15%">
            <form  class="bg-light p-5 contact-form" method="POST" enctype="multipart/form-data" id="formulario">
               <h2 class="mb-4 text-center" >Cadastro da empresa</h2>
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
                <input type="text" class="form-control" placeholder="Titulo" name="titulo" id="titulo">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome">
              </div>
              <div class="form-group">
                <input type="file" class="form-control" placeholder="Slide 1" name="slide1" id="slide1">
              </div>
              <div class="form-group">
                <input type="file" class="form-control" placeholder="Slide 2" name="slide2" id="slide2">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Frase 1" name="frase1" id="frase1">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Frase 2" name="frase2" id="frase2">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Sub-frase 1" name="subf1" id="subf1">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Sub-frase 2" name="subf2" id="subf2">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Bt 1" name="bt1" id="bt1">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Bt 2" name="bt2" id="bt2">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Localização" name="local" id="local">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Telefone" name="tel" id="tel">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" name="email" id="email">
              </div>
              <div class="form-group" style="margin-left: 60%">
                <input type="submit"  name="operacao" value="Cadastrar" style="margin-top: 10%;background-color: #91B8B8" class="btn  py-2 px-4 mt-4">
              </div>  
            </form>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>