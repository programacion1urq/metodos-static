<?php
require 'Alumno.php';
class AlumnoPresencial extends Alumno
{
    const NOTAMINIMA = 4;
    const MINIMOASIST = 75;
    private $notas = array();
    private $cantidadInasistencias;
    private static $diasHabiles;

    public static function setDiasHabiles($d) {
        self::$diasHabiles = $d;
    }

    public function __construct($n, $a, $d, $i, Array $notas)
    {
        parent::__construct($n,$a,$d);
        $this->cantidadInasistencias = $i;
        $this->notas = $notas;
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
}
