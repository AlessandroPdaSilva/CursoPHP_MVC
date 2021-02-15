<?php

use App\core\Model;

class Note extends \App\core\Model{

    public $titulo;
    public $texto;
    public $imagem;

    public function getAll(){
        
        // query
        $sql = "SELECT * FROM notes";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> execute();

        if( $stmt-> rowCount() > 0){// conferir

            $resultado = $stmt-> fetchAll(PDO::FETCH_ASSOC); 
            return $resultado;
        }else{
            return [];
        }

    }

    public function findId($id){

        // query
        $sql = "SELECT * FROM notes WHERE id = ?";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,$id);
        $stmt-> execute();

        if( $stmt-> rowCount() > 0){// conferir

            $resultado = $stmt-> fetch(PDO::FETCH_ASSOC); 
            return $resultado;
        }else{
            return [];
        }

    }


    public function save(){

        $sql = "INSERT INTO notes(titulo,texto,imagem) VALUES(?,?,?)";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,$this-> titulo);
        $stmt-> bindValue(2,$this-> texto);
        $stmt-> bindValue(3,$this-> imagem);


        if($stmt-> execute() ){
            return "cadastrado com sucesso";
        }else{
            return "erro";
        }

    }

    public function delete($id){

        // deletando
        $sql = "DELETE FROM notes WHERE id = ?";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,$id);


        if($stmt-> execute()){
            return "excluido com sucesso ";
        }else{
            return "erro";
        }

    }

    public function update($id){
        $sql = "UPDATE notes SET titulo = ? , texto = ? WHERE id = ?";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,$this-> titulo);
        $stmt-> bindValue(2,$this-> texto);
        $stmt-> bindValue(3,$id);


        if($stmt-> execute() ){
            return "editado com sucesso";
        }else{
            return "erro";
        }
    }

    public function updateImg($id){
        $sql = "UPDATE notes SET titulo = ? , texto = ?, imagem = ? WHERE id = ?";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,$this-> titulo);
        $stmt-> bindValue(2,$this-> texto);
        $stmt-> bindValue(3,$this-> imagem);
        $stmt-> bindValue(4,$id);


        if($stmt-> execute() ){
            return "editado com sucesso";
        }else{
            return "erro";
        }
    }

    public function search($busca){

        
        $sql = "SELECT * FROM notes WHERE titulo LIKE ? ";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,"%{$busca}%");
        $stmt-> execute();

        if( $stmt-> rowCount() > 0){// conferir

            $resultado = $stmt-> fetchAll(PDO::FETCH_ASSOC); 
            return $resultado;
        }else{
            return [];
        }

    }

    public function deleteImg($id){
        $sql = "UPDATE notes SET imagem = ? WHERE id = ?";
        $stmt = self::getConn()-> prepare($sql);
        $stmt-> bindValue(1,"");
        $stmt-> bindValue(2,$id);

        if($stmt-> execute() ){
            return "imagem deletada com sucesso";
        }else{
            return "erro";
        }   
            
    }
}


    