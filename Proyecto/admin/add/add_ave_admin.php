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

    <title>Añadir Ave</title>

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
    
    <style>
      span {
        width: 100px;
        display: inline-block;
        text-align: left;
      }
    </style>

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
                echo "<h2 id='blanco'>Añadir Ave</h2>";
           echo " </div>";
        echo "</div>";
    echo "</aside>";
        
        ?>
    
    
    
    <section class="bg-primary-amarillo" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                     
    <div class="row">
        <div class="col-lg-2 text-center"></div>
        <div class="col-lg-8 text-center">
            
       <?php if (!isset($_POST['nombre']))  :?>
              <form action="add_ave_admin.php" method="post" enctype="multipart/form-data">
                <br/>
                  <span>Nombre: </span><input type="text" name="nombre"><br/><br/>
                  <span>Color: </span><input type="text" name="color"><br/><br/>
                  <span>Pais: </span>
                  <select name="pais" required >      
    
    <?php
                      
                          $connection = new mysqli("localhost", "root", "", "proyecto");
                          if ($connection->connect_errno) {
                             printf("Connection failed: %s\n", $connection->connect_error);
                          exit();
                         }
            
                         $result = $connection->query("SELECT * from pais;");
            
                
            
                         if ($result) {
                             
                           while ($obj=$result->fetch_object()) {
                              echo "<option  value='$obj->nombre' name='pais'>"; 
                              echo $obj->nombre;
                              echo "</option>";
                           }
                             
                         } else {
                             
                           printf("Query failed: %s\n", $connection->connect_error);
                           exit();
                         }
                        ?>
                      
                      </select><br/><br/>
                  <span>Especie: </span><input type="text" name="especie"><br/><br/>
                  <span>Imagen: </span><input type="file" name="image" required /><br/><br/>
                  <span>Descripción: </span><textarea cols="20" rows="2" name="descripcion"></textarea><br/><br/>
                  <input class="btn btn-primary btn-xl page-scroll" name="submit" value="Enviar" type="submit">
                
              </form>
            <div>

          <?php else: ?>

          <?php

                //Temp file. Where the uploaded file is stored temporary
                $tmp_file = $_FILES['image']['tmp_name'];

                //Dir where we are going to store the file
                $target_dir = "img/";

                //Full name of the file.
                $target_file = strtolower($target_dir . basename($_FILES['image']['name']));

                //Can we upload the file
                $valid= true;

                //Check if the file already exists
                if (file_exists($target_file)) {
                  echo "Esa imagen ya está en el sistema.";
                  $valid = false;
                }

                //Check the size of the file. Up to 2Mb
                if ($_FILES['image']['size'] > (2048000)) {
			            $valid = false;
			            echo 'Oops!  Your file\'s size is to large.';
		            }

                //Check the file extension: We need an image not any other different type of file
                $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
                if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
                  $valid = false;
                  echo "Only JPG, JPEG, PNG & GIF files are allowed";
                }


                if ($valid) {

                  //Put the file in its place
                  move_uploaded_file($tmp_file, $target_file);

                  //CREATING THE CONNECTION
                    $connection = new mysqli("localhost", "root", "", "proyecto");

                   //TESTING IF THE CONNECTION WAS RIGHT
                   if ($connection->connect_errno) {
                     printf("Connection failed: %s\n", $connection->connect_error);
                       exit();
                     }
                    
                    
                    
                   
                    $nombre = $_POST['nombre'];
                    $color = $_POST['color'];
                    $especie = $_POST['especie'];
                    $descripcion = $_POST['descripcion'];
                    $pais = $_POST['pais'];

                  $consulta="INSERT INTO aves VALUES(null,'$nombre','$color','$especie','$target_file','$descripcion')";
                    
                 

  	        $result = $connection->query($consulta);
                    
            $codigo_nuevo = $connection->insert_id;
                    
             $consulta1="INSERT INTO se_encuentra VALUES('$codigo_nuevo','$nombre','$pais')";
            
            $result1 = $connection->query($consulta1);

  	        if (!$result) {
                
   		         echo "Error en la inserción de del ave y del país";
                
            } else {
                

            
                
                        if (!$result1) {
                            
                            echo "Error en la inserción del pais del ave en la tabla se_encuentra";
                            
                            var_dump($consulta1);
                
                        } else {
                            
                            echo "<h3 id='homeading'>Tus datos han añadido correctamente en el sistema</h2>";
        

                        }
            }
        }
                
                
            ?>

          <?php endif ?> 
            
            </div>
        </div>   
                    
                    
                    
        </div>
        <div class="col-lg-1 text-center"></div>
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
