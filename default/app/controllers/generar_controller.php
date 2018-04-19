<?php

View::template('sbadmin');
session_start();

class GenerarController extends AppController {


    public function cargarCarnetsGrados(){

     if (Input::hasPost('limite')) {

        $this->limite=Input::post('limite');
        $this->nombreR=Input::post('rectorNameF');
        $this->start= $_SESSION['globalYear'];
        $this->end = intval($_SESSION['globalYear']) +1;

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

  $sedeGlobal = $_SESSION['globalSede'];
  $globalYear = $_SESSION['globalYear'];


    $id=$_SESSION['idAnio'];

    $this->anio = $anio->find($id);



    if (Input::hasPost('gradoN')) {



        $gradoAlumno=Input::post('gradoF');
        $anioMat=Input::post('idAnio2');

        $sql = "SELECT * from alumno inner join grado on grado_idGrado=idGrado inner join
         estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula
          where estado.tipoEstado='Activo'and grado.idGrado=$gradoAlumno and matricula.anio_idAnio=$globalYear  and alumno.sede ='$sedeGlobal' ";

        $sql2 = "SELECT COUNT(*) as cuenta from alumno inner join grado on grado_idGrado=idGrado 
        inner join estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula
         where estado.tipoEstado='Activo'and grado.idGrado=$gradoAlumno and matricula.anio_idAnio=$globalYear  and alumno.sede ='$sedeGlobal' ";

        $this->listaAlumnos = $alumno->find_all_by_sql($sql);
        $this->number=$alumno->find_by_sql($sql2);



        View::select('recibirDatos');

    }else{


        
    }


}

public function buscar() {

    $this->titulo = "Gestión de Alumnos";
    $this->subtitulo = "Busqueda de Alumnos";
    $this->informacion = "En está sección puede buscar a todos los alumnos por su identificación.";

    $this->listaAlumnos = null;

    $sedeGlobal = $_SESSION['globalSede'];
    $globalYear = $_SESSION['globalYear'];

    if (Input::hasPost("nombresF")) {

        $alumnos = new Alumno();
        $nombreAlumno = Input::post("nombresF");
        $sql = "SELECT * from alumno inner join grado on grado_idGrado=idGrado inner join
         estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula
          where nombre like '%$nombreAlumno%'  and matricula.anio_idAnio=$globalYear  
                        and alumno.sede ='$sedeGlobal' ";
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
     $sedeGlobal = $_SESSION['globalSede'];
  $globalYear = $_SESSION['globalYear'];

    if (Input::hasPost("idF")) {

        $alumnos = new Alumno();
        $idAlumno = Input::post("idF");
        $sql = "SELECT * from alumno inner join grado on grado_idGrado=idGrado 
        inner join estado on estado_idEstado=idEstado inner join matricula on 
        matricula_idMatricula=idMatricula where identidadAl = '$idAlumno'  and matricula.anio_idAnio=$globalYear  
                        and alumno.sede ='$sedeGlobal'";
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


       $this->anioSel=$_SESSION['globalYear'];

       $_SESSION['idAnio']=$_SESSION['globalYear'];



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

        $idYearF=$_SESSION['globalYear'];
        $periodoF= Input::post('periodoF');
        $gradoF=intval(Input::post('gradoF'));


        $this->gradoF=$grado->find($gradoF);
        $sedeGlobal = $_SESSION['globalSede'];

        $anio2= new Anio();
        $this->anio2=$anio2->find_by_sql("SELECT * from anio where idAnio =$idYearF ");

        // GENERADOR DE PLANILLAS PARA PRIMARIA //

        


        $this->periodo = $periodo->find_by_sql("SELECT * FROM PERIODO where numeroPeriodo=$periodoF 
            AND  anio_idAnio=$idYearF");

        if($gradoF<6){

            $this->cuenta=$notap->find_by_sql("SELECT COUNT(*) as cuenta from notap inner join alumno
                    on notap.alumno_idAlumno=alumno.idAlumno inner join materia on 
                    notap.materia_idMateria=materia.idMateria  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
                    alumno.estado_idEstado= estado.idEstado inner join grado on
                        alumno.grado_idGrado=grado.idGrado inner join periodo on 
                        notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio
                        on alumno.idAlumno=promedio.alumno_idAlumno where matricula.anio_idAnio=$idYearF 
                        and notap.anio_idAnio = $idYearF
                        and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$periodoF
                        and notap.grado_idGrado=$gradoF and materia.nombreMateria='LENGUA CASTELLANA'
                         and materia.gradoMateria=$gradoF
                        and promedio.periodo_idPeriodo=$periodoF  and alumno.sede ='$sedeGlobal' and promedio.anio_idAnio = $idYearF "); // variable para saber cuantos alumnos hay

          $this->listaNotasM=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,
            nombreMateria,notaFinal,numeroPeriodo,notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
            where  matricula.anio_idAnio=$idYearF and alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=$periodoF
            and notap.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF  and estado.tipoEstado='Activo'
          and materia.nombreMateria='MATEMATICAS'  and alumno.sede ='$sedeGlobal' and promedio.anio_idAnio = $idYearF  order by promedio.valor desc "); // terminadas

          $this->listaNotasL=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
        
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo 
         inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='LENGUA CASTELLANA' and promedio.anio_idAnio = $idYearF   and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

         $this->listaNotasI=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
        
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='INGLES' and promedio.anio_idAnio = $idYearF  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

          $this->listaNotasS=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF  and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='CIENCIAS SOCIALES'   and alumno.sede ='$sedeGlobal' order by promedio.valor desc "); 

          $this->listaNotasN=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia       
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF  and promedio.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='CIENCIAS NATURALES' and promedio.anio_idAnio = $idYearF   and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

         $this->listaNotasA=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula   
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and promedio.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF  and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='EDUCACION ARTISTICA'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

        $this->listaNotasR=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula   
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and promedio.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='EDUCACION RELIGIOSA'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");


         $this->listaNotasF=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula     
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and promedio.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='EDUCACION FISICA'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

         $this->listaNotasE=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula    
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and promedio.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='ETICA Y VALORES'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

         $this->listaNotasT=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
        notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
         on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado   
          inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
         where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and promedio.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
         and materia.nombreMateria='TECNOLOGIA E INFORMATICA'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");



          View::select("imprimir_planilla");
      }elseif( $gradoF==13 ){

                    $this->cuenta=$notap->find_by_sql("SELECT COUNT(*) as cuenta from notap inner join alumno
                    on notap.alumno_idAlumno=alumno.idAlumno inner join materia on 
                    notap.materia_idMateria=materia.idMateria inner join logros on 
                    materia.idMateria=logros.materia_idMateria inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
                    alumno.estado_idEstado= estado.idEstado inner join grado on
                        alumno.grado_idGrado=grado.idGrado inner join periodo on 
                        notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio
                        on alumno.idAlumno=promedio.alumno_idAlumno where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF
                        and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$periodoF
                        and notap.grado_idGrado=$gradoF and materia.nombreMateria='CORPORAL'
                        and logros.periodo_idPeriodo=$periodoF and materia.gradoMateria=$gradoF and promedio.anio_idAnio = $idYearF
                        and promedio.periodo_idPeriodo=$periodoF  and alumno.sede ='$sedeGlobal' "); // variable para saber cuantos alumnos hay

            $this->listaNotasCor=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,
            nombreMateria,notaFinal,numeroPeriodo,notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
            alumno.estado_idEstado= estado.idEstado  inner  join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF and promedio.periodo_idPeriodo=$periodoF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF  and estado.tipoEstado='Activo'
            and materia.nombreMateria='CORPORAL'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc "); // terminadas

            $this->listaNotasCom=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 

            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo 
            inner join estado on
            alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula
            inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF and promedio.anio_idAnio = $idYearF
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='COMUNICATIVA'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

            $this->listaNotasCog=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 

            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
            alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula
            inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF and promedio.anio_idAnio = $idYearF
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='COGNITIVA' and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

            $this->listaNotasEti=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
            alumno.estado_idEstado= estado.idEstado inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
            inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF and promedio.anio_idAnio = $idYearF
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='ETICA Y VALORES'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc "); 

            $this->listaNotasEste=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia       
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
            alumno.estado_idEstado= estado.idEstado  join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula 
            inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF and promedio.anio_idAnio = $idYearF
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='ESTETICA'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

            $this->listaNotasSoc=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
            alumno.estado_idEstado= estado.idEstado inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
            inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF and promedio.anio_idAnio = $idYearF
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='SOCIOAFECTIVA'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");


            $this->listaNotasEspi=$notap->find_all_by_sql("SELECT nombre,apellido,idAlumno,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,valor,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia 
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
            alumno.estado_idEstado= estado.idEstado inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  
            inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno  and promedio.periodo_idPeriodo=$periodoF and promedio.anio_idAnio = $idYearF
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='ESPIRITUAL'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

            View::select("imprimir_planilla3");

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
     on alumno.idAlumno=promedio.alumno_idAlumno where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF
     and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$periodoF and  alumno.grado_idGrado=$gradoF
      and notap.grado_idGrado=$gradoF and materia.nombreMateria='PROYECTO' and promedio.anio_idAnio = $idYearF
       and logros.periodo_idPeriodo=$periodoF and materia.gradoMateria=$gradoF  and alumno.sede ='$sedeGlobal'
       and promedio.periodo_idPeriodo=$periodoF  "); // variable para saber cuantos alumnos hay

        /* LISTA DE MATERIAS PARA 6XTO EN ADELANTE */ 


        $this->listaNotasP=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,
            nombreMateria,notaFinal,numeroPeriodo,notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno where
            matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and   alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and promedio.periodo_idPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='PROYECTO'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");


        $this->listaNotasM=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula
             inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and promedio.anio_idAnio = $idYearF
            and periodo.numeroPeriodo=$periodoF and promedio.periodo_idPeriodo=$periodoF and estado.tipoEstado='Activo'
            and materia.nombreMateria='MATEMATICAS'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

        $this->listaNotasE=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo 
            inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula
             inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF  and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and estado.tipoEstado='Activo'
            and periodo.numeroPeriodo=$periodoF and promedio.periodo_idPeriodo=$periodoF
            and materia.nombreMateria='ESPAÑOL'  and alumno.sede ='$sedeGlobal' order by promedio.valor desc ");

        $this->listaNotasQ=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF  and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='QUIMICA' order by promedio.valor desc ");



        $this->listaNotasI=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
             and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF  and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='INGLES' order by promedio.valor desc ");

        $this->listaNotasEF=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado inner  join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
            where matricula.anio_idAnio=$idYearF and  alumno.grado_idGrado=$gradoF and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF  and notap.anio_idAnio = $idYearF and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='EDUCACION FISICA' order by promedio.valor desc ");


        $this->listaNotasFilo=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF  and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='FILOSOFIA' order by promedio.valor desc ");

        $this->listaNotasA=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='ARTISTICA' order by promedio.valor desc ");

        $this->listaNotasEti=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='ETICA' order by promedio.valor desc ");

        $this->listaNotasEco=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo  inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
             and promedio.periodo_idPeriodo=$periodoF and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='ECONOMIA' order by promedio.valor desc ");

        $this->listaNotasFi=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='FISICA' order by promedio.valor desc ");

        $this->listaNotasR=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
            and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
            and promedio.periodo_idPeriodo=$periodoF and alumno.sede ='$sedeGlobal'
            and materia.nombreMateria='RELIGION' order by promedio.valor desc ");

        $this->listaNotasIn=$notap->find_all_by_sql("SELECT nombre,apellido,identidadAl,faltas,nombreMateria,notaFinal,numeroPeriodo,
            notap.anio_idAnio,matricula.anio_idAnio FROM alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno inner join materia
            on notap.materia_idMateria=materia.idMateria inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado on
   alumno.estado_idEstado= estado.idEstado  inner join matricula on 
                    alumno.matricula_idMatricula=matricula.idMatricula  inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
            where matricula.anio_idAnio=$idYearF and notap.anio_idAnio = $idYearF and  alumno.grado_idGrado=$gradoF and promedio.anio_idAnio = $idYearF
             and notap.anio_idAnio=$idYearF and periodo.numeroPeriodo=$periodoF and estado.tipoEstado='Activo'
             and promedio.periodo_idPeriodo=$periodoF and alumno.sede ='$sedeGlobal'
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