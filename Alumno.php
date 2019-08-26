<?php
abstract class Alumno
{

    private $nombre;
    private $apellido;
    private $dni;

    public function __construct($n, $a, $d)
    {
        $this->nombre = $n;
        $this->apellido = $a;
        $this->dni = $d;
    }

    public function getNombreApellido()
    {
        return "$this->nombre $this->apellido";
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function __toString() 
    {
        return "$this->nombre $this->apellido. DNI: $this->dni. Nota: " . $this->getNota();
    }
}

