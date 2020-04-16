<?php include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Modelos/PersonaModel.php";
      include_once "../../Controladores/PersonaController.php";
     $c = new Coneccion();
     $conection = $c->ConeccionBD();
?>
<?php 
    //Consulta de la persona a Editar
      if (!isset($_GET["id_persona"])) {
        exit();
     }
            $query = $conection->prepare("SELECT id_persona, nombre_persona, apellido_persona, direccion_persona, edad_persona,estado_civil  FROM PERSONA 
                                        WHERE id_persona =?;");
            $query->execute([$_GET["id_persona"]]);
            $result = $query->fetchObject();
            if (!$result) {
                echo "No existe esa Persona";
                exit();
            }
?>
<?php include "../head.html" ?>
<main role="main" class="container" >
<div class="row">
        <div class="col-12">
        <br><br>
            <h1 style="color: black">Editar Persona</h1>
            <br><br>
            <form action="" method="POST">
             <?php 
             if ( isset($_POST['nombrep']) && isset($_POST['apellidop']) && isset($_POST['direccionp']) && isset($_POST['edadp']) && isset($_POST['estadocivilp']) ) {                                   
                    $per = new PersonaModel($_POST['nombrep'],$_POST['apellidop'],$_POST['direccionp'],$_POST['edadp'],$_POST['estadocivilp']);  
                    $per->setId_persona($_POST['pid']);
                   PersonaController::EditarPersona($conection, $per);
                }
             ?>
                <input type="hidden" required name="pid" value="<?php echo $result-> id_persona; ?>" >
                    <div class="form-group">
                        <h5><label for="nombrep"style="color: black">Nombre </label></h3>
                        <input value="<?php echo $result->nombre_persona; ?>" required name="nombrep" class="form-control" >
                    </div>

                    <div class="form-group">
                        <h5><label for="apellidop" style="color: black">Apellido</label></h3>
                        <input value="<?php echo $result->apellido_persona; ?>" required name="apellidop" class="form-control" >
                    </div>

                    <div class="form-group">
                       <h5> <label for="direccionp" style="color: black">Direccion</label></h3>
                        <input value="<?php echo $result->direccion_persona; ?>" required name="direccionp" class="form-control" >
                    </div>

                    <div class="form-group">
                        <h5><label for="edadp" style="color: black">Edad</label></h3>
                        <input value="<?php echo $result->edad_persona; ?>" required name="edadp" type="text" id="edadPersona" placeholder="Edad" class="form-control">
                    </div>

                    <div class="form-group">
                        <h5><label  for="estadocivilp" style="color: black">Estado Civil</label></h5>
                            <select value="<?php echo $result->estado_civil; ?>" require name="estadocivilp" type="text" id="estadocivilp" class="form-control">
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Noviazgo">Noviazgo</option>
                            </select>
                     </div>
                    
                    <button type="submit" class="btn btn-success" class="form-control" > 
                        Actualizar ✔️
                    </button>
                    <a href="../../Vistas/Persona/Lista_Personas.php" class="btn btn-warning" class="form-control">
                        Volver ⬅    
                    </a>
            </form>
        </div>
    </div>
</main>
<?php include "../foot.html" ?>