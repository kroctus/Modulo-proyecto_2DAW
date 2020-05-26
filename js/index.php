<?php

  session_name("farzone");
  session_start();

  if(isset($_SESSION["usuario"])){

    header("Location: vistas_login/pagina_principal.php");

  }else{
    header("Location: vistas/pagina_principal.php");
  }

?>