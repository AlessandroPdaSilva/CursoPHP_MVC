<?php

namespace App;

class Auth extends \App\core\model{

	public static function login($email,$senha){
		
		// query
		$sql = "SELECT * FROM users WHERE email = ?";
		$stmt = self::getConn() -> prepare($sql);
		$stmt-> bindValue(1,$email);
		$stmt-> execute();


		
		// email exists
		if($stmt-> rowCount() >= 1){

			$resultado = $stmt-> fetch(\PDO::FETCH_ASSOC);
			// senha exist

			if( password_verify($senha, $resultado['senha'])){

				$_SESSION['logado'] = true;
				$_SESSION['userId'] = $resultado['id'];
				$_SESSION['userNome'] = $resultado['nome'];
				$_SESSION['level'] = $resultado['level'];

				header("location: home/index");
				}else{
				return "senha incorreta";
			}
		}else{
			return "email nao cadastrado";
		}
	}

	public static function logout(){
		session_destroy();
		header("location: /home/login");
	}

	public static function checkLogin(){

		if(!isset($_SESSION['logado']) ){
			header("location: /home/login");
			die;
		}
	}

	public static function checkLoginAdm(){

		if($_SESSION['level'] != 2){
			header("location: /notes/criar");
			die;
		}
	}

}