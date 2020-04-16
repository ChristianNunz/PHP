<?php include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Modelos/ClienteModel.php";
      include_once "../../Controladores/ClienteController.php";
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
      if (!isset($_GET["id_cliente"])) {
        exit();
     }
            $query = $conection->prepare("SELECT * FROM CLIENTE 
                                        WHERE id_cliente =?;");
            $query->execute([$_GET["id_cliente"]]);
            $result = $query->fetchObject();
            if (!$result) {
                echo "No existe ese Cliente";
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
                <h1 style="color: black"> Editar Cliente</h1>
                <div class="form-group" >
                <?php 
                        if ( isset($_POST['nombrec']) && isset($_POST['apellidoc']) && isset($_POST['telefonoc'])  ) {                                   
                                $Cliente = new ClienteModel($_POST['nombrec'],$_POST['apellidoc'],$_POST['telefonoc']);  
                                $Cliente->setId_cliente($_POST['id_cliente']);
                                ClienteController::EditarCliente($conection, $Cliente);
                            }
                ?>
                        <label for="nombrev" style="color: black">Nombres</label>
                        <input required name="id_cliente" type="hidden" id="id_cliente" value="<?php echo $result->id_cliente; ?>" >
                        <input required name="nombrec" type="text"   class="form-control" value="<?php echo $result->nombre_cliente; ?>">
                    </div>

                    <div class="form-group">
                        <label for="apellidoc" style="color: black">Apellidos</label>
                        <input required name="apellidoc" type="text"  class="form-control "value="<?php echo $result->apellidos_cliente; ?>">
                     </div>

                    <div class="form-group">
                        <label for="telefonoc" style="color: black">Telefono</label>
                        <input type="tel" required pattern="[0-9]{4}-[0-9]{4}" placeholder="7777-7777"  required name="telefonoc" id="Telefono" class="form-control"value="<?php echo $result->telefono_cliente; ?>">
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar Cliente ✔️ </button>
                    <a href="../../Vistas/Cliente/Lista_Clientes.php" class="btn btn-info">Lista Clientes ➡ </a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include "../foot.html"?>