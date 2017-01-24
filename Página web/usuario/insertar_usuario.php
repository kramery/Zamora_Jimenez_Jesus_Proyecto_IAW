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
            <legend>Insertar usuario</legend>
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
              <span>DNI</span><input type="number"  name="dni" required><br><br/>
              <span>Nombre</span><input type="text" name="nombre"><br/><br/>
              <span>Apellidos</span><input type="text" name="apellido"><br/><br/>
              <span>Pais</span><input type="text" name="pais"><br/><br/>
              <span>Ciudad</span><input type="text" name="ciudad"><br/><br/>
              <span>Email</span><input type="email" name="email"><br/><br/>
              <span>Contraseña</span><input type="password" name="pass"><br/><br/>
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


                
            $consulta= "INSERT INTO usuarios VALUES(".$_POST['dni'].",'".$_POST['nombre']."','".$_POST["apellido"]."','".$_POST['pais']."','".$_POST['ciudad']."','".$_POST['email']."','".$_POST['pass']."')";
            


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
         <td>DNI</td>
           <td>Nombre</td>
         <td>Apellidos</td>
         <td>Pais</td>
         <td>Ciudad</td>
         <td>Email</td>
         <td>Contraseña</td>
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
      if ($result = $connection->query("SELECT * FROM usuarios;")) {
      } else {

            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      //Introducimos los datos en la tabla creada.
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->dni."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->apellidos."</td>";
              echo "<td>".$obj->pais."</td>";
              echo "<td>".$obj->ciudad."</td>";
              echo "<td>".$obj->email."</td>";
              echo "<td>".$obj->pass."</td>";
              echo "</tr>";
          }
          //Cerrar la consulta y la conexion
          $result->close();
          unset($obj);

          unset($connection);
          ?>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
  </body>
</html>
