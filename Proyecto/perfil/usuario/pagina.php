<?php
  session_start();

$username=$_SESSION["username"];

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

    <title>Usuarios</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- mi estilo CSS -->
    <link href="../../estilos/css/estilo.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../../estilos/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../../estilos/css/creative.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Proyecto IAW</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="../">Inicio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../sesion/logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            
        </div>
        
    </nav>

    
    <?php
    
    echo "<aside class='capa'>";
        echo "<br/><br/>";  
        echo "<div class='container text-center'>";
            echo "<div class='call-to-action'>";
                echo "<h2 id='blanco'>Este ave ha sido avistado por:</h2>";
           echo " </div>";
        echo "</div>";
    echo "</aside>";
        
        ?>
    
    
    
    <section class="bg-primary-amarillo" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                     
    
    <?php
        
      $codigo=$_GET['id'];
                    
        
      $connection = new mysqli("localhost", "root", "", "proyecto"); //Realizo la conexión a la base de datos.
        
      if ($connection->connect_errno) { //Compruebo que se ha conectado bien a la base de datos.
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      // Guardo en la variable result una consulta a la base de datos para sacar 
      // todas las columnas de la tabla reparaciones
      if ($result = $connection->query("SELECT u.nombre, a.usuarios_dni FROM usuarios u join avistar a on u.dni=a.usuarios_dni where a.aves_codigo=$codigo;")) {
      } else {
      // En caso de error saco la salida del error.
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      // Bajo el encabezado de la tabla muestro las columnas de la consulta a la base de datos
      // almacenado en result
          while($obj = $result->fetch_object()) {
                echo "<div class='row text-center'>";
                echo "<div class='col-lg-12 text-center'><a href='usuario.php?id=$obj->usuarios_dni'>$obj->nombre</a></div>";
                echo "</div>";
              
                echo "</br>";
              
          }
            
          
          
          $result->close(); // Cierro la consulta
          unset($obj);

          unset($connection); // Cierro la conexión
          ?>
     <br>
                    
                    
                    
                    
                </div>
        
            </div>
        </div>

    </section>
    
    
    

    
    <section class="bg-primary-naranja" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="../index.php" class="page-scroll btn btn-default btn-xl sr-button">Volver al panel</a>                    
                </div>
            </div>
        </div>
    </section>
  

    <!-- jQuery -->
    <script src="../../estilos/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../estilos/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../../estilos/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../../estilos/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="../estilos/js/creative.min.js"></script>

</body>

</html>
