<?php
 require_once('header.php');
require_once('../include_dao.php');

if (!empty($_GET['produto'])) {
  $cod = $_GET['produto'];
} else {
  header('location: produtosView.php');
}

$funcoesProdutos = new ProdutoDAO();
$produto = $funcoesProdutos -> listarByCod($cod);

if (empty($produto)) {
  header('location: produtosView.php');
}

$funcoes= new ConfiguracoeDAO();
  $configuracoe = $funcoes -> listarTodos();

  foreach ($configuracoe as $key) {
      $titulo = $key['titulo']; 
      $nome_empresa = $key['nome'];
      $slide1 = $key['slide1'];
      $slide2 = $key['slide2'];
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

// $operacao = isset($_POST['operacao'])?$_POST['operacao']:"";
$nome = $produto['nome'];
$descricao = $produto['descricao'];
$preco = $produto['preco'];
$imagem = $produto['imagem'];
$principal = $produto['principal'];

?>
<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section" style="margin-top: 10%">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-5 d-flex" style="padding-bottom: 5%">
    				<div class="img d-flex align-self-stretch align-items-center" style="background-image:url('images/produtos/<?=$imagem?>');">
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-7 pl-lg-5 py-5">
    				<div class="py-md-5">
	    				<div class="row justify-content-start pb-3">
			          <div class="col-md-12 heading-section ftco-animate">
			          	<span class="subheading"><?=$nome_empresa?></span>
			            <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;"><?=$nome?></h2>
			            <p><?=$descricao?></p>
			          </div>
			        </div>
		          <div class="counter-wrap ftco-animate d-flex mt-md-3">
	              <div class="text p-4 bg-primary">
	              	<p class="mb-0">
		                <span class="number"><?=$preco?> R$</span>
	                </p>
	              </div>
		          </div>
		          <div class="counter-wrap ftco-animate d-flex mt-md-3">
	              	  <a href="https://api.whatsapp.com/send?phone=5585988574858&text=Teste" class="btn btn-primary px-4">Comprar</a></
                   
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
</section>
<?php require_once('footer.php') ?>