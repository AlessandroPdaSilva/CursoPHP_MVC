
<?php 
// mensagem
if( !empty( $data['mensagem'] ) ){

    foreach($data['mensagem'] as $value){
        echo $value."<br>";
    }

}
?>

<!-- editar registros -->

<h1> Editar bloco de anotação</h1>


<!-- formulario -->
<form action="" method="POST" enctype="multipart/form-data">
Titulo: <input type="text" name="titulo" value="<?php echo $data['registro']['titulo']?>"><br>
Texto: <textarea name="texto" id="" cols="30" rows="10" ><?php echo $data['registro']['texto']?></textarea><br>

<!-- edit imagem -->

<?php 
	
	if(!empty($data['registro']['imagem'])){

?> 

<img src="/uploads/<?php echo $data['registro']['imagem']; ?>" width="200"> <br>
		
<?php
	// tem imagem
		echo '<button class="btn orange" name="deleteImg"> deletar imagem </button><br>

		<button class="btn" name="atualizar"> atualizar</button><br>';

	}else{
	// nao tem imagem
		echo 'Imagem: <input type="file" name="foo" value=""/><br>

		<button class="btn" name="atualizarImg"> atualizar</button><br>';

	}

?>


</form>
 