<!--
    Author: Juan Diego Pérez @pekechis
    E-mail: contact@jdperez.es
    Description: How to Upload a file to the server using an HTML Form and PHP & Inserting the destination URL in a database record
    Date: January 2017
    Reference: http://www.w3schools.com/php/php_file_upload.asp // https://davidwalsh.name/basic-file-uploading-php
    Requires: HTML & PHP Basic Knowledge &
    file_uploads = On in the php.ini configuration file
-->
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload an Image to the Server</title>
   
      <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
    
  </head>
  <body>
      
      


          <?php if (!isset($_POST['codigo']))  :?>
              <form action="insertar_ave.php" method="post" enctype="multipart/form-data">
                <fieldset>
                <legend><h1>Insertar ave</h1></legend><br>
                  <span>Codigo: </span><input type="number"  name="codigo" required><br><br/>
                  <span>Nombre: </span><input type="text" name="nombre"><br/><br/>
                  <span>Color: </span><input type="text" name="color"><br/><br/>
                  <span>Especie: </span><input type="text" name="especie"><br/><br/>
                  <span>Imagen: </span><input type="file" name="image" required /><br/><br/>
                  <span>Descripción: </span><textarea cols="50" rows="2" name="descripcion"></textarea><br/><br/>
                  <input type="submit" value="Enviar" />
                  </fieldset>
                
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
                  echo "Sorry, file already exists.";
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
                    
                    
                    
                   
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $color = $_POST['color'];
                    $especie = $_POST['especie'];
                    $descripcion = $_POST['descripcion'];

                  $consulta="INSERT INTO aves VALUES('$codigo','$nombre','$color','$especie','$target_file','$descripcion')";

  	        $result = $connection->query($consulta);

  	        if (!$result) {
   		         echo "Query Error";
            } else {
                
              echo "<br/><br/><br/><h2>Tus datos han añadido correctamente en el sistema</h2>";
                
                
                echo "<table border='1'>";
               echo "<tr>";
                 echo "<th>Codigo</th>";
                 echo "<th>Nombre</th>";
                 echo "<th>Color</th>";
                 echo "<th>Especie</th>";
                 echo "<th>Imagen</th>";
                echo "</tr>";
                
                
                
                
                
                
                
      //Con el comienzo de la tabla creada arriba, realizamos la conexion.
      $connection = new mysqli("localhost", "root", "", "proyecto");
      //Comprobamos que sea correcta la conexion.
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      //Consulta para sacar las reparaciones.
      if ($result = $connection->query("SELECT * FROM aves;")) {
      } else {

            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      //Introducimos los datos en la tabla creada.
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->codigo."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->color."</td>";
              echo "<td>".$obj->especie."</td>";
              echo "<td>".$obj->imagen."</td>";
              echo "</tr>";
          }
          //Cerrar la consulta y la conexion
          $result->close();
          unset($obj);

          unset($connection);
          
                
            }


                }
            ?>

          <?php endif ?>


  </body>
</html>
