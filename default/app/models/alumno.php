<?php

class Alumno extends ActiveRecord{

	public function getAlumnos($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: grado_idGrado asc');
	}

	public function getAlumnosporGrado($page, $ppage, $grado){
		return $this->paginate("page: $page", "grado_idGrado = $grado", "per_page: $ppage", 'order: grado_idGrado asc');
	}
	public function getAllAlumnos(){
		return $this->paginate("page: 1", 'order: grado_idGrado asc');
	}

	public function obtenerAlumnosNombre($page, $ppage,$nombreAlumno){

       return $this->paginate( "page:$page","nombre like '%$nombreAlumno%'" ,"per_page:$ppage",'order:grado_idGrado asc');
	}

	public function obtenerAlumnosApellidos($page, $ppage,$apellidoAlumno){

       return $this->paginate( "page:$page","nombre like '%$apellidoAlumno%'" ,"per_page:$ppage",'order:grado_idGrado asc');
	}

	public function obtenerAlumnosTipoMatricula($page, $ppage,$tipoMatricula){

       return $this->paginate( "page:$page","matricula_idMatricula ='$tipoMatricula'" ,"per_page:$ppage",'order:grado_idGrado asc');
	}


	 public function getInnerJoin(){
        return $this->find('columns: idAlumno, nombre,apellido,identidadAl,nacimiento,genero,rh,estado_idEstado,genero, condicion, situacion,matricula_idMatricula,nombreGrado',
                           'join: inner join grado on grado_idGrado = idGrado');
    }

}