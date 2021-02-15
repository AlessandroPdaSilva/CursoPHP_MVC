<?php

namespace App\core;

class Model{

    // conexao com o Banco de Dados
    private static $instance;

    public static function getConn(){

        if( !isset(self::$instance) ){
            self::$instance = new \PDO("mysql:host=localhost;dbname=mvc","adm",1234);
            return self::$instance;
        }else{
            return self::$instance;
        }


    }

}