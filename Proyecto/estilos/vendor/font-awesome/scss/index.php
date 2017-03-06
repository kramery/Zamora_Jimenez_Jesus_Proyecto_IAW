<?php
  session_start();

$username=$_SESSION["username"];

    
    if ($_SESSION["rol"]!='Administrador'){
        session_destroy();
      header("Location:../");
   }
    ?>