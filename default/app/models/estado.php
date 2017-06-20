<?php

class Estado extends ActiveRecord{

	public function getEstados($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idEstado asc');
	}

	public function getAllEstados(){
		return $this->paginate("page: 1", 'order: idEstado asc');
	}

	

}