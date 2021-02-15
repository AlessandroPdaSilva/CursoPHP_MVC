<?php

namespace App\core;

class App
{

    // var
    protected $controllers = "home";
    protected $method = "index";
    protected $params = [];


    // metodos
    
    public function parseURL()
    { // pega url
        return explode("/", filter_var($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], FILTER_SANITIZE_URL));
    }


    // paginacao 
    public function currentURL(){

        return "http://localhost:8080/home/index/";

    }



    // contrutor
    function __construct()
    {

        $url = $this->parseURL();

        
        // controller exist(file.php)
        if (file_exists("../App/controllers/" . $url[1] . ".php")) { 

            $this->controllers = $url[1];
            unset($url[1]);


            
        }else if(empty($url[1]) ){
            $this->controllers = "home";
            unset($url[1]);
        }else {
            $this->controllers = "erro404";
            unset($url[1]);
        }


        // metodos exist(function)
        require_once "../App/controllers/" . $this->controllers . ".php";
        $this->controllers = new $this->controllers();


        if (isset($url[2])) { 

            if (method_exists($this->controllers, $url[2])) {

                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }
        }



        
        // parametros exist(dentro da function)
        $this->params = $url ? array_values($url) : []; 



        // montando url
        call_user_func_array([$this-> controllers, $this-> method], $this-> params);
    }












}
