<?php require_once('header.php');
require_once('../include_dao.php');
$funcoesCategoria = new CategoriaDAO();
$funcoesProduto = new ProdutoDAO();
?>

<section class="ftco-section ftco-no-pb ftco-no-pt ftco-services bg-light" id="services-section">

      <div class="container" style="padding-top: 7%">

        <div class="row no-gutters">
          <div class="col-md-4 ftco-animate" style="background-color: #91B8B8;margin-bottom: 10%;margin-top: 10%;margin-left: 35%">
            <h2 class="mb-4 text-center" style="color: white">Categorias</h2>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <?php
              $categorias = $funcoesCategoria->listarTodos();
              foreach ($categorias as $categoria)
              {
              ?>
              <a class="nav-link px-4 " href="prod_catView.php?categoria=<?=$categoria['cod']?>"><span class="mr-3 icon-group
                "></span><?=$categoria['nome']?></a>
              <?php
              }
              ?>  
            </div>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>