<?php

class Logros extends ActiveRecord{

	public function getLogros($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idLogro asc');
	}

	public function getAllLogros(){
		return $this->paginate("page: 1", 'order: idLogro asc');
	}

	

}