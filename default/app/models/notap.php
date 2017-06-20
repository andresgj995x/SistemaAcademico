<?php

class Notap extends ActiveRecord{

	public function getNotas($page, $ppage){
		return $this->paginate("page: $page", "per_page: $ppage", 'order: idNotaP desc');
	}
}