 <?php 
    class PersonaController{

        public static function PersonaInsertar($conection, $per){
            if (isset($per)) {
                $query = $conection->prepare("INSERT INTO PERSONA(nombre_persona, apellido_persona, direccion_persona, edad_persona, estado_civil) 
                                              VALUES(?,?,?,?,?);");                 
                    $nombre=$per->getNombre_persona();
                    $apellido=$per->getApellido_persona();
                    $direccion=$per->getDireccion_persona();
                    $edad=$per->getEdad();
                    $estado=$per->getEstadocivil();

                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $apellido);
                    $query->bindParam(3, $direccion);
                    $query->bindParam(4, $edad);
                    $query->bindParam(5, $estado); 
                    $query->execute();
                  
            
                    header("Location: ../../Vistas/Persona/Lista_Personas.php"); 
                    }
        }

        public static function EditarPersona($conection,$per){
            $query = $conection->prepare("UPDATE PERSONA SET nombre_persona = ?, apellido_persona = ?, direccion_persona = ? , edad_persona = ? , estado_civil = ?
            WHERE id_persona = ?;");
                if (isset($per)) {
                    $id_persona=$per->getId_persona();
                    $nombre=$per->getNombre_persona();
                    $apellido=$per->getApellido_persona();
                    $direccion=$per->getDireccion_persona();
                    $edad=$per->getEdad();
                    $estado=$per->getEstadocivil();
       
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $apellido);
                    $query->bindParam(3, $direccion);
                    $query->bindParam(4, $edad);
                    $query->bindParam(5, $estado);
                    $query->bindParam(6,$id_persona); 
                    $query->execute(); 
                 
                    header("Location: ../../Vistas/Persona/Lista_Personas.php"); 
                }
            
        }

        public static function PersonaEliminar($conection, $id){
            if (isset($id) && isset($conection)) {
                $query = $conection->prepare("DELETE FROM PERSONA WHERE id_persona = ?;");
                $idp = $id;
                $query->bindParam(1, $idp);
                $query->execute();
                $conection->closelog; 
                header("Location: ../../Vistas/Persona/Lista_Personas.php");   
                ob_end_flush();                  
            }
           
           }

        public static function GetPersonas($conection){
                $result = $conection->query("SELECT * FROM PERSONA order by id_persona");
              return  $listaPersonas = $result->fetchAll(PDO::FETCH_OBJ);
       }
    }
 ?>