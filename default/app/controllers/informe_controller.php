<?php
View::template('sbadmin');
session_start();
class InformeController extends AppController
{

  
    public function ultimo()


    {

      
       $this->titulo      = "Gestión de Infomes";
        $this->subtitulo   = "Informes Final";
        $this->informacion = "Por favor, seleccione el grado y la materia para la cual quiere generar la tabla.";

      
       
        $notap             = new Notap();
        $anioGlobal        = $_SESSION['globalYear'];
        $sedeGlobal       = $_SESSION['globalSede'];

        if (Input::hasPost('gradoFinal')) {
            $gradoF         = intval(Input::post('gradoFinal'));
            $this->gradoSel = $gradoF;
            $this->anioG    = $anioGlobal;

            if ($gradoF < 6) {
                /**************************** PRIMER PERIODO [inicio]*******************/
                $this->cuenta       = $notap->find_by_sql("SELECT COUNT(*) as cuenta FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=1
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1  and estado.tipoEstado='Activo'
          and materia.nombreMateria='LENGUA CASTELLANA' and notap.materia_idMateria=promedioanual.materia_idMateria  and matricula.anio_idAnio=$anioGlobal 
          and alumno.sede= '$sedeGlobal' 
           order by promedioanual.valor DESC  ");

                $this->listaNotasM1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                $this->listaNotasL1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasI1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasS1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** PRIMER PERIODO [FIN] *******************/
                /**************************** SEGUNDO PERIODO [inicio]*******************/
                $this->listaNotasM2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasL2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasS2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasF2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** SEGUNDO PERIODO [FIN] *******************/
                /**************************** TERCER PERIODO [INICIO] *******************/
                $this->listaNotasM3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasL3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasI3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasS3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasF3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** TERCER PERIODO [FIN] *******************/
                /**************************** CUARTO PERIODO [inicio]*******************/
                $this->listaNotasM4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasL4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasI4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasS4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasF4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** CUARTO PERIODO [FIN] ***************************************************************************/
                View::select("informe_final2");


            }//////////////////////////// ** FIN SELECTOR PARA PRIMARIA **************************** //
            


            //////////////////////////////** SELECTOR PARA PREESCOLAR********************************* */
            elseif($gradoF == 13){
                      /**************************** PRIMER PERIODO [inicio]*******************/
                $this->cuenta       = $notap->find_by_sql("SELECT COUNT(*) as cuenta FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=1
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1  and estado.tipoEstado='Activo'
              and materia.nombreMateria='CORPORAL' and notap.materia_idMateria=promedioanual.materia_idMateria  and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
               order by promedioanual.valor DESC  ");
    
                    $this->listaNotasCor1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
              and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                    $this->listaNotasCom1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
              and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                    $this->listaNotasCog1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
              and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                    $this->listaNotasEti1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
              and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                    $this->listaNotasEst1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
              and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                    $this->listaNotasSoc1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
              and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                    $this->listaNotasEsp1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
       alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'
              and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

            
                    /**************************** PRIMER PERIODO [FIN] *******************/
                    /**************************** SEGUNDO PERIODO [inicio]*******************/
                    $this->listaNotasCor2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
        
                        $this->listaNotasCom2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasCog2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
    
                        $this->listaNotasEti2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasEst2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
    
                        $this->listaNotasSoc2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasEsp2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                    /**************************** SEGUNDO PERIODO [FIN] *******************/
                    /**************************** TERCER PERIODO [INICIO] *******************/
                    $this->listaNotasCor3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
        
                        $this->listaNotasCom3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasCog3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
    
                        $this->listaNotasEti3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasEst3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
    
                        $this->listaNotasSoc3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasEsp3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                    /**************************** TERCER PERIODO [FIN] *******************/
                    /**************************** CUARTO PERIODO [inicio]*******************/
                    $this->listaNotasCor4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
        
                        $this->listaNotasCom4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasCog4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
    
                        $this->listaNotasEti4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasEst4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
    
                        $this->listaNotasSoc4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
    
                        $this->listaNotasEsp4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                    on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                    inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                    on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
           alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                    where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal and alumno.sede= '$sedeGlobal' 
                    and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                  and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                    /**************************** CUARTO PERIODO [FIN] ***************************************************************************/


                View::select("informe_final3");
            }
            // FIN PREESCOLAR - INICIO INFORMES PARA SECUNDARIA***************************************///


            else {
                /**************************** PRIMER PERIODO [inicio]*******************/
                $this->cuenta         = $notap->find_by_sql("SELECT COUNT(*) as cuenta FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=1
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1  and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='PROYECTO' and notap.materia_idMateria=promedioanual.materia_idMateria and matricula.anio_idAnio=$anioGlobal
           order by promedioanual.valor DESC  ");
                $this->listaNotasP1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasM1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasES1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** PRIMER PERIODO [FIN] *******************/
                /**************************** SEGUNDO PERIODO [inicio]*******************/
                $this->listaNotasP2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasM2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasES2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** SEGUNDO PERIODO [FIN] *******************/
                /**************************** TERCER PERIODO [INICIO] *******************/
                $this->listaNotasP3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasM3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasES3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** TERCER PERIODO [FIN] *******************/
                /**************************** CUARTO PERIODO [inicio]*******************/
                $this->listaNotasP4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasM4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasES4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioGlobal
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo' and alumno.sede= '$sedeGlobal' 
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** PRIMER PERIODO [FIN] *******************/
                /**************************** CUARTO PERIODO [FIN] *******************/
                View::select("informe_final1");
            }
        }

        
    } // end ultimoInforme function
    public function index() // funcion optimizada para gloabl sede y globalYear // Aqui se filtran los informes completos
    {
        $this->titulo      = "Gestión de Infomes";
        $this->subtitulo   = "Informes por Materias";
        $this->informacion = "Por favor, seleccione el grado y la materia para la cual quiere generar la tabla.";
        $anio              = new Anio();
        $this->anio        = $anio->getAllAnios();
        if (Input::hasPost('formulario1')) {
            /* Recopilar los datos del formulario para planilla con datos llenos*/
            // TO DO , filtrar por grados, diseñar otro informe para sexto en adelante, cambiar selectores de cuenta para eso, estilo planilla.
            $anioRe           = $_SESSION['globalYear'];
            $sedeGlobal       = $_SESSION['globalSede'];
            $gradoRe          = Input::post('gradoA');
            $nombreMateriaRe  = Input::post('materiaA');
            $periodoRe        = Input::post('periodoA');
            $anio             = new Anio();
            $this->anio       = $anio->find($anioRe);
            $grado            = new Grado();
            $this->grado      = $grado->find($gradoRe);
            $this->periodoSel = $periodoRe;
            $materia          = new Materia();
            $this->materia    = $materia->find_by_sql("SELECT * from materia where nombreMateria='$nombreMateriaRe' and 
          gradoMateria=$gradoRe");
            $m2               = $materia->find_by_sql("SELECT * from materia where nombreMateria='$nombreMateriaRe' and 
          gradoMateria=$gradoRe");
            $profesor         = new Profesor();
            $this->profesor   = $profesor->find($m2->profesor_idPro);
            $alumno           = new Alumno();
            $this->periodo    = $periodoRe;
            if ($gradoRe < 6 or $gradoRe == 13) {
                $sql                = "SELECT * from alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno 
                inner join grado on alumno.grado_idGrado = grado.idGrado inner join materia on materia.idMateria = notap.materia_idMateria
                inner join periodo on notap.periodo_idPeriodo = periodo.idPeriodo inner join estado on alumno.estado_idEstado = estado.idEstado
                inner join promedio on alumno.idAlumno = promedio.alumno_idAlumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula
                and notap.anio_idAnio = $anioRe  and grado.idGrado = $gradoRe and materia.nombreMateria= '$nombreMateriaRe' 
                and periodo.numeroPeriodo  = $periodoRe and estado.tipoEstado = 'Activo'
                and alumno.sede = '$sedeGlobal' and promedio.anio_idAnio=$anioRe  and materia.gradoMateria= $gradoRe and promedio.periodo_idPeriodo = $periodoRe and
                 matricula.anio_idAnio = $anioRe order by promedio.valor desc";
                // cambiar order by promedio.valor para puestos
                // hacer 2 tipos de informes, para secundaria también
                $this->listaAlumnos = $alumno->find_all_by_sql($sql);
                $sqlCuenta          = "SELECT COUNT(*) as cuenta from alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno 
                inner join grado on alumno.grado_idGrado = grado.idGrado inner join materia on materia.idMateria = notap.materia_idMateria
                inner join periodo on notap.periodo_idPeriodo = periodo.idPeriodo inner join estado on alumno.estado_idEstado = estado.idEstado
                inner join promedio on alumno.idAlumno = promedio.alumno_idAlumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula
                and notap.anio_idAnio = $anioRe  and grado.idGrado = $gradoRe and materia.nombreMateria= '$nombreMateriaRe' 
                and periodo.numeroPeriodo  = $periodoRe and estado.tipoEstado = 'Activo'
                and alumno.sede = '$sedeGlobal' and promedio.anio_idAnio=$anioRe  and materia.gradoMateria= $gradoRe and promedio.periodo_idPeriodo = $periodoRe and
                 matricula.anio_idAnio = $anioRe order by promedio.valor desc ";
                $this->cuenta       = $alumno->find_by_sql($sqlCuenta);
                View::select('informe_lleno1');
            } else {
                $sql                = "SELECT * from notap inner join alumno
                                    on notap.alumno_idAlumno=alumno.idAlumno inner join materia on 
                                    notap.materia_idMateria=materia.idMateria inner join logros on 
                                    materia.idMateria=logros.materia_idMateria inner join matricula on 
                                    alumno.matricula_idMatricula=matricula.idMatricula inner join estado on
                                    alumno.estado_idEstado= estado.idEstado inner join grado on
                                    alumno.grado_idGrado=grado.idGrado inner join periodo on 
                                    notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio
                                    on alumno.idAlumno=promedio.alumno_idAlumno where matricula.anio_idAnio=$anioRe and notap.anio_idAnio = $anioRe
                                    and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$periodoRe
                                          and notap.grado_idGrado=$gradoRe and materia.nombreMateria='$nombreMateriaRe'
                                          and logros.periodo_idPeriodo=$periodoRe and materia.gradoMateria=$gradoRe
                                          and promedio.periodo_idPeriodo=$periodoRe order by alumno.nombre asc";
                // cambiar order by promedio.valor para puestos
                // hacer 2 tipos de informes, para secundaria también
                $this->listaAlumnos = $alumno->find_all_by_sql($sql);
                $sqlCuenta          = "SELECT COUNT(*) as cuenta from alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno 
                inner join grado on alumno.grado_idGrado = grado.idGrado inner join materia on materia.idMateria = notap.materia_idMateria
                inner join periodo on notap.periodo_idPeriodo = periodo.idPeriodo inner join estado on alumno.estado_idEstado = estado.idEstado
                inner join promedio on alumno.idAlumno = promedio.alumno_idAlumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula
                and notap.anio_idAnio = $anioRe  and grado.idGrado = $gradoRe and materia.nombreMateria= '$nombreMateriaRe' 
                and periodo.numeroPeriodo  = $periodoRe and estado.tipoEstado = 'Activo'
                and alumno.sede = '$sedeGlobal' and promedio.anio_idAnio=$anioRe  and materia.gradoMateria= $gradoRe and promedio.periodo_idPeriodo = $periodoRe and
                 matricula.anio_idAnio = $anioRe order by promedio.valor desc";
                $this->cuenta       = $alumno->find_by_sql($sqlCuenta);
                View::select('informe_lleno2');
            }
        }
    }
    public function vacia() // optimizada con sede y anio
    {

       if (Input::hasPost('periodoB')) {
            /* Recopilar los datos del formulario para planilla con datos llenos*/
            // TO DO , filtrar por grados, diseñar otro informe para sexto en adelante, cambiar selectores de cuenta para eso, estilo planilla.
            $anioRe           = $_SESSION['globalYear'];
            $sedeGlobal       = $_SESSION['globalSede'];
            $gradoRe          = Input::post('gradoB');
            $nombreMateriaRe  = Input::post('materiaB');
            $periodoRe        = Input::post('periodoB');
            $anio             = new Anio();
            $this->anio       = $anio->find($anioRe);
            $grado            = new Grado();
            $this->grado      = $grado->find($gradoRe);
            $this->periodoSel = $periodoRe;
            $materia          = new Materia();
            $this->materia    = $materia->find_by_sql("SELECT * from materia where nombreMateria='$nombreMateriaRe' and 
          gradoMateria=$gradoRe");
            $m2               = $materia->find_by_sql("SELECT * from materia where nombreMateria='$nombreMateriaRe' and 
          gradoMateria=$gradoRe");
            $profesor         = new Profesor();
            $this->profesor   = $profesor->find($m2->profesor_idPro);
            $alumno           = new Alumno();
            $this->periodo    = $periodoRe;
            if ($gradoRe < 6 or $gradoRe == 13) {
                $sql                = "SELECT * from alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno 
                inner join grado on alumno.grado_idGrado = grado.idGrado inner join materia on materia.idMateria = notap.materia_idMateria
                inner join periodo on notap.periodo_idPeriodo = periodo.idPeriodo inner join estado on alumno.estado_idEstado = estado.idEstado
                inner join promedio on alumno.idAlumno = promedio.alumno_idAlumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula
                and notap.anio_idAnio = $anioRe  and grado.idGrado = $gradoRe and materia.nombreMateria= '$nombreMateriaRe' 
                and periodo.numeroPeriodo  = $periodoRe and estado.tipoEstado = 'Activo'
                and alumno.sede = '$sedeGlobal' and promedio.anio_idAnio=$anioRe  and materia.gradoMateria= $gradoRe and promedio.periodo_idPeriodo = $periodoRe and
                 matricula.anio_idAnio = $anioRe order by alumno.nombre asc";
                // cambiar order by promedio.valor para puestos
                // hacer 2 tipos de informes, para secundaria también
                $this->listaAlumnos = $alumno->find_all_by_sql($sql);
                $sqlCuenta          = "SELECT COUNT(*) as cuenta from alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno 
                inner join grado on alumno.grado_idGrado = grado.idGrado inner join materia on materia.idMateria = notap.materia_idMateria
                inner join periodo on notap.periodo_idPeriodo = periodo.idPeriodo inner join estado on alumno.estado_idEstado = estado.idEstado
                inner join promedio on alumno.idAlumno = promedio.alumno_idAlumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula
                and notap.anio_idAnio = $anioRe  and grado.idGrado = $gradoRe and materia.nombreMateria= '$nombreMateriaRe' 
                and periodo.numeroPeriodo  = $periodoRe and estado.tipoEstado = 'Activo'
                and alumno.sede = '$sedeGlobal' and promedio.anio_idAnio=$anioRe  and materia.gradoMateria= $gradoRe and promedio.periodo_idPeriodo = $periodoRe and
                 matricula.anio_idAnio = $anioRe order by alumno.nombre asc ";
                $this->cuenta       = $alumno->find_by_sql($sqlCuenta);
                View::select('informe_vacio');
            } else {
                $sql                = "SELECT * from alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno 
                inner join grado on alumno.grado_idGrado = grado.idGrado inner join materia on materia.idMateria = notap.materia_idMateria
                inner join periodo on notap.periodo_idPeriodo = periodo.idPeriodo inner join estado on alumno.estado_idEstado = estado.idEstado
                inner join promedio on alumno.idAlumno = promedio.alumno_idAlumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula
                and notap.anio_idAnio = $anioRe  and grado.idGrado = $gradoRe and materia.nombreMateria= '$nombreMateriaRe' 
                and periodo.numeroPeriodo  = $periodoRe and estado.tipoEstado = 'Activo'
                and alumno.sede = '$sedeGlobal' and promedio.anio_idAnio=$anioRe  and materia.gradoMateria= $gradoRe and promedio.periodo_idPeriodo = $periodoRe and
                 matricula.anio_idAnio = $anioRe order by alumno.nombre asc";
                // cambiar order by promedio.valor para puestos
                // hacer 2 tipos de informes, para secundaria también
                $this->listaAlumnos = $alumno->find_all_by_sql($sql);
                $sqlCuenta          = "SELECT COUNT(*) as from alumno inner join notap on alumno.idAlumno = notap.alumno_idAlumno 
                inner join grado on alumno.grado_idGrado = grado.idGrado inner join materia on materia.idMateria = notap.materia_idMateria
                inner join periodo on notap.periodo_idPeriodo = periodo.idPeriodo inner join estado on alumno.estado_idEstado = estado.idEstado
                inner join promedio on alumno.idAlumno = promedio.alumno_idAlumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula
                and notap.anio_idAnio = $anioRe  and grado.idGrado = $gradoRe and materia.nombreMateria= '$nombreMateriaRe' 
                and periodo.numeroPeriodo  = $periodoRe and estado.tipoEstado = 'Activo'
                and alumno.sede = '$sedeGlobal' and promedio.anio_idAnio=$anioRe  and materia.gradoMateria= $gradoRe and promedio.periodo_idPeriodo = $periodoRe and
                 matricula.anio_idAnio = $anioRe order by alumno.nombre asc    ";
                $this->cuenta       = $alumno->find_by_sql($sqlCuenta);
                View::select('informe_vacio2');
            }
        }

    }
} // Fin Controlador Informes
?>