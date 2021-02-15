<h1> Login </h1>
<?php 
// mensagem

if( !empty( $data['mensagem'] ) ){

    foreach ($data['mensagem'] as $value) {
    	echo $value;
    }
}
?>

<!-- form -->
<form action="/home/login" method="POST">

	<!-- email -->
	<div class="row">
        <div class="input-field col s12">
          <input name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
    </div>


    <!-- senha -->
	<div class="row">
       <div class="input-field col s12">
        	<input name="senha" id="password" type="password" class="validate">
        	<label for="password">Password</label>
     	</div>
    </div> 


	<button class="waves-effect waves-light btn green" name="entrar"> Entrar </button>
</form>
