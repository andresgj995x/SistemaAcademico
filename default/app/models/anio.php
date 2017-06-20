<?php

class Anio extends ActiveRecord{

	public function getAnios($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idAnio asc');
	}

	public function getAllAnios(){
		return $this->paginate("page: 1", 'order: idAnio asc');
	}

	

}