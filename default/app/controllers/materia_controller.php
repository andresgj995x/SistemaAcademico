<?php

View::template('sbadmin');
Load::models('materia');

Load::models('profesor');

class MateriaController extends AppController {

    public function buscar() {
        $this->titulo = "Gestión de Materias";
        $this->subtitulo = "Busqueda de Materias";
        $this->informacion = "Recuerde que el grado <b>preescolar</b> se representa por el número 13";

   $this->listaMaterias = null;

        if (Input::hasPost("nombresF")) {

            $materia = new Materia();
            $nombreMateria = Input::post("nombresF");
            $sql = "SELECT * FROM materia inner join profesor on materia.profesor_idPro=profesor.IdPro   where materia.nombreMateria like '%$nombreMateria%' order by materia.idMateria";
            $this->listaMaterias = $materia->find_all_by_sql($sql);


            if ($this->listaMaterias == null) {
                Flash::error('Materia no encontrada, pruebe nuevamente con otro primer nombre.');
                Input::delete();
            }
        }




    }

    public function index() {

        $this->titulo = "Gestión de Materias";
        $this->subtitulo = "Materias Registradas";
        $this->informacion = "P.A es un acrónimo de <b>P</b>rofesor <b>A</b>signado";

        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {
                // Inicio código INDEX
                if (Input::hasPost('periodoN')) {

                    $materia = new Materia();

                    $gradoS = Input::post('gradoS');
                    
                    $_SESSION['gradoS'] = $gradoS;

                    $sql = "SELECT * FROM materia inner join profesor on materia.profesor_idPro=profesor.IdPro where materia.gradoMateria=$gradoS order by materia.idMateria ";
                    $this->listaMaterias = $materia->find_all_by_sql($sql);

                    View::select('listar');
                } else {

                    View::select('index');
                }

                // FIN CÓDIGO INDEX
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

    public function edit($idM,$n,$a) {

        $this->titulo = "Gestión de Materias";
        $this->subtitulo = "Actualización de Materia";
        $this->informacion = "En está sección puede actualizar la información de la materia. ";

        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {

                $materia = new Materia();
                $profesor = new Profesor();

                $this->idMat = $idM;
                $this->nombreP=$n;
                $this->apellidoP=$a;



                $this->profesor = $profesor->getAllProfesores();

                if (Input::hasPost('idMateria')) {
                    $this->materia = $materia->find('idMateria');
                    $materia->idMateria = intval(Input::post('idMateria'));
                    $materia->profesor_idPro = Input::post('idPro');
                    $idPro = Input::post('idPro');


                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "mydb";


                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $conn->set_charset("utf8");

                    if ($conn->connect_error) {
                        die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
                    }


                    $sql = "UPDATE materia SET profesor_idPro=$idPro WHERE idMateria=$idM ";


                    if ($conn->query($sql) === TRUE) {
                        
                        Flash::valid('La materia se actualizó satisfactoriamente.');
                        $gradoS = $_SESSION['gradoS'];
                        View::select("listar");

                        $sql = "SELECT * FROM materia inner join profesor on materia.profesor_idPro=profesor.IdPro where materia.gradoMateria=$gradoS order by materia.idMateria";
                        $this->listaMaterias = $materia->find_all_by_sql($sql);
                        View::select("listar");
                        
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }

                    $conn->close();
                } else {
                    $this->materia = $materia->find($idM);
                }
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

    public function listar() {


        $this->titulo = "Gestión de Materias";
        $this->subtitulo = "Materias Registradas";
        $this->informacion = "P.A es un acrónimo de <b>P</b>rofesor <b>A</b>signado";

        session_start();
        $materia = new Materia();

        $gradoS = $_SESSION['gradoS'];
        $sql = "SELECT * FROM materia inner join profesor on materia.profesor_idPro=profesor.IdPro where materia.gradoMateria=$gradoS order by materia.idMateria ";
        $this->listaMaterias = $materia->find_all_by_sql($sql);
        View::select("listar");
    }

    public function buscarProfesor($id) {
        $this->titulo = "Gestión de Materias";
        $this->subtitulo = "Buscar Profesor para Asignar";
        $this->informacion = "En está sección puede buscar un profesor por medio de su documento de identificación para asignarlo a una materia.";

        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {
                $this->idmateria = $id;
                if (Input::hasPost("profesor_idProfesor")) {
                    /* $asignarmateria = new Profesor_has_materia();
                      $asignarmateria->materia_idMateria = $id;
                      $asignarmateria->profesor_idProfesor = Input::post('profesor_idProfesor');
                     */
                    $profesor = new Profesor();
                    $this->profesor = $profesor->find(Input::post("profesor_idProfesor"));
                    if ($profesor->nombres != null) {
                        $this->idmateria = $id;
                    } else {
                        Flash::error('Profesor no encontrado para asignar materia.');
                    }
                }
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

    public function asignar() {
        $this->titulo = "Gestión de Materias";
        $this->subtitulo = "Asignar Profesor a Curso Completo";
        $this->informacion = "Aquí podrás Asignar un profesor a un curso entero. ";

        $materias = new Materia();
        $profesor = new Profesor();
       
        // View::select("index");
        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {
               

            
            $this->gradoS=$_SESSION['gradoS'];
            $this->profesor = $profesor->getAllProfesores();



            if(Input::hasPost('idGrado')){


                $gFinal= intval(Input::post('idGrado'));

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "mydb";

                    $idPro=intval(Input::post('idPro'));


                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $conn->set_charset("utf8");

                    if ($conn->connect_error) {
                        die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
                    }


                    $sql = "UPDATE materia SET profesor_idPro=$idPro WHERE gradoMateria=$gFinal ";


                    if ($conn->query($sql) === TRUE) {
                        
                        Flash::valid('El profesor se asignó al grado actual correctamente');
                        $gradoS = $_SESSION['gradoS'];
                        
                         $materia = new Materia();
                        $sql = "SELECT * FROM materia inner join profesor on materia.profesor_idPro=profesor.IdPro where materia.gradoMateria=$gradoS order by materia.idMateria";
                        $this->listaMaterias = $materia->find_all_by_sql($sql);
                        View::select("listar");
                        
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }

                    $conn->close();


// Fin código lotes

            }else{



            }



            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

  
}
