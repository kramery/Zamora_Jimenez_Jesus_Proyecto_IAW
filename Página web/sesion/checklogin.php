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
//mis campos en la base de datos son: user_login para el usuario y user_pass para la contraseña
$sql = "SELECT * FROM usuarios WHERE nombre = '$username' AND pass='$password'";

//echo $sql;

$result = $connection->query($sql);
$obj=$result->fetch_object();


if ($result->num_rows > 0) {



    
//user_nicename es el campo en la base de datos que identifica el privilegio 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['rol'] = $obj;
    $_SESSION['start'] = time();

    echo "Bienvenido! " . $_SESSION['username'];
    echo "<br><br><a href=panel-control.php>Panel de Control</a>";

 } else {
   echo "Username o Password son incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($connection);
 ?>
