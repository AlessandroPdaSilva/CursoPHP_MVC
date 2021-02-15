<h1> Criar bloco de anotação </h1>

<?php 
// mensagem
    if( !empty( $data['mensagem'] ) ){

        foreach($data['mensagem'] as $value){
            echo $value."<br>";
        }

    }
?>

<!-- criar registros -->
<form action="/notes/criar" method="POST" enctype="multipart/form-data">
    Titulo: <input type="text" name="titulo"><br>
    Texto: <textarea name="texto" id="" cols="30" rows="10"></textarea><br>
    Imagem: <input type="file" name="foo" value=""/><br>

    <button name="cadastrar"> cadastrar</button><br>
</form>