<?php

View::template('sbadmin');
session_start();

class InicioController extends AppController {

    public function index() {
        $this->titulo = "Sistema Académico";
        $this->subtitulo = "Institución Educativa Belén";
        $this->informacion = "Sección principal del Sistema Academico.";

        
        if($_SESSION['globalYear']==null){

            $_SESSION['globalYear']=date("Y");
        }else{

            $_SESSION['globalYear']=$_SESSION['globalYear'];

        }

          if($_SESSION['globalSede']==null){

            $_SESSION['globalSede']='belen';
        }else{

            $_SESSION['globalSede']=$_SESSION['globalSede'];

        }

        /* Variables globales para la conexión SQL propia */
                    $_SESSION['servername'] = "localhost";
                    $_SESSION['username']   = "root";
                    $_SESSION['password']   = "";
                    $_SESSION['dbname']     = "mydb";

        /* Para que el proyecto funcione se debe cambiar la database en
        
            /config/database.ini y este archivo.
        */

    }
    
    public function acerca() {
        $this->titulo = "Sistema Académico";
        $this->subtitulo = "Institución Educativa Belén";
        $this->informacion = "información sobre el estado del Sistema Académico.";
    }

}
