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

//var_dump($_POST);

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM usuarios WHERE nombre = '$username' AND pass='$password'";

$result = $connection->query($sql);
$obj=$result->fetch_object();


if ($result->num_rows > 0) {

    echo "Bienvenido/a " .$username."<br/><br/><br/>";

 } else {
   echo "El usuario o contraseña son incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }





if ($result->num_rows > 0) {
    
    $sql = "select * from usuarios where nombre = '$username' and rol='Administrador'";

    $result = $connection->query($sql);
    $obj=$result->fetch_object();


    if ($result->num_rows > 0) {

        echo "Eres administrador";

     } else {

         echo "No eres administrador";
    
 }
    
    
    } else {

}


 mysqli_close($connection);
 ?>
