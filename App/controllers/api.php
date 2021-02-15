<?php

use App\core\Model;

class Api extends \App\core\Controller{

	public function notes(){
		// model
		$note = $this-> model("Note");
		$dados = $note-> getAll();

		// API
		header("Content-type: application/json; charset:utf-8");
		echo json_encode($dados);
	}

}