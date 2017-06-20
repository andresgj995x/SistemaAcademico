<?php

class Alumno_has_materia extends ActiveRecord{
	public function get_Amaterias(){
		return $this->paginate("page: 1", 'order: materia_idMateria desc');
	}
}