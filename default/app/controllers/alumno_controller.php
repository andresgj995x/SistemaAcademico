<?php
Load::models('alumno');
View::template('sbadmin');
Load::models('estado');
Load::models('matricula');
session_start();
class AlumnoController extends AppController
{
 public function buscar()
 {
  $this->titulo       = "Gestión de Alumnos";
  $this->subtitulo    = "Busqueda de Alumnos";
  $this->informacion  = "En está sección puede buscar a todos los alumnos por su identificación.";
  $globalSede = $_SESSION['globalSede'];
  $globalYear = $_SESSION['globalYear'];
  $this->listaAlumnos = null;
  if (Input::hasPost("nombresF")) {
   $alumnos            = new Alumno();
   $nombreAlumno       = Input::post("nombresF");
   $sql                = "SELECT * from alumno inner join grado on 
            grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado inner join
            matricula on matricula_idMatricula=idMatricula where nombre like '%$nombreAlumno%' and alumno.sede= '$globalSede'  and matricula.anio_idAnio = $globalYear";
   $this->listaAlumnos = $alumnos->find_all_by_sql($sql);
   if ($this->listaAlumnos == null) {
    Flash::error('Alumno no encontrado, pruebe nuevamente con otro primer nombre.');
    Input::delete();
   }
  }
 }
 public function buscar2()
 {
  $this->titulo       = "Gestión de Alumnos";
  $this->subtitulo    = "Busqueda de Alumnos";
  $this->informacion  = "En está sección puede buscar a todos los alumnos por su identificación y por nombre.";
  $this->listaAlumnos = null;
  $globalYear = $_SESSION['globalYear'];
  $globalSede = $_SESSION['globalSede'];
  if (Input::hasPost("idF")) {
   $alumnos            = new Alumno();
   $idAlumno           = Input::post("idF");
   $sql                = "SELECT * from alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado 
   inner join matricula on matricula_idMatricula=idMatricula where identidadAl = '$idAlumno' and alumno.sede= '$globalSede'  and matricula.anio_idAnio = $globalYear";
   $this->listaAlumnos = $alumnos->find_all_by_sql($sql);
   if ($this->listaAlumnos == null) {
    Flash::error('Alumno no encontrado,asegúrese que digitó bien el documento.');
    Input::delete();
   }
  }
 }
 public function index($page = 1)
 {
  $this->titulo      = "Gestión de Alumnos";
  $this->subtitulo   = "Alumnos Registrados";
  $this->informacion = "En está sección puede gestionar todos los alumnos que han sido registrados.";

  /* VARIABLES GLOBALES */

  $sedeGlobal = $_SESSION['globalSede'];
  $globalYear = $_SESSION['globalYear'];
  

  if (Auth::is_valid()) {
   $tipo = Auth::get('rol');
   if ($tipo != null && $tipo == 1) {
    $alumnos        = new Alumno();
    $this->selector = NULL;
    if (Input::hasPost("gradoF")) {
     $grado                = Input::post("gradoF");
     $this->selector       = $grado;
     $_SESSION['selector'] = $grado;
     if ($grado == "13") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join 
                        estado on estado_idEstado=idEstado inner join matricula on 
                        matricula_idMatricula=idMatricula where idGrado='13' and matricula.anio_idAnio=$globalYear  
                        and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "1") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado 
      inner join matricula on matricula_idMatricula=idMatricula where idGrado='1' and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "2") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado
       inner join matricula on matricula_idMatricula=idMatricula where idGrado='2' and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "3") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado 
      inner join matricula on matricula_idMatricula=idMatricula where idGrado='3' and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "4") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado
       inner join matricula on matricula_idMatricula=idMatricula where idGrado='4' and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal' and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "5") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado 
      inner join matricula on matricula_idMatricula=idMatricula where idGrado='5'  and matricula.anio_idAnio=$globalYear  and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "6") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado
       inner join matricula on matricula_idMatricula=idMatricula where idGrado='6'  and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "7") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado 
      inner join matricula on matricula_idMatricula=idMatricula where idGrado='7'  and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "8") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado
       inner join matricula on matricula_idMatricula=idMatricula where idGrado='8' and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal'  order by alumno.nombre";
     } elseif ($grado == "9") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado
       inner join matricula on matricula_idMatricula=idMatricula where idGrado='9' and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal'  order by alumno.nombre";
     } elseif ($grado == "10") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado
       inner join matricula on matricula_idMatricula=idMatricula where idGrado='10' and matricula.anio_idAnio=$globalYear  and alumno.sede ='$sedeGlobal' order by alumno.nombre";
     } elseif ($grado == "11") {
      $sql = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado
       inner join matricula on matricula_idMatricula=idMatricula where idGrado='11' and matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal'  order by alumno.nombre";
     }
     $this->listaAlumnos = $alumnos->find_all_by_sql($sql);
    } else {
     $sql                = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado 
                    inner join estado on estado_idEstado=idEstado inner join matricula
                    on matricula_idMatricula=idMatricula where matricula.anio_idAnio=$globalYear and alumno.sede ='$sedeGlobal' order by idGrado,nombre  ";
     $this->listaAlumnos = $alumnos->find_all_by_sql($sql);
    }
   } else {
    Redirect::to('inicio/index');
   }
  } else {
   Redirect::to('usuarios/index');
  }
 }
 //*    ************************************* FIN INDEX ***************************** //
 public function create()
 {
  $this->titulo      = "Gestión de Alumnos";
  $this->subtitulo   = "Registro de Alumno";
  $this->informacion = "En está sección puede llevar acabo el registro de un alumno.";
  $estado            = new Estado();
  $matricula         = new Matricula();
  $matriculaN        = new Matricula();
  $grado             = new Grado();
  $notap             = new Notap();
  $this->estado      = $estado->getAllEstados();
  $this->matricula   = $matricula->getAllMatriculas();
  $sql               = "SELECT * FROM grado";
  $this->grado       = $grado->find_all_by_sql($sql);
  //A        hora crearemos las opciones para que cuando haya un Submit cree el nuevo alumno
  //I        nicio del HASPOST
  $alumno            = new Alumno();
  $semestre          = new Semestre();
  $periodo           = new Periodo();

  $globalYear =  intval($_SESSION['globalYear']);


  if (Input::hasPost('idAF', 'nomF', 'apeF', 'estadoF', 'edadF', 'generoF', 'dirF', 'celF', 'rhF', 'gradoF', 'tipoMatF', 'idAcuF', 'nomAcuF', 'dirAcuF', 'celAcuF')) {
   $alumno->idAlumno              = Input::post('idAF') + 1;
   $alumno->identidadAl           = Input::post('idAF');
   $alumno->nombre                = Input::post('nomF');
   $alumno->apellido              = Input::post('apeF');
   $alumno->estado_idEstado       = Input::post('estadoF');
   $alumno->nacimiento            = Input::post('edadF');
   $alumno->genero                = Input::post('generoF');
   $alumno->dir                   = Input::post('dirF');
   $alumno->celular               = Input::post('celF');
   if(Input::post('celF')==NULL){$alumno->celular = 0;}
   $alumno->rh                    = Input::post('rhF');
   $alumno->grado_idGrado         = Input::post('gradoF');
   $mat = Input::post('tipoMatF');


  $objetoMatricula = $matricula->find_by_sql("SELECT * from matricula where estadoMatricula='$mat' and anio_idAnio =$globalYear ");

  $alumno->matricula_idMatricula = $objetoMatricula->idMatricula;


   $alumno->cedulaAcu             = Input::post('idAcuF');
   if(Input::post('idAcuF')==NULL){$alumno->cedulaAcu = 0;}
   $alumno->nombreAcu             = Input::post('nomAcuF');
    if(Input::post('nombreAcuF')==NULL){$alumno->nombreAcu = "--";}
   $alumno->dirAcu                = Input::post('dirAcuF');
   if(Input::post('dirAcuF')==NULL){$alumno->dirAcu = 0;}
   $alumno->celAcu                = Input::post('celAcuF');
   if(Input::post('celAcuF')==NULL){$alumno->celAcu = 0;}
   $alumno->sede                  = Input::post('sedeF');

   /* DATOS FAMILIARES */

   $alumno->idMadreA              = Input::post('ccMadre');
   $alumno->idPadreA              = Input::post('ccPadre');
   $alumno->madreNombreA          = Input::post('nombreMadre');
   $alumno->padreNombreA          = Input::post('nombrePadre');
   $alumno->madreApellidoA        = Input::post('apellidoMadre');
   $alumno->padreApellidoA        = Input::post('apellidoPadre');
   $alumno->celMadreA             = Input::post('celMadre');
   $alumno->celPadreA             = Input::post('celPadre');

    if(Input::post('ccMadre')==NULL){$alumno->idMadreA = 0;}
    if(Input::post('ccPadre')==NULL){$alumno->idPadreA = 0;}
    if(Input::post('nombreMadre')==NULL){$alumno->madreNombreA = "--";}
    if(Input::post('nombrePadre')==NULL){$alumno->padreNombreA = "--";}
    if(Input::post('apellidoMadre')==NULL){$alumno->madreApellidoA = "--";}
    if(Input::post('apellidoPadre')==NULL){$alumno->padreApellidoA = "--";}
    if(Input::post('celMadre')==NULL){$alumno->celMadreA = 0;}
    if(Input::post('celPadre')==NULL){$alumno->celPadreA = 0;}


   $tempIdM                       = Input::post('tipoMatF');
   

   $tempA = intval($globalYear);

   $tempG  = intval(Input::post('gradoF'));
   $tempID = Input::post('idAF') + 1;
   $alumno->save();

   
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $dbname     = "mydb";
   $conn       = new mysqli($servername, $username, $password, $dbname);
   $conn->set_charset("utf8");
   if ($conn->connect_error) {
    die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
   }

   //             Generador de promedios por alumno
   $inicial = 1;
   $final   = 5;
   for ($l = 1; $l < 5; $l++) {
    $sql = "INSERT INTO promedio (valor, periodo_idPeriodo,alumno_idAlumno,anio_idAnio)
                  VALUES (0,$l,$tempID,$globalYear)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por periodo por defecto: " . $conn->error;
    }
   }



   /* GENERADOR DE PROMEDIOS ANUALES PARA CADA ESTUDIANTE CREADO*/

   

  if($tempG==13){  
	   for ($i = 1; $i < 8; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: Grado preescolar " . $conn->error;
    }
	   }
   
  }// Parcialemente fixed 
  
  
  elseif($tempG==1){
	 for ($i = 11; $i < 21; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: Grado primero " . $conn->error;
    }
	   }	

  }elseif($tempG==2){
	   for ($i = 21; $i < 31; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: Grado Segundo " . $conn->error;
    }
	   }


  }elseif($tempG==3){
	 for ($i = 31; $i < 41; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }elseif($tempG==4){
	 for ($i = 41; $i < 51; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }elseif($tempG==5){
	 for ($i = 51; $i < 61; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }elseif($tempG==6){
	 for ($i = 61; $i < 74; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }elseif($tempG==7){
	 for ($i = 74; $i < 87; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }elseif($tempG==8){
	 for ($i = 87; $i < 100; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }elseif($tempG==9){
	 for ($i = 100; $i < 113; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }elseif($tempG==10){
	 for ($i = 113; $i < 126; $i++) {
    $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	   }

  }


  else{
	     for ($i = 126; $i <139 ; $i++) {
    $sql = "INSERT INTO promedioanual (valor, anio_idAnio,alumno_idAlumno,materia_idMateria)
                  VALUES (0,$globalYear,$tempID,$i)";
    if ($conn->query($sql) === TRUE) {
    } else {
     echo "Error al crear promedios por defecto: " . $conn->error;
    }
	  
  }
  }

  

  
   /* Que cree notas para 10 años de los estudiantes*/
   /*             * ************************** AÑO 2017 *********************************************************************************** */
   if (intval($tempA) != 2012) {
    /* PREESCOLAR ******************************************************** */
    if (intval($tempG) == 13) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 1; $i < 8; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                        anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 1; $i < 8; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado 13 Preescolar **************************


    /* SEPARADOR DE GRADO   PRIMERO */
    if (intval($tempG) == 1) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 11; $i < 21; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 11; $i < 21; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado 1 Primero **************************



    /* SEPARADOR DE GRADO SEGUNDO */
    if (intval($tempG) == 2) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 21; $i < 31; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 21; $i < 31; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado 2 SEGUNDO **************************
    /* SEPARADOR DE GRADO TERCERO 3 */
    if (intval($tempG) == 3) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 31; $i < 41; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 31; $i < 41; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado 3 TERCERO **************************
    /* SEPARADOR DE GRADO CUARTO 4 */
    if (intval($tempG) == 4) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 41; $i < 51; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 41; $i < 51; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado 4 CUARTO  FIN **************************
    /* SEPARADOR DE GRADO    QUINTO 5 */
    if (intval($tempG) == 5) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 51; $i < 61; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 51; $i < 61; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado 5 QUINTO  FIN **************************
    /* SEPARADOR DE SEXTO  6 */
    if (intval($tempG) == 6) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 61; $i < 74; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 61; $i < 74; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado SEXTO 6  FIN **************************
    /* SEPARADOR DE SÉPTIMO  7 */
    if (intval($tempG) == 7) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 74; $i < 87; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 74; $i < 87; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado SÉPTIMO 7  FIN **************************
    /* SEPARADOR DE OCTAVO  8 */
    if (intval($tempG) == 8) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 87; $i < 100; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 87; $i < 100; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado OCTAVO 8  FIN **************************
    /* SEPARADOR DE NOVENO  9 */
    if (intval($tempG) == 9) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 100; $i < 113; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 100; $i < 113; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado NOVENO 9 FIN **************************
    /* SEPARADOR DE DECIMO 10 */
    if (intval($tempG) == 10) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 113; $i < 126; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                    anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
                                    VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 113; $i < 126; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado DECIMO 10 FIN **************************
    /* SEPARADOR DE UNDÉCIMO 11 */
    if (intval($tempG) == 11) {
     for ($j = 1; $j <= 2; $j++) {
      for ($i = 126; $i < 139; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,1,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
     //*                    ****** SEGUNDO SEMESTRE
     for ($j = 3; $j <= 4; $j++) {
      for ($i = 126; $i < 139; $i++) {
       $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
VALUES (0,0,0,0,0,0,0,0,0,0,$globalYear,$tempID,$i,2,$tempG,$j)";
       if ($conn->query($sql) === TRUE) {
       } else {
        echo "Error al crear notas por defecto: " . $conn->error;
       }
      }
      //                         Aquí termina el FOR
     }
    }
    //                 Aquí termina el comparador para grado undécimo  11 FIN **************************
   }//end diferente de 2012
    
   //             Fin Comparador 2017
   //*            ********************************** END 2017 ************************************** //
   //             Para generar esas notas para un año diferente se generan con el otro idAnio y listo
   $conn->close();
   //V            amos a añadir el código que por cáda alumno creado me crea una nota con valores nulos.
   if ($alumno->save()) {
    Flash::valid('Alumno guardado correctamente');
    Input::delete();
    Redirect::to('alumno/index');
   } else {
    Flash::error('Hubo un error al agrerar el nuevo alumno. Revise los datos por favor..');
   }
  }//end if has post
 }
 //*    ****************** FUNCION EDITAR ************************************//
 public function edit($id)
 {
  $this->titulo      = "Gestión de Alumnos";
  $this->subtitulo   = "Actualización de Alumnos";
  $this->informacion = "Nota importante:  ";
  $alumno            = new Alumno();
  //         $estado = new Estado();
  //$        grado = new Grado();
  $matricula         = new Matricula();
  $this->matricula   = $matricula->getAllMatriculas();
   $globalAnio = $_SESSION['globalYear'];
  $this->selector    = $_SESSION['selector'];
  $this->matricula2  = $matricula->find_all_by_sql("SELECT * from alumno inner join
     matricula on alumno.matricula_idMatricula=matricula.idMatricula where alumno.idAlumno=$id and matricula.anio_idAnio=$globalAnio");
  $this->alumno      = $alumno->find($id);

  $alumnoEditable = $alumno->find($id);


  $this->matriculaFinal = $matricula->find_by_sql("SELECT * from alumno inner join
     matricula on alumno.matricula_idMatricula=matricula.idMatricula inner join grado on alumno.grado_idGrado= grado.idGrado where alumno.idAlumno=$id and matricula.anio_idAnio=$globalAnio");


/* Código para determinar que idMatricula es el adecuado*/




  


  $this->idAl        = $id;
  if (Input::hasPost('identificacion')) {
   $identidadAl   = intval(Input::post('identificacion'));
   $nombre        = Input::post('nomF');
   $apellido      = Input::post('apeF');
   //             $alumno->estado_idEstado=Input::post('estadoF');
   $nacimiento    = Input::post('edadF');
   $genero        = Input::post('generoF');
   $dir           = Input::post('dirF');
   $celular       = Input::post('celF');
   $rh            = Input::post('rhF');

   if($celular==NULL){

    $celular=0;

   }
  
   $estadoTemp    = Input::post('estadoF');
   $matriculaTemp = intval(Input::post('tipoU'));

   if($matriculaTemp==1){
     $matriculaTemp ==intval($alumnoEditable->matricula_idMatricula);

   }elseif($matriculaTemp==2){
     $matriculaTemp ==intval($alumnoEditable->matricula_idMatricula)+1;

   }elseif($matriculaTemp==3){
     $matriculaTemp ==intval($alumnoEditable->matricula_idMatricula)+2;

   }else{
     $matriculaTemp ==intval($alumnoEditable->matricula_idMatricula)+3;

   }

    

   $cedulaAcu     = Input::post('idAcuF');
   $nombreAcu     = Input::post('nomAcuF');
   $dirAcu        = Input::post('dirAcuF');
   $celAcu        = Input::post('celAcuF');
   $sede          = Input::post('sedeU');

   /* VALORES FAMILIARES  */

   
   $idMadreA              = intval(Input::post('ccMadre'));
   $idPadreA              = intval(Input::post('ccPadre'));
   $madreNombreA          = Input::post('nombreMadre');
   $padreNombreA          = Input::post('nombrePadre');
   $madreApellidoA        = Input::post('apellidoMadre');
   $padreApellidoA        = Input::post('apellidoPadre');
   $celMadreA             = intval(Input::post('celMadre'));
   $celPadreA             = intval(Input::post('celPadre'));

   if($idMadreA == 0){

     $idMadreA=0000;
   }
   if($idPadreA == 0){

     $idPadreA=0000;
   }
   if($madreNombreA == ''){

     $madreNombreA='No introducido(a)';
   }
   if($padreNombreA == ''){

     $padreNombreA='No introducido(a)';
   }
   if($madreApellidoA == ''){

     $madreApellidoA='No introducido(a)';
   }
   if($padreApellidoA == ''){

     $padreApellidoA='No introducido(a)';
   }
   if($celMadreA == 0){

     $celMadreA=0000;
   }
   if($celPadreA == 0){

     $celPadreA=0000;
   }


   $servername    = "localhost";
   $username      = "root";
   $password      = "";
   $dbname        = "mydb";
   //             Create connection
   $conn          = new mysqli($servername, $username, $password, $dbname);
   $conn->set_charset("utf8");
  
   if ($conn->connect_error) {
    die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
   }
   $sql = "UPDATE alumno SET identidadAl=$identidadAl,nombre='$nombre',apellido='$apellido',
        nacimiento='$nacimiento',genero='$genero',dir='$dir',celular=$celular,rh='$rh',
        estado_idEstado=$estadoTemp,matricula_idMatricula=$matriculaTemp, idMadreA=$idMadreA,idPadreA=$idPadreA,madreNombreA='$madreNombreA'
        ,padreNombreA='$padreNombreA',madreApellidoA='$madreApellidoA',padreApellidoA='$padreApellidoA',celMadreA=$celMadreA,celPadreA=$celPadreA,sede='$sede'
         WHERE idAlumno=$id";
   if ($conn->query($sql) === TRUE) {
    Flash::valid('El alumno se actualizó satisfactoriamente.');
    $sql                = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula";
    $this->listaAlumnos = $alumno->find_all_by_sql($sql);
   // View::select("index");
   Redirect::to('alumno/index');
   } else {
    echo "Error actualizando datos de alumno: " . $conn->error;
    Flash::error('Hubo un error al actualizar los datos.. Verifique los valores por favor...');
    Flash::error($sql);
    Redirect::to('alumno/index');
   }
   $conn->close();
  }
 }
 //     FIN FUNCION EDITAR ALUMNO *******************************************
 public function del($id)
 {
  if (Auth::is_valid()) {
   $tipo = Auth::get('rol');
   if ($tipo != null && $tipo == 1) {
    $alumno = new Alumno();
    if (!$alumno->delete($id)) {
     Flash::error('No se puedo eliminar el alumno.');
    } else {
     Flash::valid('El alumno fué eliminado correctamente.');
    }
    $sql                = "SELECT * FROM alumno inner join grado on grado_idGrado=idGrado inner join estado on estado_idEstado=idEstado inner join matricula on matricula_idMatricula=idMatricula";
    $this->listaAlumnos = $alumno->find_all_by_sql($sql);
    Redirect::to('alumno/index');
   } else {
    Redirect::to('inicio/index');
   }
  } else {
   Redirect::to('usuarios/index');
  }
 }
}