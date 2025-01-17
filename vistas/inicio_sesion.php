<?php

session_name("farzone");
session_start();

if (isset($_POST["Iniciar"])) {
  header("Location: ../index.php");
  exit;
}

if (isset($_POST["Registrarte"])) {

  header("Location: ../registrarse.php");
  exit;
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Farzone-Inicio sesion</title>
  <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/logo_cuadrado2.png">
  <link rel="stylesheet" href="../css/estilo_sesion.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/tooltipster.bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css" />
  <script src="../js/jqBootstrapValidation.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


  <script type="text/javascript" src="../tooltipster/dist/js/tooltipster.bundle.min.js"></script>

  <!--fuentes-->
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 

  <!--Mi script-->
  <script src="../js/funciones.js"></script>
</head>

<body>

  <header>
    <p><a href="../index.php"><i class="fas fa-chevron-left"></i></a></p>
    <p id="titulo">Farzone</p>
    <label for="menu_busqueda"></i></label>
  </header>

  <section>

  <h1 id="saludo">¡Hola! Es un placer verte de nuevo</h1>

  <?php 
  
    if(isset($_SESSION["restringido"])){
      echo "<div class='notificacion'><p>Esta intentando acceder a un espacio restringido por favor inicie session</p></div>";
      session_unset();
    }

    if(isset($_SESSION['must_login'])){
      echo "<div class='notificacion'><p>";
      echo $_SESSION['must_login'];
      echo "</p></div>";
      session_unset();
    }
  
  ?>

    <form action="inicio_sesion.php" method="POST" id="form_movil">

    <span><i class="fas fa-user-circle"></i></span>

      <article class="">
        <!--    <p><input type="email" name="email" value="ejemplo@gmail.com" class="required"
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ejemplo@gmail.com"  required/></p>
  -->
        <label for="usuario">Usuario:</label>
        <p><input type="text" name="usuario" value="" class="required" title="camila28" placeholder="Camila28" id="usuario" required /></p>

        <label for="contra">Contraseña:</label>
        <p><input type="password" name="clave" value="" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos." id="contra" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$">
        </p>
        <p><a href="#">¿Olvidaste tu contraseña?</a></p>

      </article>


      <article class="">
        <button type="button" name="Iniciar" id="iniciar" onclick="hacer_login()">Iniciar</button>
      </article>

    </form>

    <form action="inicio_sesion.php" method="POST" id="form_escritorio">

    <span><i class="fas fa-user-circle"></i></span>

    <label for="usuario">Usuario:</label>
        <p><input type="text" name="usuario2" value="" class="required" title="camila28" placeholder="Camila28" id="usuario2" required /></p>

        <label for="contra">Contraseña:</label>
        <p><input type="password" name="clave2" value="" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos." id="contra2" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required>
        </p>
        <p><a href="#">¿Olvidaste tu contraseña?</a></p>

        <button type="button" name="Iniciar" id="iniciar" onclick="hacer_login2()">Iniciar</button>


    </form>

  </section>





  <footer>

    <p><a href="#">Terminos y condiciones</a></p>
    <p><a href="#">Politicas de privacidad</a></p>
    <p><a href="#">Sobre nosotros</a></p>

    <div class="">
      <a href="#"><i class="fab fa-facebook 5x"></i></a>
      <a href="#"><i class="fab fa-google-plus-g"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>

  </footer>

</body>


<script>
  $(document).ready(function() {
    $('input').tooltipster({
      animation: 'fall',
      delay: 200,
      theme: 'tooltipster-punk',
    });

    $(function() {
      $("input").not("[type=submit]").jqBootstrapValidation();
    });
  });
</script>

<script>

$(document).ready(function() {


  $('#form_escritorio').each('input').tooltipster({
      animation: 'fall',
      delay: 200,
      theme: 'tooltipster-punk',
    });

});
    

</script>

</html>