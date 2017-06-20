<?php

class Grado extends ActiveRecord{

	public function initialize()
    {
        //Relaciones
        //Un especialidad tiene muchos profesionales
        $this->has_many('alumno');
    }

	public function getGrados($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idGrado asc');
	}

	public function getAllGrados($page=1, $ppage=14){

		$sql="SELECT * from grado";
		return $this->paginate_by_sql($sql,"page: $page", "per_page: $ppage", 'order: idGrado asc');
	}

	

}