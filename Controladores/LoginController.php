<?php 
  
  class LoginController{
   
        public static function IniciarSesion($conec,$login){

                $semilla1='!@11chN-27';
                $semilla2='>,A|3X>n*e$';

                if (isset($conec) && isset($login)) {  
                        $query = $conec->prepare("SELECT usuario  FROM VENDEDOR 
                        WHERE usuario =? AND contrasena=?;");
                       
                        $user = $login->getUsuario();
                        $pass = $login->getContrasena();

                        $pass= md5(md5(sha1($semilla1.$pass.$semilla2)));
                      
                        $query->bindParam(1, $user);
                        $query->bindParam(2,$pass); 
                        $query->execute();
                        $result = $query->fetchObject();


                        session_start();
                                $_SESSION["{J3^W!>Mx48><}"] = 'null';

                        if ($result->usuario == $user ) {
                                
                                $_SESSION["{J3^W!>Mx48><}"] = "[Qp3#>j/!Zz3@)";
                                header("Location: ./Vistas/Vendedor/V_Vendedor.php"); 
                        }
                        else{
                                unset($_SESSION["{J3^W!>Mx48><}"] );
                                session_destroy();
                                header("Location: ./Index.php"); 
                        }
        
                }

        }
   }

?>