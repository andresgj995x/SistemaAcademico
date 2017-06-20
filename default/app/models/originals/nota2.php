<?php

class Nota2 extends ActiveRecord{

	public function getNotas($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idNota desc');
	}
}
?>