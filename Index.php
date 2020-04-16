<?php
    include "./Controladores/LoginController.php"; 
    include "./Modelos/LoginModel.php";
    include "./Modelos/BD_coneccion.php";
          $c = new Coneccion();
          $conection = $c->ConeccionBD();  
?>
<title>Login</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="./Estilos/login.css">
<div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="./Imagenes/logo.png" class="w-75" alt="Logo"> </span><br/><br>
                        <span class="logo_title mt-5"> Emergentes </span>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php 
                        if (isset($_POST['user']) && isset($_POST['password'])) {
                           $login = new LoginModel($_POST['user'],$_POST['password']);
                           LoginController::IniciarSesion($conection,$login);
                    }
                ?>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" required name ="user" class="form-control" placeholder="Usuario">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" required name="password" class="form-control" placeholder="Contraseña">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Iniciar Sesion " class="btn btn-outline-danger float-right login_btn">
                </div>
            </form>
        </div>
        <span class="txt1" style="color: white">
        No tienes una Cuenta?
        </span>
        <a href="./Vistas/Vendedor/Registrarse.php" class="txt2 hov1">
         Registrate!
        </a>
        </div>
    </div>
</div>