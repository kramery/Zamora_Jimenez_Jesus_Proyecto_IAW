<?php
  session_start();

$username=$_SESSION["username"];

if ($_SESSION["rol"]===null){
            session_destroy();
          header("Location:../");
       }


    ?>