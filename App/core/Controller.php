<?php

namespace App\core;

    //******** Controller Base ********

class Controller{

    // model
    public function model($model){

        require_once "../App/models/". $model.".php";// carregar model
        return new $model;// transformar em objeto

    }
 
    
    // view
    public function view($view , $data = []){

        require_once "../App/views/template.php";

    }

}
