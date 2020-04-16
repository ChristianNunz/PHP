<?php
     include_once "../../Modelos/BD_coneccion.php";
     include_once "../../Modelos/ClienteModel.php";
     include_once "../../Controladores/ClienteController.php";
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
            <h1 style="color: black"> Agregar Cliente</h1>
            <form action="" method="POST">
                <?php
                    if ( isset($_POST['nombrec']) && isset($_POST['apellidoc']) && isset($_POST['telefonoc']) ) {       
                        $Cliente = new ClienteModel($_POST['nombrec'],$_POST['apellidoc'],$_POST['telefonoc']);           
                        ClienteController::InsertarCliente($coneccion,$Cliente);
                    }
                ?>
                <div class="form-group">
                        <label for="nombrec" style="color: black">Nombres</label>
                        <input required name="nombrec" type="text" id="nombrec"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="apellidoc" style="color: black">Apellidos</label>
                        <input required name="apellidoc" type="text" id="apellidosc" class="form-control">
                     </div>

                    <div class="form-group">
                        <label for="telefonoc" style="color: black">Telefono</label>
                        <input type="tel" required pattern="[0-9]{4}-[0-9]{4}" placeholder="7777-7777"  required name="telefonoc" id="Telefono" class="form-control"/>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Agregar Cliente ✔️ </button>
                    <a href="../../Vistas/Cliente/Lista_Clientes.php" class="btn btn-info">Lista Clientes ➡ </a>
                </div>
            </form>
        </div>
    </div>

</main>
<?php include "../foot.html"?>