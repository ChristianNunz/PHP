<?php
     include_once "../../Modelos/BD_coneccion.php";
     include_once "../../Modelos/PersonaModel.php";
     include_once "../../Controladores/PersonaController.php";
     $c = new Coneccion();
     $coneccion = $c->ConeccionBD(); 
?>
<?php include "../head.html" ?>
<main role="main" class="container">
<div class="row">
        <div class="col-12">
                <br>
                <br>
            <h1 style="color: black"> Agregar Persona</h1>
            <form action="" method="POST">
                <?php 
                    if ( isset($_POST['nombrep']) && isset($_POST['apellidop']) && isset($_POST['direccionp']) && isset($_POST['edadp']) && isset($_POST['estadocivilp']) ) {       
                        $per = new PersonaModel($_POST['nombrep'],$_POST['apellidop'],$_POST['direccionp'],$_POST['edadp'],$_POST['estadocivilp']);                            
                        PersonaController::PersonaInsertar($coneccion,$per);
                    }
                ?>
                <div class="form-group">
                <input type="hidden" required name="action" value="1" >
                    <label for="nombrep"  style="color: black">Nombre Persona</label>
                    <input required name="nombrep" type="text" id="nombrePersona" placeholder="Nombre de la Persona" class="form-control">
                </div>

                <div class="form-group">
                    <label for="apellidov"  style="color: black">Apellido Persona</label>
                    <input required name="apellidop" type="text" id="apellidoPersona" placeholder="Apellido de la Persona" class="form-control">
                </div>

                <div class="form-group">
                    <label for="direccionp"  style="color: black">Direccion</label>
                    <input required name="direccionp" type="text" id="direccionPersona" placeholder="Direccion de la persona" class="form-control">
                </div>

                <div class="form-group">
                    <label for="edadp"  style="color: black">Edad</label>
                    <input required name="edadp" type="text" id="edadPersona" placeholder="Edad" class="form-control">
                </div>

                <div class="form-group">
                <label  for="estadocivilp"  style="color: black">Estado Civil</label>
                    <select  require name="estadocivilp" type="text" id="estadocivilp" class="form-control">
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Noviazgo">Noviazgo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Agregar Persona ✔️ </button>
                <a href="../../Vistas/Persona/Lista_Personas.php" class="btn btn-info">Ver Lista de Personas ➡</a>
            </form>   
        </div>
    </div> 
</main>
<?php  include "../foot.html"?>
