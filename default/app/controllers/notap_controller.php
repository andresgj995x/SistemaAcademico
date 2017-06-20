<?php


Load::models('notap');
Load::models('anio');
View::template('sbadmin');
Load::models('materia');

class NotapController extends AppController {

    public function index() {// Función cargada por defecto en la vista
        $this->titulo = "Gestión de Notas";
        $this->subtitulo = "Registre,Modifique o elimine  las notas de la Institución Educativa Belén";
        $this->informacion = "Por favor seleccione bien el periodo y el grado para modificar las notas de sus respectivos estudiantes.";


        $nota = new Notap();
        $anio = new Anio();
        $periodo = new Periodo();
        $materia = new Materia();
        $semestre = new Semestre();

        $this->anio = $anio->getAllAnios();



        if (Input::hasPost('gradoF', 'periodoF', 'idMateriaF', 'idAnioF')) {

            session_start();
            //Primero las guardamos en variables temporales

            $gradoMateria = intval(Input::post("gradoF"));
            $nombreMateria = Input::post("idMateriaF");
            $periodoSel = intval(Input::post('periodoF'));
            $anioSel = intval(Input::post('idAnioF'));

            $this->gradoMateria=$gradoMateria;
            $this->nombreMateria=$nombreMateria;
            $this->periodoSel=$periodoSel;
            $this->anioSel=$anioSel;

            if ($periodoSel == 1 or $periodoSel == 2) {

                $numSem = 1;
            } else {


                $numSem = 2;
            }

            //Vamos a guardar las 4 variables obtenidas en el index globalmente

            $_SESSION['gradoIdGlobal'] = $gradoMateria;
            $_SESSION['nombreMateriaGlobal'] = $nombreMateria;
            $_SESSION['periodoGlobal'] = $periodoSel;
            $_SESSION['idAnioSel'] = $anioSel;



            

            $this->periodo = $periodo->find_all_by_sql("SELECT * FROM PERIODO where 
                numeroPeriodo=$periodoSel AND  anio_idAnio=$anioSel");



            $notap = new Notap();
            $nota4 = new Notap();




            $this->nomMateria1 = $nombreMateria;
            $this->gradoMateria1 = $gradoMateria;



            $var1 = $periodo->find_all_by_sql("SELECT * from periodo where anio_idAnio=$anioSel and numeroPeriodo=$periodoSel ");
            $var2 = $materia->find("gradoMateria=$gradoMateria and nombreMateria='$nombreMateria'");


            $var3 = $semestre->find_all_by_sql("SELECT * FROM semestre where numeroSemestre=$numSem AND  anio_idAnio=$anioSel");



            $this->materia = $materia->find("gradoMateria=$gradoMateria and nombreMateria='$nombreMateria'");
            $this->semestre = $semestre->find_all_by_sql("SELECT * FROM semestre where numeroSemestre=$numSem AND  anio_idAnio=$anioSel");




            // Procederemos a guardar los objetos de consultas

            $_SESSION['periodo'] = $var1;
            $_SESSION['materia'] = $var2;
            $_SESSION['semestre'] = $var3;





            $anioParcial = intval(Input::post('idAnioF'));
            $gradoParcial = intval(Input::post('gradoF'));

            // AQUÍ TENGO QUE APLICAR UN COMPARADOR DE GRADO 




    $sql="SELECT * FROM alumno inner join notap on alumno.idAlumno =
     notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria inner join
      periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado  on alumno.estado_idEstado=estado.idEstado where alumno.grado_idGrado=$gradoMateria
       and materia.nombreMateria='$nombreMateria' and notap.anio_idAnio=$anioSel and
        periodo.numeroPeriodo=$periodoSel and materia.gradoMateria=$gradoMateria and estado.tipoEstado='Activo' 

        order by alumno.nombre ";


    $this->listaNotas3 = $nota4->find_all_by_sql("SELECT * FROM alumno inner join notap on alumno.idAlumno =
     notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria inner join
      periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado  on alumno.estado_idEstado=estado.idEstado where alumno.grado_idGrado=$gradoMateria
       and materia.nombreMateria='$nombreMateria' and notap.anio_idAnio=$anioSel and
        periodo.numeroPeriodo=$periodoSel and materia.gradoMateria=$gradoMateria and estado.tipoEstado='Activo' 

        order by alumno.nombre ");




    $_SESSION['arrayNotas'] = $notap->find_all_by_sql($sql);





            View::select('listar');




            if ( $this->listaNotas3 == null) {
                Flash::error('No existen alumnos en ese grado, por favor verifique su selección y vuelta a intentarlo.');
                Input::delete();
                View::select('index');
            } else {
                
            }
        }
    }

// end index function

    
//*************************************** //
    

    public function listar() {

        $this->titulo = "Gestión de Notas";
        $this->subtitulo = "Registre las notas de los estudiantes ";
        $this->informacion = "Si los campos están vacíos proceda a crear la nota, si tiene campos proceda a editarla.";


        session_start();

        //Objetos para sacar el ID respectivo

        $this->periodo = $_SESSION['periodo'];
        $this->materia = $_SESSION['materia'];
        $this->semestre = $_SESSION['semestre'];
       
       // Variables desde index para filtrar notas y alumnos

        $gradoMateria = $_SESSION['gradoIdGlobal'];
        $anioSel = $_SESSION['idAnioSel'];
        $nombreMateria = $_SESSION['nombreMateriaGlobal'];
        $periodoSel=$_SESSION['periodoGlobal'];

        //Variables

            $this->gradoMateria=$_SESSION['gradoIdGlobal'];
            $this->nombreMateria=$_SESSION['nombreMateriaGlobal'];
            $this->periodoSel=$_SESSION['periodoGlobal'];
            $this->anioSel=$_SESSION['idAnioSel'];


        
        $nota3 = new Notap();


        $sql="SELECT * FROM alumno inner join notap on alumno.idAlumno =
     notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria inner join
      periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join estado  on alumno.estado_idEstado=estado.idEstado where alumno.grado_idGrado=$gradoMateria
       and materia.nombreMateria='$nombreMateria' and notap.anio_idAnio=$anioSel and
        periodo.numeroPeriodo=$periodoSel and materia.gradoMateria=$gradoMateria and estado.tipoEstado='Activo' 

        order by alumno.nombre";
        

        $this->listaNotas3 = $nota3->find_all_by_sql($sql);


        View::select('listar');
    }

   

    public function edit( $nombres, $apellidos, $idMateria, $varP, $nomM, $gradoM, $idSemestre, $idAl, $id) {


        $this->titulo = "Gestión de Notas";
        $this->subtitulo = " Actualiza una o varias según vayas calificando a tus alumnos. ";
        $this->informacion = "Las notas por defecto estarán en 0.";

        
session_start();
       
      
        $this->nombresAl = utf8_decode($nombres);
        $this->apellidosAl = utf8_decode($apellidos);

        $this->idMateriaMa = $idMateria;
        $this->numeroPeriodo = $varP;
        $this->nomMateria = $nomM;
        $this->gradoMat = $gradoM;
        $this->idSemestre = $idSemestre;
        $this->idAlumno = $idAl;
        
        

        $notap = new Notap();
        $materia = new Materia();


        $this->notap = $notap->find($id);
        
        $this->materia = $materia->find_by_sql("SELECT * from materia inner join profesor
         on materia.profesor_idPro =profesor.idPro where materia.nombreMateria='$nomM'
          and materia.gradoMateria=$gradoM limit 1");

        if (Input::hasPost('idNotaP')) {


            $faltas = Input::post('faltasNota');
            $taller = Input::post('tallerNota');
            $pEscrita = Input::post('pEscritaNota');
            $labs = Input::post('labsNota');
            $eOral = Input::post('eOralNota');
            $eEscrita = Input::post('eEscritaNota');
            $punt = Input::post('punNota');
            $pPersonal = Input::post('pPersonalNota');
            $comp = Input::post('compNota');
            $iParticipacion = Input::post('ipNota');
            $recuperacion=Input::post('recNota');






                       $notaParcial1=(floatval($taller)+
                       floatval($pEscrita)+floatval($labs)+
                       floatval($eOral)+floatval($eEscrita))*0.7/5;
                       $notaParcial2=(floatval($punt)+floatval($pPersonal))*0.15/2;

                       $notaParcial3=(floatval($comp)+floatval($iParticipacion))*0.15/2;
                       $notaParcial=$notaParcial1+$notaParcial2+$notaParcial3;

                       if($notaParcial>$recuperacion){
                       $notaFinal=$notaParcial;

                       }else{

                         $notaFinal=$recuperacion;
                       }

            $notap->faltas = Input::post('faltasNota');
            $notap->taller = Input::post('tallerNota');
            $notap->pEscrita = Input::post('pEscritaNota');
            $notap->labs = Input::post('labsNota');
            $notap->eOral = Input::post('eOralNota');
            $notap->eEscrita = Input::post('eEscritaNota');
            $notap->punt = Input::post('punNota');
            $notap->pPersonal = Input::post('pPersonalNota');
            $notap->comp = Input::post('compNota');
            $notap->iParticipacion = Input::post('ipNota');
            $notap->notaParcial=$notaParcial;
            $notap->recuperacion=$recuperacion;
            $notap->notaFinal=$notaFinal;




            if ($notap->update(Input::post('idNotaP'))) {

                Flash::valid('Nota actualizada correctamente.');
                // CÓDIGO PARA ACTUALIZAR LOS PROMEDIOS


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";


            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn->set_charset("utf8");

            if ($conn->connect_error) {
                die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
            }


              $anioPf=$_SESSION['idAnioSel'];

            $nota5= new Notap();

            $promedio=$nota5->find_by_sql("SELECT nombre,apellido,identidadAl,faltas,
        nombreMateria,notaFinal,numeroPeriodo,notap.anio_idAnio,AVG(notaFinal) as pF FROM alumno inner join notap 
        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
         inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
         on alumno.idAlumno=promedio.alumno_idAlumno 
          and promedio.periodo_idPeriodo=$varP where alumno.grado_idGrado=$gradoM
          and notap.anio_idAnio=$anioPf and periodo.numeroPeriodo=$varP and alumno.idAlumno=$idAl");

            $temporal=round($promedio->pF,2);
            // Con el anterior código se busca el promedio que vayamos a modificar


    $sql = "UPDATE promedio SET valor=$temporal WHERE alumno_idAlumno=$idAl and periodo_idPeriodo=$varP";

                            if ($conn->query($sql) === TRUE) {
                              
                            } else {
                                echo "Error al crear notas por defecto: " . $conn->error;
                            }

                //************************************ */
                Input::delete();
                Redirect::to('notap/listar');
            } else {
                Flash::error('Hubo un error al actualizar las notas.. Verifique los valores por favor...');
            }




            Flash::valid('Nota guardada correctamente.');
        }//end update function
    }






}

//FIN CÓDIGO



