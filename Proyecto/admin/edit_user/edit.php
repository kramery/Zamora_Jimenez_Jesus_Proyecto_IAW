<?php
  session_start();


    
    if ($_SESSION["rol"]!='Administrador'){
        session_destroy();
      header("Location:../");
   }

$connection = new mysqli("localhost", "root", "", "proyecto");




?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar usuario</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../estilos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- mi estilo CSS -->
    <link href="../../estilos/css/estilo.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../estilos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="../../estilos/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../../estilos/css/creative.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <a class="page-scroll" href="../../sesion/logout.php">Cerrar sesión</a>
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
    
    echo "<aside class='capa'>";
        echo "<br/><br/>";  
        echo "<div class='container text-center'>";
            echo "<div class='call-to-action'>";
                echo "<h2 id='blanco'>Editar usuario</h2>";
           echo " </div>";
        echo "</div>";
    echo "</aside>";
        
        ?>
    
    
    
    <section class="bg-primary-amarillo" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                     
    <div class="row">
        <div class="col-lg-4 text-center"></div>
        <div class="col-lg-4 text-center">
            
    
    <?php
            
            
            
            

        if (!isset($_POST["dni"])) {

          
          //Conexion a la base de datos (localhost, usuario, contraseña, bd).
            $codigo=$_GET['id'];

          $consulta = "select * from usuarios where dni=$codigo";
            
            


          if ($result = $connection->query($consulta)) {

              if ($result->num_rows===0) {

                echo "No existe el usuario";
              } else {


                $obj = $result->fetch_object();

                echo "<form action='edit.php' method='post'>";

                  echo "<input type='hidden' value='$obj->dni' name='dni' type='text'>";
                  echo "<p>Nombre: <input value='$obj->nombre' name='nombre' type='text'></p>";
                  echo "<p>Apellidos: <input value='$obj->apellidos' name='apellidos' type='text'></p>";
                  echo "<p>Pais: <input value='$obj->pais' name='pais' type='text'></p>";
                  echo "<p>Ciudad: <input value='$obj->ciudad' name='ciudad' type='text'></p>";
                  echo "<p>Email: <input value='$obj->email' name='email' type='text'></p>";
                  echo "<p>ROL: <input value='$obj->rol' name='rol' type='text' ></p>";


                  echo "<p><input type='submit' value='Editar' class='btn btn-primary' name='editar_usuario'></p>";

                echo "</form>";

              }
              
          } else {
                echo "Wrong Query";
                } 

        } else {
            
            
            
            if ($insert = $connection->query("update usuarios set dni='".$_POST["dni"]."', nombre='".$_POST["nombre"]."',  apellidos='".$_POST["apellidos"]."', pais='".$_POST["pais"]."', ciudad='".$_POST["ciudad"]."', email='".$_POST["email"]."', pass='', rol='".$_POST["rol"]."' where dni=".$_POST['dni'].";")) {

                          
                          
            echo "<h3 id='homeHeading'>Datos modificados</h3>";
            
           


             } else {
                
                mysqli_error($connection);
                
             }
            
            
             
        }

    ?>
                    
                    
                    
        </div>
        <div class="col-lg-4 text-center"></div>
            </div>
        </div>
    </div>
    </section>
    
    
    

    
    <section class="bg-primary-naranja" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="../" class="page-scroll btn btn-default btn-xl sr-button">Volver al panel</a>                    
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
    <script src="../estilos/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="../../estilos/js/creative.min.js"></script>

</body>

</html>
