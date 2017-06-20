<?php

Load::models('profesor');
Load::models('usuarios');
View::template('sbadmin');

class ProfesorController extends AppController {

    public function buscar() {
        $this->titulo = "Gestión de Profesores";
        $this->subtitulo = "Busqueda de Profesores";
        $this->informacion = "En está sección puede buscar todos los profesores con su identificación.";
        

        $this->listaAlumnos=null;

        if (Input::hasPost("nombreProF")) {

            $alumnos= new Alumno();
            $nombrePro= Input::post("nombreProF");
            $sql="SELECT * from profesor where nombrePro like '%$nombrePro%'";
            $this->listaAlumnos=$alumnos->find_all_by_sql($sql);

            if($this->listaAlumnos== null) {
                Flash::error('Profesor no encontrado, pruebe nuevamente con otro primer nombre.');
            }
        }
    }

    public function index($page = 1) {

        $this->titulo = "Gestión de Profesores";
        $this->subtitulo = "Profesores Registrados";
        $this->informacion = "En está sección puede gestionar todos los profesores que han sido registrados.";

        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {

                $profesores = new Profesor();
                //$this->data = $profesores->find_all_by_sql(" SELECT * FROM profesor ", "limit = 1");
                //	$this->nombre = $this->data->nombres;
                $this->listaProfesores = $profesores->getProfesores($page, 10);
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

    public function create() {

        $this->titulo = "Gestión de Profesores";
        $this->subtitulo = "Registro de Profesor";
        $this->informacion = "En está sección puede llevar acabo el registro de un profesor.";

        if(Auth::is_valid()){
            $tipo = Auth::get('rol');
                if($tipo != null && $tipo == 1) {

            if (Input::hasPost( "nombreF", "apellidoF", "idF","estadoF")) {
              

                    $profesor = new Profesor();
                    $profesor->idPro = Input::post('idProF');
                    $profesor->nombrePro = strtoupper(Input::post('nombreF'));
                    $profesor->apellidoPro = strtoupper(Input::post('apellidoF'));
                    $profesor->identidadPro = Input::post('idF');
                    $profesor->estadoPro = Input::post('estadoF');      

                if (!$profesor->save()) {
                    Flash::error('Hubo un error al agrerar el nuevo profesor. Revise los datos por favor..');
                } else {
                    Flash::valid('Profesor guardado correctamente');
                    Input::delete();
                    Redirect::to('profesor/index');
                }
            }
             }else{
                Redirect::to('inicio/index');
            }
        }else{
            Redirect::to('usuarios/index');
        }







    } // Fin Create

    public function edit($id) {

        $this->titulo = "Gestión de Profesores";
        $this->subtitulo = "Actualización de Profesor";
        $this->informacion = "En está sección puede actualizar la información del profesor. ";

        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {
                $profesor = new Profesor();
                
                if (Input::hasPost("nombresF", "apellidosF", "idF","estadoF")) {
                    
                    $this->profesor = $profesor->find(Input::post("idPro"));
                    $profesor->nombrePro = Input::post('nombresF');
                    $profesor->apellidoPro = Input::post('apellidosF');
                    $profesor->identidadPro = Input::post('idF');
                    $profesor->estadoPro = Input::post('estadoF');
                    
                    if (!$profesor->update(Input::post('idPro'))) {
                        Flash::error('No se pudo actualizar el profesor correctamente!');
                    } else {
                        Flash::valid('Se actualizó el profesor!');
                        $this->listaProfesores = $profesor->getProfesores(1, 10);
                       Redirect::to('profesor/index');
                    }
                } else {
                    $this->profesor = $profesor->find($id);
                }
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

    public function del($id) {

        $this->titulo = "Gestión de Profesores";
        $this->subtitulo = "Actualización de Profesor";
        $this->informacion = "En está sección puede actualizar la información del profesor. ";



        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {
                $profesor = new Profesor();
                if (!$profesor->delete($id)) {
                    Flash::error('No se pudo eliminar el profesor.');
                } else {
                    Flash::valid('Se ha eliminado el profesor correctamente');
                }

                $this->listaProfesores = $profesor->getProfesores(1, 10);
                View::select("index");
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

}
