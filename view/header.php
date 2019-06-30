<?php 
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
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title><?=$titulo?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    -->
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" style="" >
	  
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" style="background: #6D9E9E!important;box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1)" id="ftco-navbar">
         
	    <div class="container" style="background-color: ">
	      <a class="navbar-brand" href="index.php" style="color: white" ><?=$nome?></a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link" style="color: white"><span>Home</span></a></li>
	          <li class="nav-item"><a href="categoriaView.php" class="nav-link" style="color: white"><span>Categorias</span></a></li>
	          <li class="nav-item"><a href="loginView.php" class="nav-link" style="color: white"><span>Login</span></a></li>
	          <li class="nav-item"><a href="produtosView.php" class="nav-link" style="color: white"><span>Produtos</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>