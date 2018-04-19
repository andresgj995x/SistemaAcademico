<?php
View::template('sbadmin');
session_start();

class PromocionController extends AppController

{

    public function graduar(){

        $this->titulo      = "Gestión de Promociones";
        $this->subtitulo   = "Nota:Solo proceda a esta opción al final del año escolar.";
        $this->informacion = "La información de los estudiantes será la de la sede y año lectivo actual.";

        $alumno = new Alumno();


            if(Input::hasPost('paraBorrar')){ ////////////////////////////////////// PRUEBA /////////////////////////////////////

                $checked = Input::post('promociones');
                $sedeR = Input::post('sede'); 
                
                $globalYear = $_SESSION['globalYear']; // teste

                $promociones = Input::post('promociones');
                $this->test = new ArrayObject();
                $cuenta =count(Input::post('promociones'));

                $sqlPartial ="SELECT * FROM alumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula 
                  where matricula.anio_idAnio=$globalYear and alumno.sede = '$globalSede'  ";

                /* Código para conformar SQL de PROMOCIONADOS */
                //region lel
                $string="";
                for($w=0; $w < count($checked); $w++){
                    $string .= "idAlumno = " . $checked[$w] . " or ";
                    $lel=$string;
                          }
                $subject = $lel;
                $search = 'or';
                $replace = ' ';
                $pos = strrpos($subject, $search);
                    if($pos !== false)
                    {
                        $subject = substr_replace($subject, $replace, $pos, strlen($search));
                    }
                $sqlPartial.= $subject;
                /* END Promocionados*/

                //endregion
               

                $a = $alumno->find_all_by_sql($sqlPartial); // Variable de alumnos a graduar
                $numeroR = count($a);
                $this->numeror2=$numeroR;
               
                $currentStudentYear = intval($_SESSION['globalGrado1'])+1;

                $actualYear           = intval(date("Y"));
                $nextYear             = intval(date("Y"))+1;
              
                $matricula = new Matricula();

                $matriculaNext = $matricula->find_by_sql("SELECT * from matricula where estadoMatricula ='Inicial' and
                 anio_idAnio =$currentStudentYear");

                 $this->matriculaEnv = $matriculaNext;

             
                   
                    $servername = $_SESSION['servername'];
                    $username   = $_SESSION['username'];
                    $password   = $_SESSION['password'];
                    $dbname     = $_SESSION['dbname'];

                    $conn       = new mysqli($servername, $username, $password, $dbname);
                    $conn->set_charset("utf8");
                    if ($conn->connect_error) {
                        die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
                    }

                    

                 $_SESSION['number']=$numeroR;


                 $arraySql = array("sqlPrimero");
                 $contador = 0;
               
                for($w=0; $w < $numeroR; $w++){// COMIENZO FOR ESTUDIANTES A PROMOCIONAR

                    $idAlumno = $a[$w]->idAlumno;
                    
                                   
                    //region
                    $grado_idGrado = intval($a[$w]->grado_idGrado)+1;
                    $matricula_idMatricula = $matriculaNext->idMatricula;
                  
                    $sede = $sedeR; ////// A escoger por el usuario.
                    //endregion

                    // <editor-fold defaultstate="collapsed" desc="user-description">
  
                     // </editor-fold>

                     $globalYear = $_SESSION['globalYear'];
                    

                    // Para insertar la informacion de un alumno de nuevo, primero tengo que sacar todos los datos con un select 
                    $sqlTraerAlumnos = "SELECT * FROM ALUMNO inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula
                     where alumno.idAlumno = $idAlumno and matricula.anio_idAnio=$globalYear";
                    $aPromocionar = $alumno->find_by_sql($sqlTraerAlumnos); // Guardamos 1 por 1 los alumnos que va recorriendo el for de los seleccionados.
                    
                

                    //Luego de que traiga un alumno uno por uno, igualar ese objeto a las nuevas variables y modificar los siguiente parametros:

                    $sqlInsertAlumno = "INSERT INTO alumno (idAlumno, nombre,apellido,identidadAl,estado_idEstado,foto,nacimiento,genero,rh,dir,celular,
                                                condicion,grado_idGrado,matricula_idMatricula,cedulaAcu,nombreAcu,dirAcu,celAcu,sede,idMadreA,idPadreA,madreNombreA,padreNombreA,
                                                madreApellidoA,padreApellidoA, celMadreA,celPadreA)
                                    VALUES ($idAlumno,'$aPromocionar->nombre','$aPromocionar->apellido',$aPromocionar->identidadAl,1,'noFoto','$aPromocionar->nacimiento',
                                    '$aPromocionar->genero','$aPromocionar->rh','$aPromocionar->dir',$aPromocionar->celular,'noCondicion',$grado_idGrado,$matricula_idMatricula,$aPromocionar->cedulaAcu,
                                    '$aPromocionar->nombreAcu','$aPromocionar->dirAcu',$aPromocionar->celAcu,'$sedeR',$aPromocionar->idMadreA, $aPromocionar->idPadreA,'$aPromocionar->madreNombreA',
                                    '$aPromocionar->padreNombreA','$aPromocionar->madreApellidoA','$aPromocionar->padreApellidoA',$aPromocionar->celMadreA,$aPromocionar->celPadreA)";

                   
 
              
                   array_push($arraySql,$sqlInsertAlumno);
                   
                   
                   
                /*    if ($conn->query($sqlInsertAlumno) == TRUE) {

                       $contador = $contador+1;

                       echo "Alumno creado";
                    } else {
                    echo "Error al crear promedios por defecto: " . $conn->error;
                    }*/


                } // FIN FOR PROMOCIONADOS
                    $this->arraySql=$arraySql;
                    //$this->contador = $contador;


            }                               /////////////////////////////////////// FIN PRUEBA //////////////////////////////

            if(Input::hasPost('temporal')){

                $checked = Input::post('promociones');
                $sedeR = Input::post('sede'); 
                
                $promociones = Input::post('promociones');
                $this->test = new ArrayObject();
                $cuenta =count(Input::post('promociones'));

                //Vamos a comparar con el anio de matricula que se guardara en $_S

                $sqlPartial ="SELECT * FROM alumno inner join matricula on alumno.matricula_idMatricula=matricula.idMatricula 
                  where matricula.anio_idAnio=2017 and ";

                /* Código para conformar SQL de PROMOCIONADOS */
                
                $string="";
                for($w=0; $w < count($checked); $w++){
                    $string .= "idAlumno = " . $checked[$w] . " or ";
                    $lel=$string;
                          }
                $subject = $lel;
                $search = 'or';
                $replace = ' ';
                $pos = strrpos($subject, $search);
                    if($pos !== false)
                    {
                        $subject = substr_replace($subject, $replace, $pos, strlen($search));
                    }
                $sqlPartial.= $subject;
                /* END Promocionados*/
               

                $a = $alumno->find_all_by_sql($sqlPartial); // Variable de alumnos a graduar
                $numeroR = count($a);
                $this->numeror2=$numeroR;
                /* Ahora que los tengo en un vector, los estudiantes a promocionar
                   sigue pasarlos a todos por un for que recorra e inserte su información
                   pero con año diferente,  y la idMatricula correspondiente a ese año.
                */

                /* Para sacar la id de Matricula se hará un filtro con el tipo de matricula, por defecto Inicial
                   y el año correspondiente
                */

                #region 
                $currentStudentYear = intval($_SESSION['globalGrado1'])+1;

                $actualYear           = intval(date("Y"));
                $nextYear             = intval(date("Y"))+1;
                #endregion
                

                /* Encontremos el id_Matricula para cada siguiente año */
                $matricula = new Matricula();

                $matriculaNext = $matricula->find_by_sql("SELECT * from matricula where estadoMatricula ='Inicial' and
                 anio_idAnio =$currentStudentYear"); // AQUI ESTA EL ERROR DEL GRADO 5

                 $this->matriculaEnv = $matriculaNext;

                /* Parece que tenemos todo, ahora toca llamar a la función o script que hará el trabajo sucio jeje */

                /* INICIO SCRIPT PROMOCIONAR ALUMNOS*********************************************************************************/

                {//start section
                   
                    $servername = $_SESSION['servername'];
                    $username   = $_SESSION['username'];
                    $password   = $_SESSION['password'];
                    $dbname     = $_SESSION['dbname'];

                    $conn       = new mysqli($servername, $username, $password, $dbname);
                    $conn->set_charset("utf8");
                    if ($conn->connect_error) {
                        die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
                    }

                    

                 $_SESSION['number']=$numeroR;


                 $arraySql = array("sqlPrimero");
                 $contador = 0;
               
                for($w=0; $w < $numeroR; $w++){// COMIENZO FOR ESTUDIANTES A PROMOCIONAR

                    $idAlumno = $a[$w]->idAlumno;
                    
                                   
                    $grado_idGrado = intval($a[$w]->grado_idGrado)+1;
                    $matricula_idMatricula = $matriculaNext->idMatricula;
                  
                    $sede = $sedeR; ////// A escoger por el usuario.

                    

                    // Para insertar la informacion de un alumno de nuevo, primero tengo que sacar todos los datos con un select 
                    $sqlTraerAlumnos = "SELECT * FROM ALUMNO inner join matricula  on alumno.matricula_idMatricula=matricula.idMatricula
                     where alumno.idAlumno = $idAlumno and matricula.anio_idAnio=2017";
                    $aPromocionar = $alumno->find_by_sql($sqlTraerAlumnos); // Guardamos 1 por 1 los alumnos que va recorriendo el for de los seleccionados.
                    
                

                    //Luego de que traiga un alumno uno por uno, igualar ese objeto a las nuevas variables y modificar los siguiente parametros:

                    $sqlInsertAlumno = "INSERT INTO alumno (idAlumno, nombre,apellido,identidadAl,estado_idEstado,foto,nacimiento,genero,rh,dir,celular,
                                                condicion,grado_idGrado,matricula_idMatricula,cedulaAcu,nombreAcu,dirAcu,celAcu,sede,idMadreA,idPadreA,madreNombreA,padreNombreA,
                                                madreApellidoA,padreApellidoA, celMadreA,celPadreA)
                                    VALUES ($idAlumno,'$aPromocionar->nombre','$aPromocionar->apellido',$aPromocionar->identidadAl,1,'noFoto','$aPromocionar->nacimiento',
                                    '$aPromocionar->genero','$aPromocionar->rh','$aPromocionar->dir',$aPromocionar->celular,'noCondicion',$grado_idGrado,$matricula_idMatricula,$aPromocionar->cedulaAcu,
                                    '$aPromocionar->nombreAcu','$aPromocionar->dirAcu',$aPromocionar->celAcu,'$sedeR',$aPromocionar->idMadreA, $aPromocionar->idPadreA,'$aPromocionar->madreNombreA',
                                    '$aPromocionar->padreNombreA','$aPromocionar->madreApellidoA','$aPromocionar->padreApellidoA',$aPromocionar->celMadreA,$aPromocionar->celPadreA)";

                   
 
                  //  $sql = "UPDATE alumno SET  grado_idGrado=$grado_idGrado,matricula_idMatricula=$matricula_idMatricula, sede='$sedeR'
                // WHERE idAlumno=$idAlumno";
                   array_push($arraySql,$sqlInsertAlumno);
                   
                   
                   
                    if ($conn->query($sqlInsertAlumno) === TRUE) {

                       $contador = $contador+1;
                    } else {
                    echo "Error al crear promedios por defecto: " . $conn->error;
                    }

                    //$_SESSION['sqlTemp']=$sqlInsertAlumno;


                    /* CÌDOGO PARA CREACION DE NOTAS, PROMEDIOS Y PROMEDIOS ANUALES AL AÑO A PROMOCIONAR */


                                    /* Re asignación de variales */

                                    $globalYear = intval($matriculaNext->anio_idAnio);
                                    $tempID = $idAlumno;
                                    $tempG = $grado_idGrado;
                                    $tempA = intval($a[$w]->grado_idGrado);
                                    




                                  

                                    

                                    $inicial = 1; // Periodo 1
                                    $final   = 5; // Acaba en 4, 4 periodos en total.

                                    for ($m = $inicial; $m < $final; $m++) {
                                        $sql = "INSERT INTO promedio (valor, periodo_idPeriodo,alumno_idAlumno,anio_idAnio)
                                                    VALUES (0,$m,$tempID,$globalYear)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                    }

                                    



                                    /* GENERADOR DE PROMEDIOS ANUALES PARA CADA ESTUDIANTE CREADO*/

                                    

                                    if($tempG==13){  
                                        for ($p = 1; $p < 11; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }
                                    
                                    }elseif($tempG==1){
                                        for ($p = 11; $p < 21; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }    

                                    }elseif($tempG==2){
                                        for ($p = 21; $p < 31; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }


                                    }elseif($tempG==3){
                                        for ($p = 31; $p < 41; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }elseif($tempG==4){
                                        for ($p = 41; $p < 51; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }elseif($tempG==5){
                                        for ($p = 51; $p < 61; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }elseif($tempG==6){
                                        for ($p = 61; $p < 74; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }elseif($tempG==7){
                                        for ($p = 74; $p < 87; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }elseif($tempG==8){
                                        for ($p = 87; $p < 100; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }elseif($tempG==9){
                                        for ($p = 100; $p < 113; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }elseif($tempG==10){
                                        for ($p = 113; $p < 126; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor,anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                        echo "Error al crear promedios por defecto: " . $conn->error;
                                        }
                                        }

                                    }


                                    else{
                                            for ($p = 126; $p <139 ; $p++) {
                                        $sql = "INSERT INTO promedioanual (valor, anio_idAnio,alumno_idAlumno,materia_idMateria)
                                                    VALUES (0,$globalYear,$tempID,$p)";
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
                                        for ($i = 1; $i < 11; $i++) {
                                        $sql = "INSERT INTO notap (faltas, taller,pEscrita,labs,eOral,eEscrita,punt,pPersonal,comp,iParticipacion,
                                                                            anio_idAnio,alumno_idAlumno,materia_idMateria,semestre_idSemestre,grado_idGrado,periodo_idPeriodo)
                                    VALUES (0,0,0,0,0,0,0,0,0,0,
                                        $globalYear+$l,$tempID,$i,1,$tempG,$j)";
                                        if ($conn->query($sql) === TRUE) {
                                        } else {
                                            echo "Error al crear notas por defecto: " . $conn->error;
                                        }
                                        }
                                        //                         Aquí termina el FOR
                                        }
                                        //*                    ****** SEGUNDO SEMESTRE
                                        for ($j = 3; $j <= 4; $j++) {
                                        for ($i = 1; $i < 11; $i++) {
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


                    /* FIN CREADOR DE NOTAS,PROMEDIOS Y PROMEDIOS ANUALES [AÑO A PROMOCIONAR] */



            
                
                }//end primer for de estudiantes

                

                $_SESSION['arraySql']=$arraySql;

                
                    


                }// end section

                /* FIN SCRIPT PROMOCIONAR ALUMNOS*************************************************************************************/
              
            }// End if has post

    }//end graduar function ********************************************************************************************************


    public function index()
    {
        

        $this->titulo      = "Gestión de Promociones";
        $this->subtitulo   = "Nota:Solo proceda a esta opción al final del año escolar.";
        $this->informacion = "La información de los estudiantes será la de la sede y año lectivo actual.";
        
        

        $materia           = new Materia();
        $logro             = new Logros();
        $notap = new Notap();

        
        $anioGlobal = $_SESSION['globalYear'];
        $globalSede = $_SESSION['globalSede'];
        /* HAS POST BEGIN*/

        
        if (Input::hasPost('gradoF')) {
            $gradoF         = intval(Input::post('gradoF'));

            $this->gradoSel = $gradoF;

            $anioEstudiantes = intval(Input::post('anioEstudiantes'));

            $globalYear = $anioEstudiantes;
            $anioGlobal= $anioEstudiantes;
            $this->anioEstudiantes    = $anioEstudiantes;

            //en realidad solo necesito el año lectivo que se haya escogido

            //en este caso año estudiantes


            if ($gradoF < 6 ) {

                /**************************** PRIMER PERIODO [inicio]*******************/
                $this->cuenta       = $notap->find_by_sql("SELECT COUNT(*) as cuenta FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno 
   inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  
            where alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=1 and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1  and estado.tipoEstado='Activo'
          and materia.nombreMateria='LENGUA CASTELLANA' and notap.materia_idMateria=promedioanual.materia_idMateria
           and alumno.sede = '$globalSede'
           order by promedioanual.valor DESC  ");
           
                $this->listaNotasM1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasL1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede = '$globalSede'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasI1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo' and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasS1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** PRIMER PERIODO [FIN] *******************/
                /**************************** SEGUNDO PERIODO [inicio]*******************/
                $this->listaNotasM2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasL2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasS2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasF2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** SEGUNDO PERIODO [FIN] *******************/
                /**************************** TERCER PERIODO [INICIO] *******************/
                $this->listaNotasM3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasL3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasI3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasS3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasF3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** TERCER PERIODO [FIN] *******************/
                /**************************** CUARTO PERIODO [inicio]*******************/
                $this->listaNotasM4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasL4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='LENGUA CASTELLANA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasI4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasS4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS SOCIALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasN4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='CIENCIAS NATURALES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasA4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasR4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION RELIGIOSA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasF4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasT4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='TECNOLOGIA E INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** CUARTO PERIODO [FIN] ***************************************************************************/
                View::select("listar1");


/* SEPARADOR DE GRADOS ********************************************************************************************************************************************/



            }elseif($gradoF == 13){

                          /**************************** PRIMER PERIODO [inicio]*******************/
                          $this->cuenta       = $notap->find_by_sql("SELECT COUNT(*) as cuenta FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno 
                 inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  
                          where alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=1 and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1  and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='CORPORAL' and notap.materia_idMateria=promedioanual.materia_idMateria
                         order by promedioanual.valor DESC  ");
                         
                              $this->listaNotasCorp1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasComu1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasCogn1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              $this->listaNotasEti1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasEste1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              $this->listaNotasSoci1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasEspi1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                           
                              /**************************** PRIMER PERIODO [FIN] *******************/
                              /**************************** SEGUNDO PERIODO [inicio]*******************/
                            
                              $this->listaNotasCorp2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasComu2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasCogn2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              $this->listaNotasEti2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasEste2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              $this->listaNotasSoci2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasEspi2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");


                        //////////////////////************** SEGUNDO FINAL */

                        /////////////////////*********** TERCERO INICIO    */

                        $this->listaNotasCorp3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                        inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                        on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
               alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                        where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                        and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                      and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                            $this->listaNotasComu3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                        inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                        on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
               alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                        where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                        and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                      and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                            $this->listaNotasCogn3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                        inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                        on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
               alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                        where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                        and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                      and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                            $this->listaNotasEti3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                        inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                        on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
               alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                        where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                        and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                      and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                            $this->listaNotasEste3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                        inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                        on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
               alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                        where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                        and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                      and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                            $this->listaNotasSoci3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                        inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                        on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
               alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                        where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                        and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                      and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                            $this->listaNotasEspi3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                        on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                        inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                        on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
               alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                        where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                        and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                      and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              /**************************** TERCER PERIODO [FIN] *******************/
                              /**************************** CUARTO PERIODO [inicio]*******************/
                            
                              $this->listaNotasCorp4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='CORPORAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasComu4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='COMUNICATIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasCogn4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'
                        and materia.nombreMateria='COGNITIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              $this->listaNotasEti4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ETICA Y VALORES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasEste4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ESTETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              $this->listaNotasSoci4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='SOCIOAFECTIVA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                              $this->listaNotasEspi4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                          on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                          inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                          on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
                 alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                          where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                          and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
                        and materia.nombreMateria='ESPIRITUAL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");

                              /**************************** CUARTO PERIODO [FIN] ***************************************************************************/
                              View::select("listar3");
              
                //fin para preescolar 
            }
            
            else {
                /**************************** PRIMER PERIODO [inicio]*******************/
                $this->cuenta         = $notap->find_by_sql("SELECT COUNT(*) as cuenta FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and promedio.periodo_idPeriodo=1 and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1  and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='PROYECTO' and notap.materia_idMateria=promedioanual.materia_idMateria
           order by promedioanual.valor DESC  ");
                    $this->listaNotasP1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
                on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
                inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
                on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
    alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
                where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
                and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
            and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");

                $this->listaNotasM1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
          
                $this->listaNotasES1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO1 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR1   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN1  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=1 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** PRIMER PERIODO [FIN] *******************/
                /**************************** SEGUNDO PERIODO [inicio]*******************/
                $this->listaNotasP2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'   and alumno.sede = '$globalSede'
          and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasM2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasES2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF 
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula    inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO2 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR2   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN2  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=2 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** SEGUNDO PERIODO [FIN] *******************/
                /**************************** TERCER PERIODO [INICIO] *******************/
                $this->listaNotasP3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasM3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasES3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula  inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO3 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR3   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN3  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=3 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** TERCER PERIODO [FIN] *******************/
                /**************************** CUARTO PERIODO [inicio]*******************/
                $this->listaNotasP4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula    inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='PROYECTO' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasM4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='MATEMATICAS' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasES4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ESPAÑOL' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasQ4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='QUIMICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasI4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INGLES' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasEF4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='EDUCACION FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasFI4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FILOSOFIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasA4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ARTISTICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasE4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ETICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasECO4 = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='ECONOMIA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasF4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='FISICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc");
                $this->listaNotasR4   = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula    inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='RELIGION' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                $this->listaNotasIN4  = $notap->find_all_by_sql("SELECT * FROM alumno inner join notap 
            on alumno.idAlumno = notap.alumno_idAlumno inner join materia on notap.materia_idMateria=materia.idMateria
            inner join periodo on notap.periodo_idPeriodo=periodo.idPeriodo inner join promedio 
            on alumno.idAlumno=promedio.alumno_idAlumno inner join estado on
   alumno.estado_idEstado= estado.idEstado inner join matricula   on alumno.matricula_idMatricula=matricula.idMatricula   inner join promedioanual on notap.alumno_idAlumno=promedioanual.alumno_idAlumno  
            where alumno.grado_idGrado=$gradoF and matricula.anio_idAnio=$anioEstudiantes
            and notap.anio_idAnio=$anioGlobal and periodo.numeroPeriodo=4 and estado.tipoEstado='Activo'  and alumno.sede = '$globalSede'
          and materia.nombreMateria='INFORMATICA' GROUP by alumno.idAlumno  order by promedioanual.valor desc ");
                /**************************** PRIMER PERIODO [FIN] *******************/
                /**************************** CUARTO PERIODO [FIN] *******************/
                View::select("listar2");
            }
        }

        /* HAS POST*/
    } // End index

    public function listar()
    {
        $this->titulo      = "Gestión de Logros";
        $this->subtitulo   = "Cada materia tendrá 2 logros por periodo.";
        $this->informacion = "Filtre y edite los logros dependiendo de el requerimiento de la materia.";


       
        View::select('listar');
    }// END listar
   

} // END Logros Controller
