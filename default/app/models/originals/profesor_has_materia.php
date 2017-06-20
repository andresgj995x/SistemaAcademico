<?php

class Profesor_has_materia extends ActiveRecord{

	public function get_Pmaterias(){
		return $this->paginate("page: 1", 'order: materia_idMateria desc');
	}

}