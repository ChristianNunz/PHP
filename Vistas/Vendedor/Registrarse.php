<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registrarse</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
     include_once "../../Modelos/BD_coneccion.php";
     include_once "../../Modelos/VendedorModel.php";
     include_once "../../Controladores/VendedorController.php";
     $c = new Coneccion();
     $coneccion = $c->ConeccionBD(); 
?>
<body>
<main role="main" class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <br>
            <h1 style="color: black"> Registrarse</h1>
            <br>
                <form action="" method="POST">
                    <?php 
                        if ( isset($_POST['nombrev']) && isset($_POST['apellidov']) && isset($_POST['telefonov']) && isset($_POST['user']) && isset($_POST['pass']) ) {       
                            $Ven = new VendedorModel($_POST['nombrev'],$_POST['apellidov'],$_POST['telefonov'],$_POST['user'],$_POST['pass']);  
                                                    
                            VendedorController::InsertarVendedor($coneccion,$Ven);
                        }
                    ?>

                    <div class="form-group">
                        <h5><label for="nombrev" style="color: black">Nombres</label></h5>
                        <input required name="nombrev" type="text" id="nombreVendedor" placeholder="Nombres" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5><label for="apellidov" style="color: black">Apellidos</label></h5>
                        <input required name="apellidov" type="text" id="apellidosVendedor" placeholder="Apellidos " class="form-control">
                     </div>

                    <div class="form-group">
                        <h5><label for="telefonov" style="color: black">Telefono</label></h5>
                        <input type="tel" required pattern="[0-9]{4}-[0-9]{4}" placeholder="7777-7777"  required name="telefonov" id="Telefono" class="form-control"/>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                    <h5><label for="user" style="color: black">Usuario:</label></h5>   
                                    <input required name="user" type="text" id="nombreVendedor" placeholder="Usuario" class="form-control-lg">
                            </div>
                            <div class="col-md-6">
                                    <h5><label for="pass"style="color: black">Contraseña:</label></h5>
                                    <input type="password" id="pass" required name="pass" placeholder="Contraseña" class="form-control-lg">
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Registrarse ✔️ </button>
                    <a href="../../Index.php" class="btn btn-info">Regresar </a>
                </form>
        </div>
    </div>

    
</main> 
</body>
</html>