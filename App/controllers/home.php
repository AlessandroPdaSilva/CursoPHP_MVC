<?php

use App\core\Model;
use App\Auth;

class home extends \App\core\Controller{


    // metodos

    public function index(){
        
        // model
        $notes = $this-> Model("Note");
        $data = $notes-> getAll();

        // view
        $this-> view("home/index", $data = ['registro' => $data]);

    }


    public function login(){

		$mensagem = array();

	    // model
    	

   	 	
    
    	// entrar btn
    	if(isset($_POST['entrar']) ){

    		if( (empty($_POST['email'])) or (empty($_POST['senha'])) ){
				$mensagem[] = "Campo email ou senha nao preenchido";
				
    		}else{
    			// pegando valores
    			$email = addslashes($_POST['email']);
    			$senha = addslashes($_POST['senha']);

    			$mensagem[] = Auth::login($email,$senha);
    		}
    		
    	
    	}


    	// view
    	$this-> view("home/login", $data = ['mensagem' => $mensagem]);

    }

    public function logout(){
    	Auth::logout();
    }


    public function buscar(){

        // palavra digitada
        $busca = isset($_POST['search']) ? $_POST['search'] : $_SESSION['search'];
        $_SESSION['search'] = $busca;


        // model        
        $note = $this-> Model("Note");
        $data = $note-> search($busca);

        // view
        $this-> view("home/index", $data = ['registro' => $data]);

    }
}
