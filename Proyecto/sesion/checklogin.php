<?php
  session_start();
?>

<?php
            //conexion
            $connection = new mysqli('localhost', 'root', '', 'proyecto');

            //comprobación de errores
            if ($connection->connect_error) {
             die("La conexion falló: " . $connection->connect_error);
            }



            $username = $_POST['username'];
            $password = $_POST['password'];


            $sql = "SELECT * FROM usuarios WHERE nombre = '$username' AND pass=md5('$password')";

            $result = $connection->query($sql);
            $obj=$result->fetch_object();


            if ($result->num_rows > 0) {

                
                $_SESSION["username"]=$obj->nombre;
                $_SESSION["dni"]=$obj->dni;
                $_SESSION["rol"] = $obj->rol;
                $_SESSION["pass"] = $obj->pass;
                
                $_SESSION["nombre"] = $obj->nombre;



                var_dump($_SESSION);
                var_dump($obj);

                if ($obj->rol=="Administrador") {

                    header('Location: ../admin');


                 } else {

                     header('Location: ../perfil');

                }
                
             } else {
               header('Location: index.html?msg=error');
             }


               

             mysqli_close($connection);
?>

