<?php

use App\core\Model;
use App\Auth;

class Users extends \App\core\Controller{

	public function cadastrar(){
		Auth::checkLogin();
		Auth::checkLoginAdm();

		// model
		$users = $this-> Model("User");
		$mensagem = array();

		// botao
		if(isset($_POST['cadastrar']) ){

			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);	
			$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

			
			$users-> nome = $nome;
			$users-> email = $nome;
			$users-> senha = $senha;

			$mensagem[] = $users-> save();
		}

		// view
		$this-> view("users/cadastrar", $data = ['mensagem' => $mensagem]);
	}


}