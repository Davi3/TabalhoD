
<?php require_once('header.php'); 
  require_once('../include_dao.php');
  session_start();
  if (empty($_SESSION['cod'])) {
  header('location:loginView.php');
}

  $operacao = isset($_POST['operacao'])?$_POST['operacao']:"";
  $funcoes= new ConfiguracoeDAO();
  $configuracoe = $funcoes -> listarTodos();

  foreach ($configuracoe as $key) {
      $cod= $key['cod'];
      $titulo = $key['titulo']; 
      $nome = $key['nome'];
      $frase1 = $key['frase1'];
      $frase2 = $key['frase2'];
      $subf1 = $key['subf1'];
      $subf2 = $key['subf2'];
      $bt1 = $key['bt1'];
      $bt2 = $key['bt2'];
      $local = $key['local'];
      $tel = $key['tel'];
      $email = $key['email'];
  }

  if ($operacao == "Cadastrar"){
    $configuracoe = new Configuracoe(); 
    $dao = new ConfiguracoeDAO();

    $ecod = isset($_POST['ecod'])?$_POST['ecod']:"";
    $etitulo = isset($_POST['etitulo'])?$_POST['etitulo']:"";
    $enome = isset($_POST['enome'])?$_POST['enome']:"";
    $eslide1 = isset($_FILES['eslide1'])?$_FILES['eslide1']:"";
    $eslide2 = isset($_FILES['eslide2'])?$_FILES['eslide2']:"";
    $efrase1 = isset($_POST['efrase1'])?$_POST['efrase1']:"";
    $efrase2 = isset($_POST['efrase2'])?$_POST['efrase2']:"";
    $esubf1 = isset($_POST['esubf1'])?$_POST['esubf1']:"";
    $esubf2 = isset($_POST['esubf2'])?$_POST['esubf2']:"";
    $ebt1 = isset($_POST['ebt1'])?$_POST['ebt1']:"";
    $ebt2 = isset($_POST['ebt2'])?$_POST['ebt2']:"";
    $elocal = isset($_POST['elocal'])?$_POST['elocal']:"";
    $etel = isset($_POST['etel'])?$_POST['etel']:"";
    $eemail = isset($_POST['eemail'])?$_POST['eemail']:""; 

    $explode = explode(".", $eslide1['name']);
    $nomeImagem1 = $explode[0];
    $tipo1 = $explode[1];
    $novoNome1 = md5($nomeImagem1);
    $novoNome1=$novoNome1.".".$tipo1;

    $destino1 = 'images/produtos/' . $novoNome1;
    $arquivo_tmp1 = $eslide1['tmp_name'];
    move_uploaded_file( $arquivo_tmp1, $destino1 );

    $explode = explode(".", $eslide2['name']);
    $nomeImagem2 = $explode[0];
    $tipo2 = $explode[1];
    $novoNome2 = md5($nomeImagem2);
    $novoNome2 =$novoNome2.".".$tipo2;

    $destino2 = 'images/produtos/' . $novoNome2;
    $arquivo_tmp2 = $eslide2['tmp_name'];
    move_uploaded_file( $arquivo_tmp2, $destino2  ); 
    
    if (!empty($etitulo)and!empty($enome)and!empty($eslide1)and!empty($eslide2)and!empty($efrase1)and!empty($efrase2)and!empty($esubf1)and!empty($esubf2)and!empty($ebt1)and!empty($ebt2)and!empty($elocal)and!empty($etel)and!empty($eemail)) {

      $configuracoe= new Configuracoe();
      $configuracoe->setCod($ecod);
      $configuracoe->setTitulo($etitulo);
      $configuracoe->setNome($enome);
      $configuracoe->setSlide1($novoNome1);
      $configuracoe->setSlide2($novoNome2);
      $configuracoe->setFrase1($efrase1);
      $configuracoe->setFrase2($efrase2);
      $configuracoe->setSubf1($esubf1);
      $configuracoe->setSubf2($esubf2);
      $configuracoe->setBt1($ebt1);
      $configuracoe->setBt2($ebt2);
      $configuracoe->setLocal($elocal);
      $configuracoe->setTel($etel);
      $configuracoe->setEmail($eemail);
      $dao->atualizar($configuracoe);
      header("location:?cadastrado");
      header("location:escolhaView.php");

    }else{
      header("location:?erro");
    
    }    
  }
?>
<div class="row justify-content-center no-gutters block-9" style="padding-top: 10%;background-color:#76ABAB">
          <div class="col-md-5 order-md-last d-flex" style="margin-left: 15%">
            <form  class="bg-light p-5 contact-form" method="POST" id="formulario" enctype="multipart/form-data">
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
                <label>Título:</label>
                <input type="text" class="form-control" placeholder="Titulo" name="etitulo" id="etitulo" value="<?=$titulo?>">
              </div>
              <input type="hidden" class="form-control"  name="ecod" id="ecod" value="<?=$cod?>">
              <div class="form-group">
                <label>Nome:</label>
                <input type="text" class="form-control" placeholder="Nome" name="enome" id="enome" value="<?=$nome?>">
              </div>
              <div class="form-group">
                <label>Slide 1:</label>
                <input type="file" class="form-control" placeholder="Slide 1" name="eslide1" id="eslide1">
              </div>
              <div class="form-group">
                <label>Slide  2:</label>
                <input type="file" class="form-control" placeholder="Slide 2" name="eslide2" id="eslide2" >
              </div>
              <div class="form-group">
                <label>Frase 1:</label>
                <input type="text" class="form-control" placeholder="Frase 1" name="efrase1" id="efrase1" value="<?=$frase1?>">
              </div>
              <div class="form-group">
                <label>Frase 2:</label>
                <input type="text" class="form-control" placeholder="Frase 2" name="efrase2" id="efrase2" value="<?=$frase2?>">
              </div>
              <div class="form-group">
                <label>Sub- frase 1:</label>
                <input type="text" class="form-control" placeholder="Sub-frase 1" name="esubf1" id="esubf1" value="<?=$subf1?>">
              </div>
              <div class="form-group">
                <label>Sub-frase 2:</label>
                <input type="text" class="form-control" placeholder="Sub-frase 2" name="esubf2" id="esubf2" value="<?=$subf2?>">
              </div>
              <div class="form-group">
                <label>Botão 1:</label>
                <input type="text" class="form-control" placeholder="Bt 1" name="ebt1" id="ebt1" value="<?=$bt1?>">
              </div>
              <div class="form-group">
                <label>Botão 2:</label>
                <input type="text" class="form-control" placeholder="Bt 2" name="ebt2" id="ebt2" value="<?=$bt2?>">
              </div>
              <div class="form-group">
                <label>Localização:</label>
                <input type="text" class="form-control" placeholder="Localização" name="elocal" id="elocal" value="<?=$local?>">
              </div>
              <div class="form-group">
                <label>Número:</label>
                <input type="text" class="form-control" placeholder="Telefone" name="etel" id="etel" value="<?=$tel?>">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="text" class="form-control" placeholder="Email" name="eemail" id="eemail" value="<?=$email?>">
              </div>
              <div class="form-group" style="margin-left: 60%">
                <input type="submit"  name="operacao" value="Cadastrar" style="margin-top: 10%;background-color: #91B8B8" class="btn  py-2 px-4 mt-4" class="btn btn-primary py-3 px-5">
              </div>  
            </form>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>