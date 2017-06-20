<?php

// Modelo cambiado a mydb

class Profesor extends ActiveRecord{

	public function getProfesores($page,$ppage){

		return $this->paginate("page: $page", "per_page: $ppage", 'order: nombrePro asc');
	}
	

	public function getAllProfesores(){
		return $this->paginate("page: 1", 'order: nombrePro asc');
	}

}