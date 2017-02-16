
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR CAMISETA</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
     
      
      <?php 

        if (!isset($_POST["bird"])) : ?>

        <?php 

        $connection = new mysqli("localhost", "root", "", "proyecto");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
           
        $query="SELECT * FROM aves WHERE codigo=4";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $codigo=$obj->codigo;
            $imagen=$obj->imagen;
            var_dump($imagen);
            
        }
      
        ?>
      
      
        <form method="post" enctype="multipart/form-data">
          
            <span>Imagen:</span><input type="file" name="bird" id="pajaro" required />
            <img src='<?php echo '../add/'.$imagen; ?>' /><br><br>               
            <br><span><input type="submit" value="Enviar" /></span><br><br>
        </form>

      <?php else: ?>

        <?php
        
            $valid= true;
        var_dump($_FILES);
            
        if ($_FILES['imagen']['name']!="") {
            $tmp_file = $_FILES['imagen']['tmp_name'];
            $target_dir = "../add";
            $target_file = strtolower($target_dir . basename($_FILES['imagen']['name']));

            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $valid = false;
            }
            //Check the size of the file. Up to 2Mb
            if ($_FILES['imagen']['size'] > (2048000)) {
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
          echo "Image añadida";    
            
        $connection = new mysqli("localhost", "root", "", "proyecto");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
            
        //MAKING A UPDATE
        
        $imagen_nueva = $_POST['bird'];
        
        $consulta1="Update aves SET 
        imagen='$imagen_nueva'";
            
        var_dump($_POST("imagen"));
        
        if ($_FILES['imagen']['name']!="") {
            $consulta1=$consulta1.",imagen='$target_file'";
        }
            
            
        $result = $connection->query($consulta1);
        if (!$result) {
            echo "WRONG QUERY";
        } else {
            echo "Actualizado correctamente consulta1";
            echo var_dump($consulta1);
        }
        
        }
        ?>
            
      <?php endif ?>

  </body>
</html>