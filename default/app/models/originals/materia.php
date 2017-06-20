<?php

class Materia extends ActiveRecord{

	public function getMaterias($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idMateria desc');
	}
}