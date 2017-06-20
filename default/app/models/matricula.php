<?php

class Matricula extends ActiveRecord{

	public function getMatricula($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idMatricula asc');
	}

	public function getAllMatriculas(){
		return $this->paginate("page: 1", 'order: anio_idAnio asc');
	}

	

}