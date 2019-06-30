<?php 
require_once('header.php');
session_start();

if (empty($_SESSION['cod'])) {
  header('location:loginView.php');
}


?>

<section class="ftco-section ftco-no-pb ftco-no-pt ftco-services bg-light" id="services-section">
      <div class="container" style="padding-top: 7%;padding-bottom: 10%">
        <h2 class="mb-4 text-center" >Olá Administrador ^-^</h2>
        <div class="row no-gutters" >
          <div class="col-md-5 ftco-animate py-10 nav-link-wrap" style="margin-left: 30%;background-color:#76ABAB">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <a class="nav-link px-4 " id="v-pills-1-tab" href="cadastrarEmpresaView.php" role="tab" aria-controls="v-pills-1" aria-selected="false"><span class="icon-book"></span>Cadastrar empresa</a>

              <a class="nav-link px-4 " id="v-pills-1-tab" href="editarEmpresaView.php" role="tab" aria-controls="v-pills-1" aria-selected="false"><span class="icon-book"></span>Editar empresa</a>

              <a class="nav-link px-4" id="v-pills-3-tab"  href="escolhaView.php" role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="icon-remove"></span>Voltar</a>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php require_once('footer.php') ?>