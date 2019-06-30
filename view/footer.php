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
<footer class="ftco-footer ftco-section" style="background-color: #6D9E9E">
      <div class="container">
        <div class="row mb-20">
          <div class="col-md" style="text-align: center;">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Localização</h2>
              <p  style="text-align: center;"><?=$local?></p>
            </div>
          </div>
          <div class="col-md"  style="text-align: center;">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Telefone</h2>
              <ul class="list-unstyled">
                <p  style="text-align: center;"><?=$tel?></p>
              </ul>
            </div>
          </div>
          <div class="col-md"  style="text-align: center;">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Email</h2>
              <ul class="list-unstyled">
                <p  style="text-align: center;"><?=$email?></p>
              </ul>
            </div>
          </div>
          </div>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>