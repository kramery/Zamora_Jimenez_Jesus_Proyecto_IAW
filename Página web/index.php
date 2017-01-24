<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {
   
      
      $nombre = $_SESSION["user"];
      $rol = "admin";
      
      
      echo "<h1>Bienvenido ".$nombre."</h1>";
      
      
     
          $connection = new mysqli("localhost", "root", "", "proyecto");

         
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          
          $consulta="select * from usuarios where nombre=$nombre and rol=$rol;";

          
          if ($result = $connection->query($consulta)) {

    
              if ($result->num_rows===0) {
                echo "funciona";
      
                } else {
      
      
      
                $connection = new mysqli("localhost", "root", "", "proyecto"); // Creo la conexión a la base de datos

                   if ($connection->connect_errno) {
                       printf("Connection failed: %s\n", $connection->connect_error);
                       exit();
                   }

                  // Realizo la consulta para obtener los datos que luego sacaré por pantalla

                   if ($result = $connection->query("select u.*, a.*, av.* from usuarios u join avistar a on u.dni=a.usuarios_dni	join aves av on a.aves_codigo=av.codigo;")) {


                     // Introduzco los datos de las columnas en la tabla

                   while($obj = $result->fetch_object()) {
                       echo "<tr>";
                       echo "<td>".$obj->imagen."</td>";
                       echo "</tr>";
                       echo "<tr>";
                       echo "<td>".$obj->nombre."</td>";
                       echo "</tr>";
                     }

                     // Cierro el resultado y tabla

                     $result->close();
                     unset($obj);
                     echo "</table>";



                   } else {
                         mysqli_error($connection);
                   }
                  
                }
              
              }
      }



 ?>
