<?php 
class PersonaModel 
{
    private $id_persona;
    private $nombre_persona;
    private $apellido_persona;
    private $direccion_persona;
    private $edad;
    private $estadocivil;

    public function __construct($nombre_persona,$apellido_persona,$direccion_persona,$edad,$estadocivil){
        $this->nombre_persona= $nombre_persona;
        $this->apellido_persona= $apellido_persona;
        $this->direccion_persona= $direccion_persona;
        $this->edad= $edad;
        $this->estadocivil= $estadocivil;        
    }

    public function getId_persona()
    {
        return $this->id_persona;
    }

  
    public function setId_persona($id_persona)
    {
        $this->id_persona = $id_persona;

        return $this;
    }
 
    public function getNombre_persona()
    {
        return $this->nombre_persona;
    }

    public function setNombre_persona($nombre_persona)
    {
        $this->nombre_persona = $nombre_persona;

        return $this;
    }

    public function getApellido_persona()
    {
        return $this->apellido_persona;
    }

    public function setApellido_persona($apellido_persona)
    {
        $this->apellido_persona = $apellido_persona;

        return $this;
    }

    public function getDireccion_persona()
    {
        return $this->direccion_persona;
    }

    public function setDireccion_persona($direccion_persona)
    {
        $this->direccion_persona = $direccion_persona;

        return $this;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    public function getEstadocivil()
    {
        return $this->estadocivil;
    }

    public function setEstadocivil($estadocivil)
    {
        $this->estadocivil = $estadocivil;

        return $this;
    }
}
?>