<?php
  session_start();

  $username=$_SESSION["username"];


    ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perfil</title>

    <!-- Bootstrap Core CSS -->
    <link href="../estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- mi estilo CSS -->
    <link href="../estilos/css/estilo.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../estilos/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../estilos/css/creative.min.css" rel="stylesheet">


</head>

<body id="">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Proyecto IAW</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="../">Inicio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../sesion/logout.php">Cerrar sesión</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    
    
    <?php
    
        echo "<section class='bg-primary' id='about'>";
            echo "<div class='container'>";
                echo "<div class='row'>";
                    echo "<div class='col-lg-8 col-lg-offset-2 text-center'>";
                        echo "<h2 id='blanco'>Bienvenido $username</h2>";                  
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</section>";
            
    ?>
    
    <br/>
    
        <?php
      
      $connection = new mysqli("localhost", "root", "", "proyecto"); //Realizo la conexión a la base de datos.
        
      if ($connection->connect_errno) { //Compruebo que se ha conectado bien a la base de datos.
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      // Guardo en la variable result una consulta a la base de datos para sacar 
      // todas las columnas de la tabla reparaciones
      if ($result = $connection->query("SELECT * FROM aves;")) {
      } else {
      // En caso de error saco la salida del error.
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      // Bajo el encabezado de la tabla muestro las columnas de la consulta a la base de datos
      // almacenado en result
        echo "<div class=container>";
        while($obj = $result->fetch_object()) {
              echo "<div class='row text-center'>";
                  echo "<div class='col-md-4'>".$obj->nombre."</div>";
                  echo "<div class='col-md-4'>".$obj->color."</div>";
                  echo "<div class='col-md-4'><img src='../admin/add/$obj->imagen'></div>";
              echo "</div>";
              
        }
        echo "</div>";
    
          
          $result->close(); // Cierro la consulta
          unset($obj);

          unset($connection); // Cierro la conexión
          ?>
    


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
