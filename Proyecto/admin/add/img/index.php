<?php
  session_start();

    
    if ($_SESSION["rol"]!='Administrador'){
        session_destroy();
      header("Location:../../../");
   }
    ?>