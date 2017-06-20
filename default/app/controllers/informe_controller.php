<?php

View::template('sbadmin');
session_start();

class InformeController extends AppController {



	public function index(){

    $this->titulo = "Gestión de Infomes";
    $this->subtitulo = "Informes por Materias";
    $this->informacion = "Por favor, seleccione el grado y la materia para la cual quiere generar la tabla.";
    
    $anio = new Anio();
    $this->anio=$anio->getAllAnios();


	}


   public function vacia(){


    if(Input::hasPost('periodoR')){

     $anioRe=Input::post('idAnioB');
     $gradoRe=Input::post('gradoB');
     $nombreMateriaRe=Input::post('materiaB');
     $periodoRe=Input::post('periodoB');

     $anio= new Anio();
     $this->anio=$anio->find($anioRe);

     $grado = new Grado();
     $this->grado=$grado->find($gradoRe);
     $this->periodoSel=$periodoRe;

     $materia = new Materia();

    $this->materia=$materia->find_by_sql("SELECT * from materia where nombreMateria='$nombreMateriaRe' and 
          gradoMateria=$gradoRe
    	");

    $m2=$materia->find_by_sql("SELECT * from materia where nombreMateria='$nombreMateriaRe' and 
          gradoMateria=$gradoRe
    	");

    $profesor = new Profesor();
    $this->profesor= $profesor->find($m2->profesor_idPro);

     $alumno = new Alumno();


   $sql ="SELECT nombre,apellido,identidadAl from notap inner join alumno
  on notap.alumno_idAlumno=alumno.idAlumno inner join materia on 
  notap.materia_idMateria=materia.idMateria inner join logros on 
  materia.idMateria=logros.materia_idMateria inner join matricula on 
  alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join grado on
    alumno.grado_idGrado=grado.idGrado inner join periodo on 
    notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio
     on alumno.idAlumno=promedio.alumno_idAlumno where matricula.anio_idAnio=$anioRe 
     and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$periodoRe
      and notap.grado_idGrado=$gradoRe and materia.nombreMateria='LENGUA CASTELLANA'
       and logros.periodo_idPeriodo=$periodoRe and materia.gradoMateria=$gradoRe
       and promedio.periodo_idPeriodo=$periodoRe order by alumno.nombre"; // cambiar order by promedio.valor para puestos

       // hacer 2 tipos de informes, para secundaria también

    $this->listaAlumnos = $alumno->find_all_by_sql($sql);




     View::select('informe_vacio');


    }
    


   }



}// Fin Controlador Informes



?>