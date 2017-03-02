<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar imagen</title>
    <link rel="stylesheet" type="text/css" href="">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
     
      
      <?php 
       
        
        if (!isset($_FILES["bird"])) :
      ?>

      
        <?php 

        $connection = new mysqli("localhost", "root", "", "proyecto");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
           
        $query="SELECT * FROM aves WHERE codigo=1";
      
        if ($result = $connection->query($query)) {
            
            $obj = $result->fetch_object();
            
            $codigo=$obj->codigo;
            
            $imagen=$obj->imagen;
            
            // var_dump($codigo);
            
        }
      
        ?>
      
      
        <form method="post" action="cambiar_imagen.php" enctype="multipart/form-data">
          
            <span>Imagen:</span><input type="file" name="bird" id="pajaro" required />
            <img src='<?php echo '../add/'.$imagen; ?>' /><br/>               
            <br><span><input type="submit" value="Enviar" /></span><br/>
        </form>

      <?php else: ?>

        <?php
        
            $valid= true;
      
      var_dump($_POST);
            var_dump("HOLA");
      
            var_dump($_FILES);
            
            
        if ($_FILES['bird']['name']!="") {
            $tmp_file = $_FILES['bird']['tmp_name'];
            $target_dir = "../add/";
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
          echo "Image añadida";    
            
        $connection = new mysqli("localhost", "root", "", "proyecto");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
            
        //MAKING A UPDATE
        
        $imagen_nueva = $target_file;
            echo "<br/><br/><br/>";
            var_dump($imagen_nueva);
            echo "<br/><br/><br/>";
        
        $consulta1="Update aves SET imagen='img/".$_FILES['bird']['name']."' where codigo=1";
            var_dump($consulta1);
            
        var_dump($imagen_nueva);
        
        if ($_FILES['bird']['name']!="") {
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
            
      <?php endif; ?>

  </body>
</html>