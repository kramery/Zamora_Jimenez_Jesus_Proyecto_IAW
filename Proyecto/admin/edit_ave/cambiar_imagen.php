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

    <title>Actualizar imagen</title>

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
                echo "<h2 id='blanco'>Actualizar imagen</h2>";
           echo " </div>";
        echo "</div>";
    echo "</aside>";
        
        ?>
    
    
    
    <section class="bg-primary-amarillo" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                     
    <div class="row">
        <div class="col-lg-3 text-center"></div>
        <div class="col-lg-6 text-center">
            
    <?php 
       
        
        if (!isset($_FILES["bird"])) :
      ?>

      
        
      
        <form method="post" action="cambiar_imagen.php" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $_GET['id']; ?>" name="codigo" />
            <span>Imagen:</span><input type="file" name="bird" id="pajaro" required />            
            <br><span><input type="submit" value="Enviar" /></span><br/>
        </form>

      <?php else: ?>

        <?php
        
            $valid= true;
    
            
            
        if ($_FILES['bird']['name']!="") {
            $tmp_file = $_FILES['bird']['tmp_name'];
            $codigo = $_POST['codigo'];
            var_dump($codigo);
            $target_dir = "../add/img/";
            $target_file = strtolower($target_dir . basename($_FILES['bird']['name']));

            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $valid = false;
            }
            //Check the size of the file. Up to 2Mb
            if ($_FILES['bird']['size'] > (2048000)) {
                    $valid = false;
                    echo 'Oops!  Your file\'s size is to large.';
                }
            //Check the file extension: We need an image not any other different type of file
            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
            if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
              $valid = false;
              echo "Only JPG, JPEG, PNG & GIF files are allowed";
            }    
        }
        
        if ($valid) {
          //Put the file in its place
          move_uploaded_file($tmp_file, $target_file);   
            
        $connection = new mysqli("localhost", "root", "", "proyecto");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
            
        //MAKING A UPDATE
        
        $imagen_nueva = $target_file;
            


        $consulta1="Update aves SET imagen='img/".$_FILES['bird']['name']."' where codigo=$codigo";
            
            
        
        
        //if ($_FILES['bird']['name']!="") {
        //    $consulta1=$consulta1.",imagen='$target_file'";
        //}
            
            
        $result = $connection->query($consulta1);
        if (!$result) {
            echo "WRONG QUERY";
        } else {
            echo "<h3 id='homeHeading'>Imagen actualizada correctamente</h3>";
        }
        
        }
        ?>
            
      <?php endif; ?>
   
            
            </div>
        </div>   
                    
                    
                    
        </div>
        <div class="col-lg-3 text-center"></div>
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
    <script src="../../estilos/vendor/scrollreveal/scrollreveal.min.js">
    
    
    $(function(){

                $("img [src='https://cloud.githubusercontent.com/assets/23024110/20663010/9968df22-b55e-11e6-941d-edbc894c2b78.png']").hide();
                             
        });
    
    
    </script>
    <script src="../estilos/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="../../estilos/js/creative.min.js"></script>
    
    

</body>

</html>
