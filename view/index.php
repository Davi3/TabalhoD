<?php 
	require_once('header.php');
	require_once('../include_dao.php');

	$funcoes= new ConfiguracoeDAO();
	$configuracoe = $funcoes -> listarTodos();

	foreach ($configuracoe as $key) {
		$titulo = $key['titulo']; 
	    $nome = $key['nome'];
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
?>
	  <section id="home-section" class="hero" style="background-color:#76ABAB">
	  	<h3 class="vr" style="color: white"><?=$nome?></h3>
		  <div class="home-slider js-fullheight owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight">
	          		<img src="images/produtos/<?=$slide1?>" style="width: 50%;margin-top: 15%;margin-left: 30%;box-shadow: 10px 10px 10px">
	          	<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="" style="color: white;font-family: cursive;">Bem-Vindo</span>
			            <h1 class="mb-4 mt-3"><span><?=$frase1?></span></h1>
			            <p><?=$subf1?></p>
			            <p><a href="produtosView.php" class="btn  px-5 py-3 mt-3" style="font-size: 100%;background-color: white"><?=$bt1?></a></p>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight">
	          		<img src="images/produtos/<?=$slide2?>" style="width: 50%;margin-top: 15%;margin-left: 30%;box-shadow: 10px 10px 10px">
	          		<div class="overlay"></div>
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class=""style="color: white;font-family: cursive;">Bem-Vindo</span>
			            <h1 class="mb-4 mt-3" ><span><?=$frase2?></span></h1>
			            <p><?=$subf2?></p>
			            
			            <p><a href="produtosView.php" class="btn px-5 py-3 mt-3" style="font-size: 100%;background-color: white"><?=$bt2?></a></p>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>
<?php require_once('footer.php') ?>