<?php
require_once 'AlumnoPresencial.php';
require_once 'AlumnoLibre.php';

if($_POST['tipo'] == 'libre') {
    $alumno = new AlumnoLibre( $_POST['nombre'], $_POST['apellido'], 
                               $_POST['dni'], $_POST['notaFinal'] );
}
elseif ( $_POST['tipo'] == 'presencial' ) {
    // Invocamos el método static setDiasHabiles, de la clase AlumnoPresencial
    AlumnoPresencial::setDiasHabiles($_POST['diasHabiles']);

    $alumno = new AlumnoPresencial($_POST['nombre'], $_POST['apellido'], 
                      $_POST['dni'], $_POST['inasistencias'], $_POST['notas']);
}

$datos['alumno'] = $alumno->getNombreApellido();
$datos['dni'] = $alumno->getDni();
$datos['nota'] = $alumno->getNota();

//Para probar el método __toString():
$datos['cadena'] = "Datos del alumno: " . $alumno;

header('Content-Type: application/json');
echo json_encode($datos);
