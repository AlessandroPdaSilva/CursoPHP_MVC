
<h1> Cadastrar usuario </h1>

<?php 
// mensagem
    if( !empty( $data['mensagem'] ) ){

        foreach($data['mensagem'] as $value){
            echo $value."<br>";
        }

    }
?>

<!-- criar registros -->
<form action="/users/cadastrar" method="POST">
    nome: <input type="text" name="nome"><br>
    email: <input type="text" name="email"> <br>
    senha: <input type="password" name="senha"> <br>
    <button name="cadastrar"> cadastrar</button><br>
</form>