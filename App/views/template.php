<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso em MVC</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    

</head>
<body>

    <!-- ********  template  ********* -->



    <!-- navegacao -->
    <nav class="green">
    <div class="nav-wrapper container">
      <a href="/" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/"> home </a></li>

        <!-- logado -->
        <?php if(!isset($_SESSION['logado']) ){ ?>
        <li><a href="/home/login"> login</a> </li>
        <?php }else{ ?>
        
        <li><a href="/notes/criar"> Criar bloco </a></li>

            <!-- cadastrar usuario -->
        <?php  if($_SESSION['level'] >= 2){   ?>  
        
        <li><a href="/users/cadastrar"> Cadastrar Usuario </a></li> 

        <?php }?>

            <!-- logout -->
        <li><a href="/home/logout"> logout </a></li>
Olá <?php echo $_SESSION['userNome']; ?>
        <?php }?>










      </ul>
    </div>
  </nav>













    <!-- corpo -->

    <div class="row container">

    <?php require_once "../App/views/". $view .".php"?>

    </div>









    
<!-- Compiled and minified JavaScript -->
    <script >
        M.AutoInit();
    </script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>