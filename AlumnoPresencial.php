<?php
class AlumnoPresencial
{
    const NOTAMINIMA = 4;
    const MINIMOASIST = 75;
    private $nombre;
    private $apellido;
    private $dni;
    private $notas = array();
    private $cantidadInasistencias;
    private static $diasHabiles;


    public static function setDiasHabiles($d) {
        self::$diasHabiles = $d;
    }

    public function __construct($n, $a, $d, $i, Array $notas)
    {
        $this->nombre = $n;
        $this->apellido = $a;
        $this->dni = $d;
        $this->cantidadInasistencias = $i;
        $this->notas = $notas;
    }

    public function getNombreApellido()
    {
        return "$this->nombre $this->apellido";
    }

    public function getDni()
    {
        return $this->dni;
    }

    private function porcentajeAsistencia() 
    {
        return 100 * (self::$diasHabiles - $this->cantidadInasistencias) / self::$diasHabiles;
    }

    private function hayReprobados()
    {
        foreach ($this->notas as $unaNota) {
            if ($unaNota < self::NOTAMINIMA) {
                return true;
            }
        }
        return false;
    }

    private function promedioNotas() {
        $suma = 0;
        foreach ($this->notas as $unaNota) {
            $suma += $unaNota;
        }
        return $suma / count($this->notas);
    }



    public function getNota()
    {
        if ($this->hayReprobados() || 
            $this->porcentajeAsistencia() < self::MINIMOASIST) {
            return 1;
        }
        else {
            return $this->promedioNotas();
        }
    }

    public function __toString() 
    {
        return "$this->nombre $this->apellido. DNI: $this->dni. Nota: " . $this->getNota();
    }
}



