<?php
    require_once('../include_dao.php');
    session_start();

    $email = isset($_POST['email'])?$_POST['email']:"";
    $senha = isset($_POST['senha'])?$_POST['senha']:"";
    $dao = new UsuarioDAO();
    $usuario= new Usuario();
    
    if (!empty($email) and !empty($senha)) {
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $logar = $dao->logar($usuario);
        if (!empty($logar)) {
          $_SESSION['cod'] = $logar['cod'];
          header('location:escolhaView.php');
        } else {
          unset($_SESSION['cod']);
          header('location:loginView.php');
        }
    }
?>
<?php require_once('header.php') ?>
<div class="row justify-content-center no-gutters block-9" style="padding-top: 10%;background-color:#76ABAB;padding-bottom: 15%">  

          <div class="col-md-2.99 order-md-last d-flex" style="box-shadow: 10px 10px 10px">

            <form method="POST" class=" p-5 contact-form" style="background-color: white" >
              <h1 style="text-align: center; ">Login</h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
                <!-- <span onclick="viewPass();">Clique</span> -->
              </div>
              <div class="form-group" style="margin-left: 60%">
                <input type="submit" value="Logar" class="btn py-2 px-4 mt-3" style="font-size: 100%;background-color: #91B8B8">
              </div>
            </form> 
          </div>
</div>
<?php require_once('footer.php') ?>