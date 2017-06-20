<?php

View::template('sbadmin');

class InicioController extends AppController {

    public function index() {
        $this->titulo = "Sistema Académico";
        $this->subtitulo = "Institución Educativa Belén";
        $this->informacion = "Sección principal del Sistema Academico.";
    }
    
    public function acerca() {
        $this->titulo = "Sistema Académico";
        $this->subtitulo = "Institución Educativa Belén";
        $this->informacion = "información sobre el estado del Sistema Académico.";
    }

}
