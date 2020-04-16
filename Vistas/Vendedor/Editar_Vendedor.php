<?php include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Modelos/VendedorModel.php";
      include_once "../../Controladores/VendedorController.php";
     $c = new Coneccion();
     $conection = $c->ConeccionBD();
     session_start();
     if (!strcmp ($_SESSION["{J3^W!>Mx48><}"] , "[Qp3#>j/!Zz3@)")) {

     }
     else{
        header("Location: ../../Index.php"); 
     }
?>
<?php 
    //Consulta de la persona a Editar
      if (!isset($_GET["id_vendedor"])) {
        exit();
     }
            $query = $conection->prepare("SELECT id_vendedor, nombre_vendedor, apellido_vendedor , telefono_vendedor, usuario  FROM VENDEDOR 
                                        WHERE id_vendedor =?;");
            $query->execute([$_GET["id_vendedor"]]);
            $result = $query->fetchObject();
            if (!$result) {
                echo "No existe esa vendedor";
                exit();
            }
?>
<?php include "../head.html"?>
<main role="main" class="container" >
    <div class="row">
        <div class="col-12">
                <form action="" method="post">
                <br>
                <br>
                <h1 style="color: black"> Editar Vendedor</h1>
                <div class="form-group" >
                <?php 
                        if ( isset($_POST['nombrev']) && isset($_POST['apellidov']) && isset($_POST['telefonov']) && isset($_POST['user']) && isset($_POST['pass']) ) {                                   
                                $ven = new VendedorModel($_POST['nombrev'],$_POST['apellidov'],$_POST['telefonov'],$_POST['user'],$_POST['pass']);  
                                $ven->setId_vendedor($_POST['id_vendedor']);
                                VendedorController::EditarVendedor($conection, $ven);
                            }
                ?>
                        <label for="nombrev" style="color: black">Nombres</label>
                        <input required name="id_vendedor" type="hidden" id="id_vendedor" value="<?php echo $result->id_vendedor; ?>" >
                        <input required name="nombrev" type="text" id="nombreVendedor"  class="form-control" value="<?php echo $result->nombre_vendedor; ?>">
                    </div>

                    <div class="form-group">
                        <label for="apellidov" style="color: black">Apellidos</label>
                        <input required name="apellidov" type="text" id="apellidosVendedor" class="form-control "value="<?php echo $result->apellido_vendedor; ?>">
                     </div>

                    <div class="form-group">
                        <label for="telefonov" style="color: black">Telefono</label>
                        <input type="tel" required pattern="[0-9]{4}-[0-9]{4}" placeholder="7777-7777"  required name="telefonov" id="Telefono" class="form-control"value="<?php echo $result->telefono_vendedor; ?>">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                    <h5><label for="user" style="color: black">Usuario:</label></h5>   
                                    <input required name="user" type="text" id="nombreVendedor" placeholder="Usuario" class="form-control-lg" value="<?php echo $result->usuario; ?>">
                            </div>
                            <div class="col-md-6">
                                    <h5><label for="pass"style="color: black"> Nueva Contraseña:</label></h5>
                                    <input type="password" id="pass" required name="pass" placeholder="Contraseña" class="form-control-lg">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar Vendedor ✔️ </button>
                    <a href="../../Vistas/Vendedor/Lista_Vendedores.php" class="btn btn-info">Lista Vendedores ➡ </a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include"../foot.html"?>