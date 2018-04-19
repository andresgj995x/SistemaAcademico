<?php 

// Vamos a llamar a algunas funciones para poder actualizar nuestro formulario.


Load::models('nota');
View::template('sbadmin');
Load::models('nota2');
session_start();

class JeisonController extends AppController {

public  function registrarNotas()
 {
        $this->titulo = "Gestión de Notas";
        $this->subtitulo = "Registre,Modifique o elimine  las notas de la Institución Educativa Belén";
       
     
 }

 public function index (){

        $this->titulo = "Gestión de Notas";
        $this->subtitulo = "Registre,Modifique o elimine  las notas de la Institución Educativa Belén";
        $this->informacion = "Por favor seleccione bien el periodo y el grado para modificar las notas de sus respectivos estudiantes.";

         if (Input::hasPost('periodo1','curso1','materia1')) {

              $nota = new Nota();
            $this->periodo = Input::post('periodo1');
            $this->grado = Input::post('grado1');
            $this->materia = Input::post('materia1');
            $sql="SELECT idAlumno,nombres,apellidos,idNota,faltas,taller,pruebaEscrita,laboratorios,evaluacionOral,evaluacionEscrita,puntualidad,presentacionPersonal,comportamiento,interesParticipacion,valorFinal from alumno inner join nota2 on idAlumno=idAlumnoNota inner join nota_final on idNota=nota_idNota ";
            $this->listaNotas=$nota->find_all_by_sql($sql);

            if($this->listaNotas== null) {
                Flash::error('Alumno no encontrado, pruebe nuevamente con otro primer nombre.');
            }

              View::select("listar_notas");
        }


 }


 public function edit($idNota,$idAlumno){

         $nota = new Nota();
        
         $this->titulo = "Gestión de Notas";
         $this->subtitulo = "Registre,Modifique o elimine  las notas de la Institución Educativa Belén";
         $this->informacion = "Por favor seleccione bien el periodo y el grado para modificar las notas de sus respectivos estudiantes.";
         $alumno2 = new Alumno();

            $sql="SELECT * from nota2 where idNota ='$idNota'";
            $this->listaNotaB=$nota->find_by_sql($sql);

            if($this->listaNotaB== null) {
                Flash::error('Nota no encontrada!.');
            }


            $sql2="SELECT * from alumno where idAlumno ='$idAlumno'";
            $this->alumnoB=$nota->find_by_sql($sql2);

            if($this->alumnoB== null) {
                Flash::error('Alumno con nota no encontrados!.');
            }

              $nota2 = new Nota2();
            if($idNota != null){

            //Aplicando la autocarga de objeto, para comenzar la edición

            
        }

             if (Input::hasPost('faltasF', 'tallerF', 'pEscritaF', 'labsF', 'eOralF', 'eEscritaF', 'punF', 'pPersonalF', 'compF','ipF     '))
              { 

                $this->nota2 = $nota2->find(Input::post("idNotaF"));              
                $nota2->faltas = Input::post('faltasF');
                $nota2->taller = Input::post('tallerF');
                $nota2->pruebaEscrita = Input::post('pEscritaF');
                $nota2->laboratorios = Input::post('labsF');
                $nota2->evaluacionOral = Input::post('eOralF');
                $nota2->evaluacionEscrita = Input::post('eEscritaF');
                $nota2->puntualidad = Input::post('punF');
                $nota2->presentacionPersonal = Input::post('pPersonalF');
                $nota2->comportamiento = Input::post('compF');
                $nota2->interesParticipacion = Input::post('ipF');
                 
                 if($nota2->update(Input::post('idNotaF'))){
                 Flash::valid('La nota se cambió correctamente');
                //enrutando por defecto al index del controller
                     $sql4="SELECT idAlumno,nombres,apellidos,idNota,faltas,taller,pruebaEscrita,laboratorios,evaluacionOral,evaluacionEscrita,puntualidad,presentacionPersonal,comportamiento,interesParticipacion,valorFinal from alumno inner join nota2 on idAlumno=idAlumnoNota inner join nota_final on idNota=nota_idNota ";
            $this->listaNotas=$nota->find_all_by_sql($sql4);

            if($this->listaNotas== null) {
                Flash::error('Alumno no encontrado, pruebe nuevamente con otro primer nombre.');
            }

              View::select("listar_notas");
        }
        else {
                Flash::error('Error al actualizar nota');
            }
            } 


        } // Fin If

// Fin de funcion edit
}
   


?>