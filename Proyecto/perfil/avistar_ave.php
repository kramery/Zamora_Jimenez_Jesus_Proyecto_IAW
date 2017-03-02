<?php
  session_start();

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

    <title>Avistar ave</title>

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
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
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
                <h2 id="homeHeading">Avistar ave</h2><br/>
                <a href='../admin/add/add_ave.php' class='page-scroll btn btn-default btn-xl sr-button'>¿Quieres añadir un nuevo ave?</a>
                <hr>
                    
                  <?php
		if (!isset($_POST["codigo"])) : ?>
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
            
            
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-1"><span>Ave: </span></div>
                    
                  <div class="col-md-1"><select name="codigo" required>
                      
                      <?php
                      
                          $connection = new mysqli("localhost", "root", "", "proyecto");
                          if ($connection->connect_errno) {
                             printf("Connection failed: %s\n", $connection->connect_error);
                          exit();
                         }
            
                         $result = $connection->query("SELECT * from aves;");
            
                
            
                         if ($result) {
                             
                           while ($obj=$result->fetch_object()) {
                              echo "<option  value='$obj->codigo'>";                              
                              echo $obj->nombre;
                              echo "</option>";
                           }
                             
                         } else {
                             
                           printf("Query failed: %s\n", $connection->connect_error);
                           exit();
                         }
                        ?>
                        </select></div>
                  <div class="col-md-5"></select></div>
                </div><br/>
                
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-1"><span>Fecha: </span></div>
                  <div class="col-md-1"><input type="date" name="fecha"></div>
                  <div class="col-md-5"></div>
                </div><br/>
                
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-1"><span>Sitio: </span></div>
                  <div class="col-md-1"><textarea rows="3" cols="20" name="sitio"></textarea></div>
                  <div class="col-md-5"></div>
                </div><br/>
                
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-2"><input href="#about" class="btn btn-primary btn-xl page-scroll" name="Submit" value="Enviar" type="submit"></div>
                  <div class="col-md-5"></div>
                </div>
                
        </form>

      <?php else: ?>
      

      <?php
           

            //CREATING THE CONNECTION
      	    $connection = new mysqli("localhost", "root", "", "proyecto");

           //TESTING IF THE CONNECTION WAS RIGHT
           if ($connection->connect_errno) {
           	 printf("Connection failed: %s\n", $connection->connect_error);
	           exit();
	         }


                
            $consulta= "INSERT INTO avistar VALUES('".$_POST["sitio"]."','".$_POST['fecha']."',$dni,'".$_POST["codigo"]."','')";
            
            var_dump($consulta);

  	        $result = $connection->query($consulta);

  	        if (!$result) { 
   		         
                echo "<br/><br/><br/><br/><br/><br/>";
                echo "<h2 id='homeHeading'>Error en la inserción de los datos</h2>";
                echo "<br/><br/><br/>";
                
                
            } else {
             
            echo "<br/><br/><br/><br/><br/><br/>";
            echo "<h3 id='homeHeading'>¡Genial! Tus datos han sido añadidos correctamente</h3>";
            echo "<br/><br/>";
            echo "<a href='index.php'><h4 id='homeHeading'>Volver</h4></a>";
            echo "<br/><br/>";
                
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
