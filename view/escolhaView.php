<?php 
require_once('header.php');
session_start();

if (empty($_SESSION['cod'])) {
  header('location:loginView.php');
}


?>

<section class="ftco-section ftco-no-pb ftco-no-pt ftco-services bg-light" id="services-section">
      <div class="container" style="padding-top: 7%;padding-bottom: 10%" >
        <h2 class="mb-4 text-center" >Olá Administrador ^-^</h2>
        <div class="row no-gutters">
          <div class="col-md-5 ftco-animate py-10 nav-link-wrap" style= "margin-left: 30%; background-color: #91B8B8 ">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <a class="nav-link px-4 " id="v-pills-1-tab" href="cadastrarProdutoView.php" role="tab" aria-controls="v-pills-1" aria-selected="false"><span class="icon-ticket"></span>Cadastrar Produtos</a>

              <a class="nav-link px-4" id="v-pills-2-tab"  href="cadastrarCategoriaView.php" role="tab" aria-controls="v-pills-2" aria-selected="false"><span class="icon-group"></span> Cadastrar Categorias</a>

              <a class="nav-link px-4 " id="v-pills-1-tab" href="escView.php" role="tab" aria-controls="v-pills-1" aria-selected="false"><span class="icon-cogs"></span>Configurações da Empresa</a>

              <a class="nav-link px-4" id="v-pills-3-tab"  href="cadastrarProdutoCategoriaView.php"role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="icon-table"></span>Inserir em uma categoria</a>

              <a class="nav-link px-4" id="v-pills-3-tab"  href="lista.php"role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="icon-list"></span>Lista de produtos</a>

              <a class="nav-link px-4" id="v-pills-3-tab"  href="listaCat.php"role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="icon-list"></span>Lista de categorias</a>

              <a class="nav-link px-4" id="v-pills-3-tab"  href="logout.php" role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="icon-cancel"></span>Logout</a>
              <!--
              <a class="nav-link px-4" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false"><span class="mr-3 flaticon-web-design"></span> UI Design</a>

              <a class="nav-link px-4" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false"><span class="mr-3 flaticon-ux-design"></span> Ux Design</a>

              <a class="nav-link px-4" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false"><span class="mr-3 flaticon-innovation"></span> Technology</a>

              <a class="nav-link px-4" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false"><span class="mr-3 flaticon-idea"></span> Creative</a>
            -->
            </div>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>