<?php

View::template('sbadmin');
session_start();

class GenerarController extends AppController {


    public function cargarCarnetsGrados(){

     if (Input::hasPost('limite')) {

        $this->limite=Input::post('limite');
        $this->nombreR=Input::post('rectorNameF');
        $this->start= Input::post('start');
        $this->end = Input::post ('end');

        View::select('imprimir_carnet3');
    }


}

public function cargarCarnet($idAl){

    $this->titulo = "Gestión de Carnets";
    $this->subtitulo = "Carnets por grados";
    $this->informacion = "Por favor digite la información general de sus carnets y proceda a darle Generar";

    $alumno = new Alumno();
    $anio = new Anio();
    $grado= new Grado();

    $id=$_SESSION['idAnio'];

    $this->anio = $anio->find($id);
    $this->alumno = $alumno->find($idAl);


    $alumno = $alumno->find($idAl);
    $this->grado= $grado->find($alumno->grado_idGrado);


    $this->start= date("d-m-Y");
    $this->end = date('d-m-Y',strtotime('+1 years'));
    View::select('imprimir_carnet2');


}



public function recibirDatos(){

    $this->titulo = "Gestión de Carnets";
    $this->subtitulo = "Carnets por grados";
    $this->informacion = "Por favor digite la información general de sus carnets y proceda a darle Generar";

    $alumno = new Alumno();
    $anio = new Anio();


    $id=$_SESSION['idAnio'];

    $this->anio = $anio->find($id);



    if (Input::hasPost('gradoN')) {



        $gradoAlumno=Input::post('gradoF');
        $anioMat=Input::post('idAnio2');

        $sql = "SELECT * from alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula where estado.tipoEstado='Activo'and grado.idGrado=$gradoAlumno and matricula.anio_idAnio=$anioMat";

        $sql2 = "SELECT COUNT(*) as cuenta from alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula where estado.tipoEstado='Activo'and grado.idGrado=$gradoAlumno and matricula.anio_idAnio=$anioMat";
        $this->listaAlumnos = $alumno->find_all_by_sql($sql);
        $this->number=$alumno->find_by_sql($sql2);



        View::select('recibirDatos');

    }else{


        Redirect::to('generar/create_carnet');
    }


}

public function buscar() {

    $this->titulo = "Gestión de Alumnos";
    $this->subtitulo = "Busqueda de Alumnos";
    $this->informacion = "En está sección puede buscar a todos los alumnos por su identificación.";

    $this->listaAlumnos = null;

    if (Input::hasPost("nombresF")) {

        $alumnos = new Alumno();
        $nombreAlumno = Input::post("nombresF");
        $sql = "SELECT * from alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula where nombre like '%$nombreAlumno%'";
        $this->listaAlumnos = $alumnos->find_all_by_sql($sql);

        if ($this->listaAlumnos == null) {
            Flash::error('Alumno no encontrado, pruebe nuevamente con otro primer nombre.');
            Input::delete();
        }
    }
}

public function buscar2() {

    $this->titulo = "Gestión de Alumnos";
    $this->subtitulo = "Busqueda de Alumnos";
    $this->informacion = "En está sección puede buscar a todos los alumnos por su identificación y por nombre.";

    $this->listaAlumnos = null;

    if (Input::hasPost("idF")) {

        $alumnos = new Alumno();
        $idAlumno = Input::post("idF");
        $sql = "SELECT * from alumno inner join grado on grado_idGrado=idGrado 
        inner join estado on estado_idEstado=idEstado inner join matricula on 
        matricula_idMatricula=idMatricula where identidadAl = '$idAlumno'";
        $this->listaAlumnos2 = $alumnos->find_all_by_sql($sql);

        if ($this->listaAlumnos2 == null) {
            Flash::error('Alumno no encontrado,asegúrese que digitó bien el documento.');
            Input::delete();
        }
    }
}
public function create_carnet() {

   $this->titulo = "Generadores";
   $this->subtitulo = "Generar Carnets Individuales o por grados";
   $this->informacion = "En está sección puede generar carnets para los alumnos de la institución.";

   $anio = new Anio();
   $this->anio = $anio->getAllAnios();



   $this->anioSel="NO SELECCIONADO";


   if (Input::hasPost('idAnioF')) {

       $this->anioSel=Input::post('idAnioF');

       $_SESSION['idAnio']=Input::post('idAnioF');

       View::select("create_carnet");
   }




}

public function create_informe () {

    $this->titulo = "Generadores";
    $this->subtitulo = "Generar Informe";
    $this->informacion = "En está sección puede generar informes de la institución.";

    View::select('imprimir_informe');

    
}

public function create_informe_final () {

    $this->titulo = "Generadores";
    $this->subtitulo = "Generar Informe Final";
    $this->informacion = "En está sección puede generar planillas finales de todo el año";


}

public function create_planilla () {

    $this->titulo = "Generadores";
    $this->subtitulo = "Generar Planilla";
    $this->informacion = "En está sección puede generar planillas de un curso de la institución.";

    $notap = new Notap();
    $anio = new Anio();
    $periodo = new Periodo();
    $grado = new Grado();

    $this->anio=$anio->getAllAnios();

    if (Input::hasPost('periodoN')) {

        $idYearF=Input::post('idAnioF');
        $periodoF= Input::post('periodoF');
        $gradoF=Input::post('gradoF');


        $this->gradoF=$grado->find($gradoF);

        $anio2= new Anio();
        $this->anio2=$anio2->find_by_sql("SELECT * from anio where idAnio =$idYearF ");

        // GENERADOR DE PLANILLAS PARA PRIMARIA //


        $this->periodo = $periodo->find_by_sql("SELECT * FROM PERIODO where numeroPeriodo=$periodoF 
            AND  anio_idAnio=$idYearF");

        if(intval($gradoF)<6 or intval($gradoF)==13 ){

          $this->cuenta=$notap->find_by_sql("SELECT COUNT(*) as cuenta from notap inner join alumno
  on notap.alumno_idAlumno=alumno.idAlumno inner join materia on 
  notap.materia_idMateria=materia.idMateria inner join logros on 
  materia.idMateria=logros.materia_idMateria inner join matricula on 
  alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join grado on
    alumno.grado_idGrado=grado.idGrado inner join periodo on 
    notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio
     on alumno.idAlumno=promedio.alumno_idAlumno where matricula.anio_idAnio=$idYearF 
     and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$periodoF
      and notap.grado_idGrado=$gradoF and materia.nombreMateria='LENGUA CASTELLANA'
       and logros.periodo_idPeriodo=$periodoF and materia.gradoMateria=$gradoF
       and promedio.periodo_idPeriodo=$periodoF  "); // variable para saber cuantos alumnos hay

          $this->listaNotasM=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,
            nombreMateria,notaFinal,numeroPeriodo,notap.anio_idAnio FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado   
            where alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=$periodoF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF  and estado.tipoEstado='Activo'
          and materia.nombreMateria='MATEMATICAS' order by promedio.valor desc "); // terminadas

          $this->listaNotasL=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
        
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo 
         inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='LENGUA CASTELLANA' order by promedio.valor desc ");

         $this->listaNotasI=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
        
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='INGLES' order by promedio.valor desc ");

          $this->listaNotasS=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='CIENCIAS SOCIALES' order by promedio.valor desc "); 

          $this->listaNotasN=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia       
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='CIENCIAS NATURALES' order by promedio.valor desc ");

         $this->listaNotasA=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='EDUCACION ARTISTICA' order by promedio.valor desc ");

        $this->listaNotasR=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='EDUCACION RELIGIOSA' order by promedio.valor desc ");


         $this->listaNotasF=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='EDUCACION FISICA' order by promedio.valor desc ");

         $this->listaNotasE=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='ETICA Y VALORES' order by promedio.valor desc ");

         $this->listaNotasT=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF
         where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='TECNOLOGIA E INFORMATICA' order by promedio.valor desc ");



          View::select("imprimir_planilla");
      }
      else{

        $this->cuenta=$notap->find_by_sql("SELECT COUNT(*) as cuenta from notap inner join alumno
  on notap.alumno_idAlumno=alumno.idAlumno inner join materia on 
  notap.materia_idMateria=materia.idMateria inner join logros on 
  materia.idMateria=logros.materia_idMateria inner join matricula on 
  alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join grado on
    alumno.grado_idGrado=grado.idGrado inner join periodo on 
    notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio
     on alumno.idAlumno=promedio.alumno_idAlumno where matricula.anio_idAnio=$idYearF 
     and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$periodoF
      and notap.grado_idGrado=$gradoF and materia.nombreMateria='PROYECTO'
       and logros.periodo_idPeriodo=$periodoF and materia.gradoMateria=$gradoF
       and promedio.periodo_idPeriodo=$periodoF  "); // variable para saber cuantos alumnos hay

        /* LISTA DE MATERIAS PARA 6XTO EN ADELANTE */ 


        $this->listaNotasP=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,
            nombreMateria,notaFinal,numeroPeriodo,notap.anio_idAnio FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria inner join estado on
   alumno.estado_idEstado= estado.idEstado   
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno where alumno.grado_idGrado=$gradoF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and promedio.periodo_idPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='PROYECTO' order by promedio.valor desc ");


        $this->listaNotasM=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
             inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF 
            and periodo.numeroPeriodo=$periodoF and promedio.periodo_idPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='MATEMATICAS' order by promedio.valor desc ");

        $this->listaNotasE=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo 
            inner join estado on
   alumno.estado_idEstado= estado.idEstado   
             inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and estado.tipoEstado='Activo'
            and periodo.numeroPeriodo=$periodoF and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='ESPAÑOL' order by promedio.valor desc ");

        $this->listaNotasQ=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF 
            and materia.nombreMateria='QUIMICA' order by promedio.valor desc ");



        $this->listaNotasI=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='INGLES' order by promedio.valor desc ");

        $this->listaNotasEF=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='EDUCACION FISICA' order by promedio.valor desc ");


        $this->listaNotasFilo=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='FILOSOFIA' order by promedio.valor desc ");

        $this->listaNotasA=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='ARTISTICA' order by promedio.valor desc ");

        $this->listaNotasEti=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='ETICA' order by promedio.valor desc ");

        $this->listaNotasEco=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo  inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
             and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='ECONOMIA' order by promedio.valor desc ");

        $this->listaNotasFi=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='FISICA' order by promedio.valor desc ");

        $this->listaNotasR=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='RELIGION' order by promedio.valor desc ");

        $this->listaNotasIn=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado    inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
             and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='INFORMATICA'  order by promedio.valor desc ");




        /* FIN LISTA MATERIAS SECUNDARIA */

        View::select("imprimir_planilla2");

    }

}


}

public function create_certificado () {

    $this->titulo = "Generadores";
    $this->subtitulo = "Generar Certificado";
    $this->informacion = "En está sección puede generar certificados para los alumnos de la institución.";

    if(Input::hasPost('alumno_idAlumno', 'nombreRector', 'jornada', 'motivoCertificado', 'fechaExpedicion', 'observaciones')) {
        $alumno = new Alumno();
        $this->alumno = $alumno->find(Input::post('alumno_idAlumno'));

        $this->nombreRector = Input::post('nombreRector');
        $this->jornada = Input::post('jornada');
        $this->motivoCertificado = Input::post('motivoCertificado');
        $this->fechaExpedicion = Input::post('fechaExpedicion');
        $this->observaciones = Input::post('observaciones');

        View::select("imprimir_certificado");
    }
}


public function create_listas()
{
    $this->titulo = "Matricula";
    $this->subtitulo = "Generar Cuadro de Estado de Matricula";
    $this->informacion = "En está sección puede generar una tabla con el número de estudiantes aprobados, reprobados,trasladados,matrícula inicial, desertores";

    if (Input::hasPost('grado1')) {


        $this->grado = Input::post('grado');
        $this->grado1 = Input::post('grado1');
        if(Input::post('grado1')=='Preescolar'){

         $this->grado1=0;

     }
     View::select("imprimir_listas");
 }

}

public function create_acudientes()
{
    $this->titulo = "Sección de Acudientes";
    $this->subtitulo = "Generar Lista de Acudientes";
    $this->informacion = "En está sección puede generar una lista con el número de acudientes";

    View::select("imprimir_acudientes");

}






    //Función encargada de redireccionar a la vista que se considere por defecto al presionar el botón atras.
public function atras () {
    Redirect::to('inicio/index');
}

}