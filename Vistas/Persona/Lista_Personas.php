<?php
      include_once "../../Modelos/PersonaModel.php";
      include_once "../../Modelos/BD_coneccion.php";
      include_once "../../Controladores/PersonaController.php";

      $c = new Coneccion();
      $coneccion = $c->ConeccionBD();  
      $persona = new PersonaController();
      $listaP = $persona->GetPersonas($coneccion);
      ob_start();
?>
 
    <?php include "../head.html"?>

        <div class="row">
            <div class="col-12">
            <br>
            <br>
            <h1 style="color: black">Lista De Personas</h1>
            <br>
            <br>
                <div class="table table-responsive">
                <table class="table table-borderless" >
                    <thead class="thead-dark" style="color: black">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellido 
                            </th>
                            <th>
                                Direccion 
                            </th>
                            <th>
                                Edad 
                            </th>
                            <th>
                            Estado Civil
                            </th>
                            <th>

                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listaP as $listaP){ ?>
                        <tr style="color: black">
                            <td>
                                <?php echo $listaP->id_persona?>
                            </td>
                            <td>
                                <?php echo $listaP->nombre_persona ?>
                            </td>
                            <td>
                                <?php echo $listaP->apellido_persona ?>
                            </td>
                            <td>
                            <?php echo $listaP->direccion_persona ?>
                            </td>
                            <td>
                                <?php echo $listaP->edad_persona?>
                            </td>
                            <td>
                            <?php echo $listaP->estado_civil ?>
                            </td>
                            <td>
                            <a class="btn btn-warning" href="<?php echo "../../Vistas/Persona/Editar_Persona.php?id_persona=" . $listaP->id_persona?>"> Editar 📝 </a>
                            </td>
                            <td>                         
                            <form action="" method="post">
                                <?php 
                                    if (isset($_POST['idp'])) {
                                        PersonaController::PersonaEliminar($coneccion,$_POST['idp']);                                                               
                                    }
                                ?>
                                <input type="hidden" name="idp" value="<?php echo $listaP->id_persona?>">
                                <input type="submit" class="btn btn-danger"  name="accion" value="Eliminar 🗑️">
                            </form>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </div>
            </div>
        </div>

        
    <?php include "../foot.html"?>

