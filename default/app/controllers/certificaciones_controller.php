<?php
View::template('sbadmin');
session_start();
date_default_timezone_set("America/Bogota");
class CertificacionesController extends AppController
{
    public function index()
    {
        $this->titulo         = "Busca al estudiante";
        $this->subtitulo      = "Genera certificados para ellos(as)";
        $this->informacion    = "Busque al estudiante de la manera que prefiera(escoger una)";
        $this->listaPacientes = null;

          $sedeGlobal = $_SESSION['globalSede'];
          $globalYear = $_SESSION['globalYear'];


        if (Input::hasPost("valN")) {
            $paciente             = new ALumno();
            $nombreP              = Input::post("nombreP");
            $sql                  = "SELECT *, TIMESTAMPDIFF(YEAR,nacimiento,CURDATE()) 
            AS edad from alumno  inner join 
                        estado on estado_idEstado=idEstado inner join matricula on 
                        matricula_idMatricula=idMatricula  where nombre like '%$nombreP%' and matricula.anio_idAnio=$globalYear 
                         and alumno.sede ='$sedeGlobal' and estado.tipoEstado='Activo' ";
            $this->listaPacientes = $paciente->find_all_by_sql($sql);
            if ($this->listaPacientes == null) {
                Flash::error('Alumno no encontrado, por favor pruebe nuevamente con otro nombre, apellido ó cédula.');
            } else {
                Flash::valid('Lista de alumnos encontrados....');
            }
        } // End buscar por nombres
        if (Input::hasPost("valA")) {
            $paciente             = new ALumno();
            $nombreP              = Input::post("apellidoP");
            $sql                  = "SELECT *, TIMESTAMPDIFF(YEAR,nacimiento,CURDATE()) 
            AS edad from alumno  inner join 
                        estado on estado_idEstado=idEstado inner join matricula on 
                        matricula_idMatricula=idMatricula  where apellido like '%$nombreP%' and matricula.anio_idAnio=$globalYear 
                         and alumno.sede ='$sedeGlobal' and estado.tipoEstado='Activo' ";
            $this->listaPacientes = $paciente->find_all_by_sql($sql);
            if ($this->listaPacientes == null) {
                Flash::error('Alumno no encontrado, por favor pruebe nuevamente con otro nombre, apellido ó cédula.');
            } else {
                Flash::valid('Lista de alumnos encontrados....');
            }
        } // End buscar por nombres
        if (Input::hasPost("valI")) {
            $paciente             = new Pacientes();
            $nombreP              = Input::post("cedulaP");
            $sql                  = "SELECT *, TIMESTAMPDIFF(YEAR,nacimiento,CURDATE()) 
            AS edad from alumno  inner join 
                        estado on estado_idEstado=idEstado inner join matricula on 
                        matricula_idMatricula=idMatricula  where identidadAl = $nombreP and matricula.anio_idAnio=$globalYear 
                         and alumno.sede ='$sedeGlobal' and estado.tipoEstado='Activo' ";
            $this->listaPacientes = $paciente->find_all_by_sql($sql);
            if ($this->listaPacientes == null) {
                Flash::error('Alumno no encontrado, por favor pruebe nuevamente con otro nombre, apellido ó cédula.');
            } else {
                Flash::valid('Lista de alumnos encontrados....');
            }
        } // End buscar por nombres
    } // Fin FUNCION INDEX
    public function nuevoCertificado($idPaciente)
    {
        $this->titulo      = "Certificaciones";
        $this->subtitulo   = "Escoga el tipo de certificado";
        $this->informacion = "Introduzca los datos que se le piden correctamente.";
        $paciente          = new Alumno();
        $paciente2         = $paciente->find($idPaciente);
        $this->paciente    = $paciente->find($idPaciente);
        $grado1            = new Grado();
        $this->nombreGrado = $grado1->find(3);
        if (Input::hasPost('temp')) {
            $this->ciudadExp   = Input::post("lugarExpedicion");
            //$this->fechaExp =  date("Y-m-d");
            $this->razon       = Input::post("reason");
            $this->direccion   = Input::post('direccion');
            $this->fechaExp    = Input::post('fechaCer');
            $this->fechaPedida = Input::post('fechaPedida');
            View::select('imprimir_certificado');
        }
    }
    public function nuevoLaboral($idPaciente)
    {
        $this->titulo      = "Certificaciones";
        $this->subtitulo   = "Certificaciones Laborales.";
        $this->informacion = "Introduzca los datos que se le piden correctamente.";
        $paciente          = new Pacientes();
        $this->paciente    = $paciente->find($idPaciente);
        if (Input::hasPost('temp')) {
            $this->ciudadExp = Input::post("lugarExpedicion");
            //$this->fechaExp =  date("Y-m-d");
            $this->razon     = Input::post("reason");
            $this->fechaExp  = Input::post('fechaCer');
            $this->dirCon    = Input::post('dirCon');
            $this->telCon    = Input::post('telCon');
            $this->celCon    = Input::post('celCon');
            // $this->fechaPedida= Input::post('fechaPedida');
            View::select('imprimirLaboral');
        }
    }
}