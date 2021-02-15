
<nav>
    <div class="nav-wrapper">
      <form action="/home/buscar" method="POST">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>


<?php 
// mensagem
if( !empty( $data['mensagem'] ) ){

    echo $data['mensagem'];

}
?>

<?php

// paginacao objeto
$pagination = new App\Pagination($data['registro'], isset($_GET['page']) ? $_GET['page'] : 1, 5);
$pagination-> resultado();


// nenhum registro
if(empty($pagination-> resultado())){
	echo " Nenhum registro encontrado";
}


?>



<?php 

// registros
foreach($pagination->resultado() as $value){ ?>


	<!-- titulo -->
<h1><a href="/notes/ver/<?php echo $value['id'];?>" >  <?php echo $value['titulo']; ?> </a> </h1>

	<!-- texto -->
<p> <?php echo $value['texto']?></p>

  <!-- imagem -->
<?php if($value['imagem'] != "" ){

  ?><img src="/uploads/<?php echo $value['imagem']; ?>" width="200"><br><br><?php
  }else{
    echo "";
  }
  ?>






	<!-- logado -->
<?php if(isset($_SESSION['logado']) ){ ?>
 
<a class="waves-effect waves-light btn orange" href="/notes/editar/<?php echo $value['id']?>"> editar </a>
<a class="waves-effect waves-light btn red" href="/notes/excluir/<?php echo $value['id'];?>"> excluir</a>
<?php }?>


<?php } ?>


<?php

// paginação
$pagination->navigator(); 


?>
