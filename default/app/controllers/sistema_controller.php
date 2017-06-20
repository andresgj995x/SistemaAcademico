<?php

Load::models('profesor');
Load::models('semestre');
Load::models('periodo');
Load::models('usuarios');
Load::models('anio');

View::template('sbadmin');
// Vamos a comenzar con el Sistema Controller

class SistemaController extends AppController {

    public function buscar() {
        $this->titulo = "Gestión de Años Lectivos";
        $this->subtitulo = "Por favor introduzca el año actual en formáto de 4 cifras: Ej = 2018 .";
        $this->informacion = "Aquí podrás Crear años lectivos para el correcto enlazamiento de la información respectiva.";
        

        $this->listaLectivos=null;

        if(Input::hasPost("anioF")){
            $anio= new Anio();
            $numeroAnio= Input::post("anioF");
             $sql="SELECT * from anio where numeroAnio = '$numeroAnio'";
            
            $this->listaLectivos=$anio->find_all_by_sql($sql);

            if($this->listaLectivos== null) {
                Flash::error('Año no encontrado, pruebe nuevamente con otro primer nombre.');
            }
        }else {
             
                Input::delete();

        }
        
    }

    public function index($page = 1) {

        $this->titulo = "Gestión de Años Lectivos";
        $this->subtitulo = "Asegúrese de que el año actual se encuentra en la lista.";
        $this->informacion = "Aquí podrás consultar los años de los que se tiene información en Academic.";

        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {

                $anio = new Anio();
                //$this->data = $profesores->find_all_by_sql(" SELECT * FROM profesor ", "limit = 1");
                //	$this->nombre = $this->data->nombres;
                $this->listaLectivos = $anio->getAnios($page, 10);
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

    public function create() {

        $this->titulo = "Gestión de Años Lectivos";
        $this->subtitulo = "Asegúrese de que el año actual se encuentra en la lista.";
        $this->informacion = "Aquí podrás consultar los años de los que se tiene información en Academic.";

        if(Auth::is_valid()){
            $tipo = Auth::get('rol');
                if($tipo != null && $tipo == 1) {

            if (Input::hasPost( "anioF", "rectoraF")) {
              

                      $anio = new anio();

                      $semestre1 = new Semestre();
                      $semestre2 = new Semestre();

                      $periodo1 = new Periodo();
                      $periodo2 = new Periodo();
                      $periodo3 = new Periodo();
                      $periodo4 = new Periodo();

                      $matricula1= new Matricula();
                      $matricula2= new Matricula();
                      $matricula3= new Matricula();
                      $matricula4= new Matricula();

                      $matricula1->idMatricula=(Input::post('anioF')+1)*2;
                      $matricula1->estadoMatricula="Inicial";
                      $matricula1->anio_idAnio=Input::post('anioF');

                      $matricula2->idMatricula=Input::post('anioF')*2;
                      $matricula2->estadoMatricula="Extraordinaria";
                      $matricula2->anio_idAnio=Input::post('anioF');

                      $num_aleatorio = rand(1,100000000);
                      $num_aleatorio2 = rand(1,1000000000);
                      
                      $matricula3->idMatricula=$num_aleatorio;
                      $matricula3->estadoMatricula="Trasladado";
                      $matricula3->anio_idAnio=Input::post('anioF');

                      $matricula4->idMatricula=$num_aleatorio2;
                      $matricula4->estadoMatricula="Desertor";
                      $matricula4->anio_idAnio=Input::post('anioF');


                    $anio->idAnio = Input::post('anioF');
                    $anio->numeroAnio = Input::post('anioF');
                    $anio->anioRectora = Input::post('rectoraF');
                     
                    $semestre1->idSemestre=(Input::post('anioF')+1)*2;
                    $semestre1->numeroSemestre=1;
                    $semestre1->anio_idAnio=Input::post('anioF');

                    $semestre2->idSemestre=Input::post('anioF')*2;
                    $semestre2->numeroSemestre=2;
                    $semestre2->anio_idAnio=Input::post('anioF'); 
                     
                    $periodo1->numeroPeriodo=1;
                    $periodo2->numeroPeriodo=2;
                    $periodo3->numeroPeriodo=3;
                    $periodo4->numeroPeriodo=4;

                    $periodo1->anio_idAnio=Input::post('anioF');
                    $periodo2->anio_idAnio=Input::post('anioF');
                    $periodo3->anio_idAnio=Input::post('anioF');
                    $periodo4->anio_idAnio=Input::post('anioF'); 


                     $anio->save();
                     $semestre1->save();
                     $semestre2->save();
                     $periodo1->save();
                     $periodo2->save();
                     $periodo3->save();
                     $periodo4->save();

                     $matricula1->save();
                     $matricula2->save();
                     $matricula3->save();
                     $matricula4->save();
                    

                if (!$anio->save() and !$semestre1->save() and !$semestre2->save() and !$periodo1->save() and !$periodo2->save() and !$periodo3->save() and !$periodo4->save() and !$matricula1->save() and !$matricula2->save() and !$matricula3->save() and !$matricula4->save()) {
                    Flash::error('Hubo un error al crear el nuevo año lectivo. Revise los datos por favor..');
                } else {
                    Flash::valid('Año Lectivo creado correctamente');
                    Input::delete();
                    Redirect::to('sistema/index');
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

        $this->titulo = "Gestión de Años Lectivos";
        $this->subtitulo = "Asegúrese de que el año actual se encuentra en la lista.";
        $this->informacion = "Aquí podrás consultar los años de los que se tiene información en Academic.";

        if (Auth::is_valid()) {
            $tipo = Auth::get('rol');
            if ($tipo != null && $tipo == 1) {
                $anio = new Anio();
                if (Input::hasPost("rectoraF")) {
                    $this->anio = $anio->find(Input::post("idAnioF"));
                    $anio->anioRectora = Input::post('rectoraF');
                   
                    
                    if (!$anio->update(Input::post('idAnio'))) {
                        Flash::error('Error al actualizar la rectora !!');
                    } else {
                        Flash::valid('Se actualizó el/la rector(a) correctamente..!');
                        $this->listaLectivos = $anio->getAnios(1, 10);
                       Redirect::to('sistema/index');
                    }
                } else {
                    $this->anio = $anio->find($id);
                }
            } else {
                Redirect::to('inicio/index');
            }
        } else {
            Redirect::to('usuarios/index');
        }
    }

    

}
