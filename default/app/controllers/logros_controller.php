<?php 

View::template('sbadmin');
session_start();

class LogrosController extends AppController{



	public function index(){

		$this->titulo = "Gestión de Logros";
		$this->subtitulo = "Cada materia tendrá 2 logros por periodo.";
		$this->informacion = "Filtre y edite los logros dependiendo de el requerimiento de la materia.";

		$materia = new Materia();
		$logro= new Logros();

		if(Input::hasPost('periodoA')){

         // recojamos las variables que llegan

			$gradoLogro=Input::post('gradoF');
			$this->selectorG=$gradoLogro;


			$nombreMateria=Input::post('materiaF');
			$this->selectorM=$nombreMateria;



			$sql="SELECT * FROM logros inner join materia on logros.materia_idMateria=materia.idMateria 
			where materia.nombreMateria ='$nombreMateria' and materia.gradoMateria =$gradoLogro";
			$this->listaLogros=$logro->find_all_by_sql($sql);


			View::select('listar');

		}



}// End index

public function listar(){

	$this->titulo = "Gestión de Logros";
	$this->subtitulo = "Cada materia tendrá 2 logros por periodo.";
	$this->informacion = "Filtre y edite los logros dependiendo de el requerimiento de la materia.";

	$this->listaLogros=$_SESSION['listaLogros'];
	$this->selectorM=$_SESSION['selectorM'];
	$this->selectorG=$_SESSION['selectorG'];



	View::select('listar');

}

public function edit($idLogro){

	$this->titulo = "Gestión de Logros";
	$this->subtitulo = "Cambie las fortalezas y debilidades según sea requerido.";
	$this->informacion = "Asegúrese de editar el logro en la materia & periodo correspondiente.";

	$logro = new Logros();
	$materia = new Materia();
	$profesor = new Profesor();

	$this->logro=$logro->find($idLogro);

	$logroTemp=$logro->find($idLogro);
    $materiaTemp=$materia->find($logroTemp->materia_idMateria);
    $this->materia=$materia->find($logroTemp->materia_idMateria);
    $this->profesor= $profesor->find($materiaTemp->profesor_idPro);



         if(Input::hasPost('periodoA')){


           $fortaleza=Input::post('fortalezaF');
           $debilidad=Input::post('debilidadF');

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";


            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn->set_charset("utf8");

            if ($conn->connect_error) {
                die("Falló la conexión de Academic. Revise por favor que tenga  Xampp corriendo en su equipo.: " . $conn->connect_error);
            }

            $sql = "UPDATE logros SET fortaleza='$fortaleza',debilidad='$debilidad' WHERE idLogro=$idLogro";

            if ($conn->query($sql) === TRUE) {

            	$nombreMateria=$_SESSION['selectorM'];
	            $gradoLogro=$_SESSION['selectorG'];

	            $this->selectorM=$_SESSION['selectorM'];
	            $this->selectorG=$_SESSION['selectorG'];

                Flash::valid('El logro se actualizó correctamente.');

               $sql="SELECT * FROM logros inner join materia on logros.materia_idMateria=materia.idMateria 
			where materia.nombreMateria ='$nombreMateria' and materia.gradoMateria =$gradoLogro";
			$this->listaLogros=$logro->find_all_by_sql($sql);


                View::select("listar");
            } else {

                echo "Error al actualizar los datos: " . $conn->error;
                Flash::error('Hubo un error al actualizar los datos.. Verifique los valores por favor...');
                Redirect::to('logros/index');
            }

            $conn->close();

         }
         else{

         	View::select('edit');
         }



}



}// END Logros Controller


?>