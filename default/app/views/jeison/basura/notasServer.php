

<?php

$db = new PDO('mysql:host=localhost;dbname=belen_sistema_academico', 'root', '');
$page = isset($_GET['p'])?$_GET['p']:'';

if ($page == 'add') {
    
 //$idNota = $_POST['idNota'];
$idAlumno =$_POST['idALumno'];
$faltas = $_POST['faltas'];
$taller = $_POST['taller'];
$prueba_escrita = $_POST['prueba_escrita'];
$laboratorios = $_POST['laboratorios'];
$evaluacion_oral = $_POST['evaluacion_oral'];
$evaluacion_escrita = $_POST['evaluacion_escrita'];
$puntualidad = $_POST['puntualidad'];
$presentacion_personal = $_POST['presentacion_personal'];
$comportamiento = $_POST['comportamiento'];
$interes_participacion = $_POST['interes_participacion'];

$stmt = $db->prepare("insert into nota values ('',?,?,?,?,?,?,?,?,?,?,?)");
$stmt->blindParam(1,$idAlumno);
$stmt->blindParam(2,$faltas);
$stmt->blindParam(3,$taller);
$stmt->blindParam(4,$prueba_escrita);
$stmt->blindParam(5,$laboratorios);
$stmt->blindParam(6,$evaluacion_oral);
$stmt->blindParam(7,$evaluacion_escrita);
$stmt->blindParam(8,$puntualidad);
$stmt->blindParam(9,$presentacion_personal);
$stmt->blindParam(10,$comportamiento);
$stmt->blindParam(11,$interes_participacion);

$stmt->execute();
    
} elseif ($page == 'edit') {
    
} elseif ($page == 'del') {
    
}

else {
    
}
?>