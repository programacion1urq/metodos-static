<?php
class AlumnoLibre
{
    private $nombre;
    private $apellido;
    private $dni;
    private $notaFinal;

    public function __construct($n, $a, $d, $nf)
    {
        $this->nombre = $n;
        $this->apellido = $a;
        $this->dni = $d;
        $this->notaFinal = $nf;
    }

    public function getNombreApellido()
    {
        return "$this->nombre $this->apellido";
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getNota()
    {
        return $this->notaFinal;
    }

    public function __toString() 
    {
        return "$this->nombre $this->apellido. DNI: $this->dni. Nota: " . $this->getNota();
    }
}



