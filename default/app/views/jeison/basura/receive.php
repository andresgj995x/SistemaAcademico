<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "belen_sistema_academico";

// Vamos a guardar las variables que llegan por el método GET
$idNota = $_GET['idNota'];

$faltas = $_GET['faltas'];
$taller = $_GET['taller'];
$prueba_escrita = $_GET['prueba_escrita'];
$laboratorios = $_GET['laboratorios'];
$evaluacion_oral = $_GET['evaluacion_oral'];
$evaluacion_escrita = $_GET['evaluacion_escrita'];
$puntualidad = $_GET['puntualidad'];
$presentacion_personal = $_GET['presentacion_personal'];
$comportamiento = $_GET['comportamiento'];
$interes_participacion = $_GET['interes_participacion'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Falló la conexión con la base de datos.!: " . $conn->connect_error);
} 

$sql = "UPDATE nota set faltas ='$faltas', taller ='$taller', prueba_escrita='$prueba_escrita' ,
                        laboratorios='$laboratorios',evaluacion_oral='$evaluacion_oral',evaluacion_escrita='evaluacion_escrita',
					    puntualidad='$puntualidad',presentacion_personal='$presentacion_personal',comportamiento='$comportamiento',
						interes_participacion='$interes_participacion' where idNota='$idNota'";

 

if ($conn->query($sql) === TRUE) {
    echo "Notas guardadadas correctamente!";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>