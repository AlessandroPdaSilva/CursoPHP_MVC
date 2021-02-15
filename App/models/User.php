<?php

use App\core\Model;

class User extends \App\core\Model{

	public $nome;
	public $email;
	public $senha;

	public function save(){

        $sql = "INSERT INTO users(nome,email,senha) VALUES(?,?,?)";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,$this-> nome);
        $stmt-> bindValue(2,$this-> email);
        $stmt-> bindValue(3,$this-> senha);


        if($stmt-> execute() ){
            return "cadastrado com sucesso";
        }else{
            return "erro";
        }

    }

}