<?php
require 'Alumno.php';
class AlumnoLibre extends Alumno
{
    private $notaFinal;

    public function __construct($n, $a, $d, $nf)
    {
        parent::__construct($n,$a,$d);
        $this->notaFinal = $nf;
    }
    
    public function getNota()
    {
        return $this->notaFinal;
    }

}



