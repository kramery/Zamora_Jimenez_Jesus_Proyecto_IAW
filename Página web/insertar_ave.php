<!--
    Author: Juan Diego Pérez @pekechis
    E-mail: contact@jdperez.es
    Description: Passing info using POST and HTML forms
                 using the same file with database interaction
    Date: November 2016
    Reference: http://www.w3schools.com/tags/tag_form.asp
               http://www.w3schools.com/tags/tag_input.asp
               http://php.net/manual/reserved.variables.post.php
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar un nuevo usuario</title>
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
		if (!isset($_POST["nombre"])) : ?>
        <form method="post">
          <fieldset>
            <legend>Insertar ave</legend>
            <?php
              //CREATING THE CONNECTION
              $connection = new mysqli("localhost", "root", "", "proyecto");

              //TESTING IF THE CONNECTION WAS RIGHT
              if ($connection->connect_errno) {
              	 printf("Connection failed: %s\n", $connection->connect_error);
   	           exit();
   	         }


            ?>
            
            <br>
              <span>Codigo</span><input type="number"  name="codigo" required><br><br/>
              <span>Nombre</span><input type="text" name="nombre"><br/><br/>
              <span>Color</span><input type="text" name="color"><br/><br/>
              <span>Especie</span><input type="text" name="especie"><br/><br/>
              <span>Imagen</span><input type="file" name="imagen"><br/><br/>
              <span>Descripcion</span><textarea rows="4" cols="50" name="descripcion"></textarea><br/><br/>
	           <span><input type="submit" value="Enviar"><br>
	         </fieldset>
        </form>

      <?php else: ?>

      <?php
            echo "<h2>Estos son tus datos introducidos</h2>";
            var_dump($_POST);

            //CREATING THE CONNECTION
      	    $connection = new mysqli("localhost", "root", "", "proyecto");

           //TESTING IF THE CONNECTION WAS RIGHT
           if ($connection->connect_errno) {
           	 printf("Connection failed: %s\n", $connection->connect_error);
	           exit();
	         }


                
            $consulta= "INSERT INTO aves VALUES(".$_POST['codigo'].",'".$_POST['nombre']."','".$_POST["color"]."','".$_POST['especie']."','".$_POST['imagen']."','".$_POST["descripcion"]."')";
            


  	        var_dump($consulta);

  	        $result = $connection->query($consulta);

  	        if (!$result) {
   		         echo "Query Error";
            } else {
                
              echo "<br/><br/><br/><h2>Tus datos han añadido correctamente en el sistema</h2>";
                
            }

     ?>

      <?php endif ?>
            
            
            
            
            <table border="1">
       <tr>
         <td>Codigo</td>
         <td>Nombre</td>
         <td>Color</td>
         <td>Especie</td>
         <td>Imagen</td>
         <td>Descripcion</td>
        </tr>

    <?php
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
              echo "<td>".$obj->descripcion."</td>";
              echo "</tr>";
          }
          //Cerrar la consulta y la conexion
          $result->close();
          unset($obj);

          unset($connection);
          ?>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
  </body>
</html>
