<?php 
require_once('header.php');
require_once('../include_dao.php');
$funcoesProdutos = new ProdutoDAO();
$produtos = $funcoesProdutos -> listarTodos();
 ?>
<section class="ftco-section bg-light" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Produtos</span>
            <h2 class="mb-4">Produtos</h2>
            <p>Esperamos que encontre o que procura ^-^</p>
          </div>
        </div>
        <div class="row d-flex">
          <?php
          $produtos = $funcoesProdutos->listarTodos();
          foreach ($produtos as $produto)
          {
          ?>
          <div class="col-md-4 flex ftco-animate" style="padding-bottom: 4%">
          	<div class="blog-entry justify-content-end">
              <a  class="block-20" style="background-image: url('images/produtos/<?=$produto['imagem']?>');">
              </a>
              <div class="text mt-3 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4 topp">
              		<div class="one mr-2">
              			<span class="day"><?=$produto['preco']?></span>
              		</div>
              		<div class="two">
              			<span class="mos">R$</span>
              		</div>
              	</div>
                <h3 class="heading"><a ><?=$produto['nome']?></a></h3>
                <p><?=$produto['descricao']?></p>
                <div class="d-flex align-items-center mt-4 meta">
                    <a href="compraView.php?produto=<?=$produto['cod']?>"><button type="button" class="btn btn-primary px-5">Comprar</button></a>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>
    </section>
    
    <?php require_once('footer.php') ?>