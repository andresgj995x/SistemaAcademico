<?php

class Alumno extends ActiveRecord{

	public function getAlumnos($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: grado asc');
	}

	public function getAlumnosporGrado($page, $ppage, $grado){
		return $this->paginate("page: $page", "grado = $grado", "per_page: $ppage", 'order: grado asc');
	}
	public function getAllalumnos(){
		return $this->paginate("page: 1", 'order: grado asc');
	}

	public function obtenerAlumnosNombre($page, $ppage,$nombreAlumno){

       return $this->paginate( "page:$page","nombres like '$nombreAlumno%'" ,"per_page:$ppage",'order:grado asc');
	}

}