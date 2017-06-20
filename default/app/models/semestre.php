<?php

class Semestre extends ActiveRecord{

	public function getSemestres($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idSemestre asc');
	}

	public function getAllSemestres(){
		return $this->paginate("page: 1", 'order: idSemestre asc');
	}

	

}