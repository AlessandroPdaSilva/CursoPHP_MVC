<?php

use App\core\Model;
use App\Auth;

class notes extends \App\core\Controller{


    // metodos

    public function ver($id = ""){
        // model
        $notes = $this-> Model("Note");
        $data = $notes-> findId($id);

        // view
        $this-> view("notes/ver", $data);

    }



    public function criar(){
        
        Auth::checkLogin();
        // model
        $notes = $this-> Model("Note");
        $mensagem = array();

        if(isset( $_POST['cadastrar']) ){

            if(empty($_POST['titulo']) || empty($_POST['texto'])){
                $mensagem[] = "um dos campos esta em branco ";
            }else{




                // upload de aquivos 

                $storage = new \Upload\Storage\FileSystem('uploads');
                $file = new \Upload\File('foo', $storage);

                // Optionally you can rename the file on upload
                $new_filename = uniqid();
                $file->setName($new_filename);

                // Validate file upload
                // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                $file->addValidations(array(
                    // Ensure file is of type "image/png"
                    new \Upload\Validation\Mimetype('image/png'),


                    //You can also add multi mimetype validation
                    //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

                    // Ensure file is no larger than 5M (use "B", "K", M", or "G")
                    new \Upload\Validation\Size('5M')
                ));

                // Access data about the file that has been uploaded
                $data = array(
                    'name'       => $file->getNameWithExtension(),
                    'extension'  => $file->getExtension(),
                    'mime'       => $file->getMimetype(),
                    'size'       => $file->getSize(),
                    'md5'        => $file->getMd5(),
                    'dimensions' => $file->getDimensions()
                );

                // Try to upload file
                try {
                    // Success!
                    $file->upload();
                    $mensagem[] = " upload feito com sucesso";
                } catch (\Exception $e) {
                    // Fail!
                    $errors = $file->getErrors();
                    $mensagem[] = implode("<br>",$errors);
                }



                // pegando input
                $titulo = addslashes($_POST['titulo']) ;
                $texto = addslashes($_POST['texto']);
    
                
                // salvando na classe
                $notes-> titulo = $titulo;
                $notes-> texto = $texto;
                $notes-> imagem = $data['name'];

                // executando
                $mensagem[] = $notes-> save();
            }

        }

        
        // view
        $this-> view("notes/criar",$data = ['mensagem' => $mensagem]);
    }


    public function excluir($id = ""){
        Auth::checkLogin();
        $mensagem = array();
        // model
        $notes = $this-> Model("Note");
        $mensagem = $notes-> delete($id);

        $data = $notes-> getAll();
        // view

        $this-> view("home/index", $data = ['registro' => $data,'mensagem' => $mensagem]);
    }

    
    public function editar($id){
        Auth::checkLogin();
        // model
        $notes = $this-> Model("Note");
        $mensagem = array();

        // atualizar botao
        if(isset( $_POST['atualizar']) ){

            if(empty($_POST['titulo']) || empty($_POST['texto'])){
                $mensagem[] = "um dos campos esta em branco ";
            }else{
                $titulo = addslashes($_POST['titulo']) ;
                $texto = addslashes($_POST['texto']);
    
                
    
                $notes-> titulo = $titulo;
                $notes-> texto = $texto;
                $mensagem[] = $notes-> update($id);
            }

        }





        // atualizar * img botao 

        if(isset( $_POST['atualizarImg']) ){

            if(empty($_POST['titulo']) || empty($_POST['texto'])){
                $mensagem[] = "um dos campos esta em branco ";
            }else{




                // upload de aquivos 

                $storage = new \Upload\Storage\FileSystem('uploads');
                $file = new \Upload\File('foo', $storage);

                // Optionally you can rename the file on upload
                $new_filename = uniqid();
                $file->setName($new_filename);

                // Validate file upload
                // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                $file->addValidations(array(
                    // Ensure file is of type "image/png"
                    new \Upload\Validation\Mimetype('image/png'),


                    //You can also add multi mimetype validation
                    //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

                    // Ensure file is no larger than 5M (use "B", "K", M", or "G")
                    new \Upload\Validation\Size('5M')
                ));

                // Access data about the file that has been uploaded
                $data = array(
                    'name'       => $file->getNameWithExtension(),
                    'extension'  => $file->getExtension(),
                    'mime'       => $file->getMimetype(),
                    'size'       => $file->getSize(),
                    'md5'        => $file->getMd5(),
                    'dimensions' => $file->getDimensions()
                );

                // Try to upload file
                try {
                    // Success!
                    $file->upload();
                    $mensagem[] = " upload feito com sucesso";
                } catch (\Exception $e) {
                    // Fail!
                    $errors = $file->getErrors();
                    $mensagem[] = implode("<br>",$errors);
                }



                // pegando input
                $titulo = addslashes($_POST['titulo']) ;
                $texto = addslashes($_POST['texto']);
    
                
                // salvando na classe
                $notes-> titulo = $titulo;
                $notes-> texto = $texto;
                $notes-> imagem = $data['name'];

                // executando
                $mensagem[] = $notes-> updateImg($id);
            }

        }

        // deletar imagem botao
        if(isset($_POST['deleteImg'])){

            // deletando imagem    
            $imagem = $notes-> findId($id);
            unlink("uploads/".$imagem['imagem']);

            // deletando do banco de dados
            $mensagem[] = $notes-> deleteImg($id);

        }

        // view

        $data = $notes-> findId($id);

        $this-> view("notes/editar", $data = ['registro' => $data, 'mensagem' => $mensagem ]);

    }


}