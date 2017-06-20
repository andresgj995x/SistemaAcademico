<?php

class Periodo extends ActiveRecord{

	public function getPeriodos($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idPeriodo asc');
	}

	public function getAllPeriodos(){
		return $this->paginate("page: 1", 'order: idPeriodo asc');
	}


   public function getNumAnio($num,$anio){


   return $this->paginate( "page:1","numeroPeriodo = $num and anio_idAnio=$anio" ,'order:grado_idGrado asc');
   }
	

}