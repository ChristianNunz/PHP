<?php
     include_once "../../Modelos/BD_coneccion.php";
     include_once "../../Modelos/VendedorModel.php";
     include_once "../../Controladores/VendedorController.php";
     $c = new Coneccion();
     $coneccion = $c->ConeccionBD(); 

        session_start();
     if (!strcmp ($_SESSION["{J3^W!>Mx48><}"] , "[Qp3#>j/!Zz3@)")) {

     }
     else{
        header("Location: ../../Index.php"); 
     }
?>
<?php include "../head.html"?>
<main role="main" class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <br>
            <h1 style="color: black"> Agregar Vendedor</h1>
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
                        <input required name="nombrev" type="text" id="nombreVendedor" placeholder="Nombre del Vendedor" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5><label for="apellidov" style="color: black">Apellidos</label></h5>
                        <input required name="apellidov" type="text" id="apellidosVendedor" placeholder="Apellidos del Vendedor" class="form-control">
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
                    <button type="submit" class="btn btn-success">Agregar Vendedor ✔️ </button>
                    <a href="../../Vistas/Vendedor/Lista_Vendedores.php" class="btn btn-info">Lista Vendedores ➡ </a>
                </form>
        </div>
    </div>

    
</main> 
<?php include "../foot.html"?>