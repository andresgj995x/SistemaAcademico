<?php

class Profesor extends ActiveRecord{

	public function getProfesores($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idProfesor desc');
	}

	public function get_Profesores(){
		return $this->paginate("page: 1", 'order: idProfesor desc');
	}

}