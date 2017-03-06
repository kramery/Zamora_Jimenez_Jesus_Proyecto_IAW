<?php
  session_start();

  $username=$_SESSION["username"];
  $rol=$_SESSION["rol"];
  $dni=$_SESSION["dni"];
  $pass=$_SESSION["pass"];

    if ($_SESSION["rol"]===null){
            session_destroy();
          header("Location:../");
       }

    ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cambiar contraseña</title>

    <!-- Bootstrap Core CSS -->
    <link href="../estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../estilos/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../estilos/css/creative.min.css" rel="stylesheet">
    
    <style>
      span {
        width: 100px;
        display: inline-block;
        text-align: left;
      }
    </style>

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Proyecto php</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a class="page-scroll" href="../sesion/logout.php">Cerrar sesión</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h2 id="homeHeading">Cambiar contraseña</h2>
                <hr>
                    
    <?php
                
		if (!isset($_POST["pass_antigua"])) : ?>
        <form method="post">
            <?php
              //CREATING THE CONNECTION
              $connection = new mysqli("localhost", "root", "", "proyecto");

              //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
              	 printf("Connection failed: %s\n", $connection->connect_error);
   	           exit();
   	         }

             $result = $connection->query("SELECT * FROM usuarios;"); 

            ?>
              
            
            <br>
            
              <span>Antigua contraseña</span><input type="text"  name="pass_antigua" required><br><br/>
              <span>Nueva contraseña </span><input type="text" name="pass_nueva"><br/><br/>
              <input class="btn btn-primary btn-xl page-scroll" name="Submit" value="Enviar" type="submit">
            
        </form>

      <?php else: ?>
      

      <?php
                
      
              $connection = new mysqli("localhost", "root", "", "proyecto");

              //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
              	 printf("Connection failed: %s\n", $connection->connect_error);
   	           exit();
   	         }     
                
                
            if ($pass_actual = $connection->query("select * from usuarios where dni=$dni;")) {
            
                
                } else {
              // En caso de error saco la salida del error.
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
              }
              
                while($obj = $pass_actual->fetch_object()) {
                    
                  //  $pass_actual =  $obj->pass;
                    $obj->pass;
                    
                    // aqui en esta variable almaceno la contraseña antigua encriptada
                    
                    $contra = $obj->pass;
                    
                    // en esta variable almaceno la contraseña introducida codificada en md5, que debe
                    // coincidir con la almacenada en la base de datos.
                    
                    $contrasena2 = md5($_POST['pass_antigua']);
            
             if ($contra!=$contrasena2){
                 
                echo "<h4 id='homeHeading'>Contraseña antigua inválida</h4><br/>";
                echo "<a href='cambiar_pass.php'><h4 id='homeHeading'>Volver intentarlo</h4></a>";

                 
            } else {
                 
            
                 
                $consulta1 = "UPDATE usuarios set pass=md5('$_POST[pass_nueva]') where dni=$dni";

                $result = $connection->query($consulta1);

                if (!$result) {

                    echo "<br/><br/><br/><br/>";
                    echo "<h2 id='homeHeading'>Error en el cambio de la contraseña</h2>";
                    echo "<br/><br/><br/>";


                } else { 

                echo "<br/><br/><br/><br/><br/><br/>";
                echo "<h3 id='homeHeading'>¡Genial! Tu contraseña ha sido actualizada correctamente</h3>";
                echo "<br/><br/>";
                echo "<a href='index.php'><h4 id='homeHeading'>Volver al perfil</h4></a>";
                echo "<br/><br/>";

                }
                 
                }

                }
                
            


     ?>

      <?php endif ?>
            
            </div>
        </div>
    </header>   

   

    <!-- jQuery -->
    <script src="../estilos/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../estilos/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../estilos/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../estilos/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="../estilos/js/creative.min.js"></script>

</body>

</html>