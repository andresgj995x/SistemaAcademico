<?php

View::template('sbadmin');
session_start();

class BoletinController extends AppController {

    public function index() {

        $this->titulo = "Gestión de Boletines";
        $this->subtitulo = "Seleccione, visualice e imprima.";
        $this->informacion = "Por favor escoger el año lectivo presente, para la correcta generación de boletines.";

        $anio = new Anio();
        $notap = new Notap();
        $periodo = new Periodo();
        $grado = new Grado();

        $this->anio = $anio->getAllAnios();
        $this->anioSel = "NO SELECCIONADO";

        if (Input::hasPost('idAnioF')) {

            $this->anioSel = Input::post('idAnioF');

            $_SESSION['idAnio'] = Input::post('idAnioF');

            View::select("index");
        }
    }

    /* End index */

    public function listar() {

        $this->titulo = "Gestión de Boletines";
        $this->subtitulo = "Aquí se listan los estudiantes según el grado escogido.";
        $this->informacion = "Por favor escoger el año lectivo presente, para la correcta generación de boletines.";

        $alumno = new Alumno();
        $anio = new Anio();
        $periodo = new Periodo();
        $notap= new Notap();


        $id = $_SESSION['idAnio'];

        $this->anio = $anio->find($id);
        $profesor = new Profesor();
        $this->profesor = $profesor->getAllProfesores();


        if (Input::hasPost('gradoN')) {



            $gradoAlumno = Input::post('gradoF');
            $anioMat = Input::post('idAnio2');
            $numeroPeriodo = Input::post('periodoA');

            $_SESSION['p']=$numeroPeriodo;
            $_SESSION['grado']=$gradoAlumno;

 if (intval($gradoAlumno)<6 or intval($gradoAlumno)==13)  {

            $sql = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='MATEMATICAS'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";} // En estas 2 sql guardo la lista de alumnos

                 else{

 $sql = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
              where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and materia.nombreMateria='PROYECTO'
               and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno
                and promedio.periodo_idPeriodo=$numeroPeriodo
                order by promedio.valor desc";

                 }

if (intval($gradoAlumno)<6 or intval($gradoAlumno)==13) {
    
            $sql2 = "SELECT COUNT(*) as cuenta from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='LENGUA CASTELLANA'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";
}else{

 $sql2 = "SELECT COUNT(*) as cuenta from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno 
              where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and materia.nombreMateria='PROYECTO'
               and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno
                and promedio.periodo_idPeriodo=$numeroPeriodo
                order by promedio.valor desc ";

}


            $this->listaAlumnos = $alumno->find_all_by_sql($sql); //ya está cargando sus notas

            $this->number = $alumno->find_by_sql($sql2);

            $_SESSION['grupoBoletinM']=$alumno->find_all_by_sql($sql); // Aquí guardo los alumnos


            // LISTAS PARA MATERIAS DE PRIMARIA ******************

 $sqlL = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='LENGUA CASTELLANA'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc"; // comenzar aquí

 $_SESSION['listaL'] = $notap->find_all_by_sql($sqlL);

  $sqlI = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='INGLES'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

 $_SESSION['listaI'] = $notap->find_all_by_sql($sqlI);

  $sqlS = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='CIENCIAS SOCIALES'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";
 $_SESSION['listaS'] = $notap->find_all_by_sql($sqlS);


   $sqlN = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='CIENCIAS NATURALES'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

 $_SESSION['listaN']= $notap->find_all_by_sql($sqlN);


  $sqlA = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='EDUCACION ARTISTICA'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";
 $_SESSION['listaA']= $notap->find_all_by_sql($sqlA);


  $sqlR = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='EDUCACION RELIGIOSA'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";
 $_SESSION['listaR'] = $notap->find_all_by_sql($sqlR);


 $sqlF = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='EDUCACION FISICA'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";
 $_SESSION['listaF'] = $notap->find_all_by_sql($sqlF);


  $sqlE = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='ETICA Y VALORES'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";
 $_SESSION['listaE'] = $notap->find_all_by_sql($sqlE); // estas consultas traen las notas ordenadas 


 $sqlT = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno
             inner join materia on notap.materia_idMateria=materia.idMateria inner join
              logros on materia.idMateria=logros.materia_idMateria inner join matricula 
              on alumno.matricula_idMatricula=matricula.idMatricula inner join estado 
              on alumno.estado_idEstado= estado.idEstado inner join grado on 
              alumno.grado_idGrado=grado.idGrado inner join periodo on 
              notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
               where matricula.anio_idAnio=$anioMat
               and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo 
               and notap.grado_idGrado=$gradoAlumno and  materia.nombreMateria='TECNOLOGIA E INFORMATICA'
                 and logros.periodo_idPeriodo=$numeroPeriodo and materia.gradoMateria=$gradoAlumno 
                 and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";
 $_SESSION['listaT']= $notap->find_all_by_sql($sqlT);


 //Ahora traigamos los logros por materia

$logros = new Logros();

// ******************************* LOGROS SECUNDARIA ********************************//

$_SESSION['logroM']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='MATEMATICAS' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroL']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='LENGUA CASTELLANA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroI']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='INGLES' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroS']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='CIENCIAS SOCIALES' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroN']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='CIENCIAS NATURALES' and materia.gradoMateria=$gradoAlumno ");


$_SESSION['logroA']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='EDUCACION ARTISTICA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroR']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='EDUCACION RELIGIOSA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroF']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='EDUCACION FISICA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroE']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='ETICA Y VALORES' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroT']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='TECNOLOGIA E INFORMATICA' and materia.gradoMateria=$gradoAlumno ");




/*FIN LOGROS MATERIAS PRIMARIA */


// ******************************* LOGROS SECUNDARIA ********************************//

$_SESSION['logroPro']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='PROYECTO' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroMate']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='MATEMATICAS' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroEsp']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='ESPAÑOL' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroQui']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='QUIMICA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroIng']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='INGLES' and materia.gradoMateria=$gradoAlumno ");


$_SESSION['logroEdu']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='EDUCACION FISICA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroFilo']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='FILOSOFIA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroArt']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='ARTISTICA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroEtica']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='ETICA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroEco']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='ECONOMIA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroFisi']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='FISICA' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroReli']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='RELIGION' and materia.gradoMateria=$gradoAlumno ");

$_SESSION['logroInfo']= $logros->find_by_sql("SELECT fortaleza,debilidad from logros inner join materia 
    on materia_idMateria=idMateria  where logros.periodo_idPeriodo=$numeroPeriodo 
    and materia.nombreMateria='INFORMATICA' and materia.gradoMateria=$gradoAlumno ");


/*FIN LOGROS MATERIAS SECUNDARIA */

            /***************************** LISTA DE MATERIAS 2 SECUNDARIA 6-11 **************************/

  $sqlPro = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='PROYECTO' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaPro'] = $notap->find_all_by_sql($sqlPro);

       $sqlMate = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='MATEMATICAS' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaMate'] = $notap->find_all_by_sql($sqlMate);

            $sqlEsp = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='ESPAÑOL' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";


            $_SESSION['listaEsp'] = $notap->find_all_by_sql($sqlEsp);


         $sqlQui = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='QUIMICA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaQui']= $notap->find_all_by_sql($sqlQui);


           $sqlIng = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='INGLES' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaIng']= $notap->find_all_by_sql($sqlIng);


            $sqlEdu = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='EDUCACION FISICA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaEdu'] = $notap->find_all_by_sql($sqlEdu);


         $sqlFilo = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='FILOSOFIA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaFilo'] = $notap->find_all_by_sql($sqlFilo);


           $sqlArt = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='ARTISTICA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaArt'] = $notap->find_all_by_sql($sqlArt);


           $sqlEtica = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='ETICA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaEtica'] = $notap->find_all_by_sql($sqlEtica);


            $sqlEco = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='ECONOMIA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaEco']= $notap->find_all_by_sql($sqlEco);


           $sqlFisi = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='FISICA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaFisi'] = $notap->find_all_by_sql($sqlFisi);

 $sqlReli = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='RELIGION' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaReli'] = $notap->find_all_by_sql($sqlReli);


     $sqlInfo = "SELECT * from notap inner join alumno on notap.alumno_idAlumno=alumno.idAlumno 
            inner join materia on notap.materia_idMateria=materia.idMateria inner join logros
            on materia.idMateria=logros.materia_idMateria inner join matricula 
            on alumno.matricula_idMatricula=matricula.idMatricula inner join estado
            on alumno.estado_idEstado= estado.idEstado inner join grado on 
            alumno.grado_idGrado=grado.idGrado inner join periodo on 
            notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio on alumno.idAlumno=promedio.alumno_idAlumno
             where matricula.anio_idAnio=$anioMat 
            and estado.tipoEstado='Activo' and notap.periodo_idPeriodo=$numeroPeriodo and 
            notap.grado_idGrado=$gradoAlumno and materia.gradoMateria=$gradoAlumno and 
            materia.nombreMateria='INFORMATICA' and logros.periodo_idPeriodo=$numeroPeriodo
            and promedio.periodo_idPeriodo=$numeroPeriodo 
                order by promedio.valor desc";

            $_SESSION['listaInfo']= $notap->find_all_by_sql($sqlInfo);








         
        /************************************ FIN MATERIAS SECUNDARIA **************************************/





            View::select('listar');
            Input::delete();
        } else {


            View::select('index');
        }
    }

    /* End listar */

    public function buscarA() {
        $this->titulo = "Gestión de Boletines";
        $this->subtitulo = "Aquí se listan estudiantes según criterio de búsqueda";
        $this->informacion = "Por favor escoger el año lectivo presente, para la correcta generación de boletines.";
    }

    /* End buscarA */

    public function buscarG() {
        $this->titulo = "Gestión de Boletines";
        $this->subtitulo = "Aquí se listan estudiantes según criterio de búsqueda";
        $this->informacion = "Por favor escoger el año lectivo presente, para la correcta generación de boletines.";
    }

    /* End buscarG */

    public function porGrados(){

        $profesor= new Profesor();
        $anio = new Anio();
        $id = $_SESSION['idAnio'];

        $this->anio = $anio->find($id);

      

        if(Input::hasPost('rectorNameF')){

            $idProF=Input::post('idPro');
           

            $profe=$profesor->find_by_sql("SELECT * from profesor where idPro=$idProF");
            $this->profesorEscogido=$profesor->find($profe->idPro);
            $grado=$_SESSION['grado'];
            if ($grado<6 or $grado==13) {
               View::select('imprimir_boletin'); 
            }else{

          View::select('imprimir_boletin2'); 

            }

            }
            else{



                Redirect::to('boletin/index');

            }
        }
        /* End porGrados */


        public function individual(){



        }
        /* End solos */

       public function atras () {
        Redirect::to('boletin/index');
                }




    }

/* End BOLETIN CONTROLLER */