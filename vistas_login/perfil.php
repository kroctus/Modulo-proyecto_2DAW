<?php

session_name("farzone");
session_start();

if (!isset($_SESSION["usuario"])) {
  $_SESSION["restringido"] = "";
  header("Location: ../vistas/inicio_sesion.php");
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Farzone-Perfil</title>
  <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/logo_cuadrado2.png">

  <link rel="stylesheet" href="../css/estilo_perfil.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/tooltipster.bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css" />
  <script src="../js/jqBootstrapValidation.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


  <script type="text/javascript" src="../tooltipster/dist/js/tooltipster.bundle.min.js"></script>

  <script type="text/javascript" src="../js/funciones.js"></script>

  <!--fuentes-->
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

</head>

<body>

  <header>
    <p id="titulo"><a href="../index.php">Farzone</i></a></p>
    <button id="guardar">Guardar</button>
  </header>

  <section>

    <article>

      <picture>
        <button><img src="../img/image.png" alt="no_imagen"></button>
      </picture>

      <p id="name">Nombre</p>

    </article>

    <article>


      <form action="registrarse.php" method="POST" id="form_movil">

        <label for="contra">Contraseña:</label>
        <input type="password" name="clave" value="<?php if (isset($_POST['enviar']) && isset($_POST['clave'])) echo $_POST['clave'] ?>" id="contra" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos." pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required>


        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php if (isset($_POST['enviar']) && isset($_POST['nombre'])) echo $_POST['nombre'] ?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?php if (isset($_POST['enviar']) && isset($_POST['apellido'])) echo $_POST['apellido'] ?>" required>

        <p><label>Sexo:</label>
          <ul>
            <li><input type="radio" name="sexo" value="mujer" class="sexo" />Mujer</li>
            <li><input type="radio" name="sexo" value="hombre" class="sexo" />Hombre</li>
            <li><input type="radio" name="sexo" value="otro" class="sexo" checked />Otro</li>

          </ul>
        </p>

        <label for="fec_nac">Fecha de nacimiento: </label>
        <input type="date" name="fec_nac" id="fec_nac" value="<?php if (isset($_POST['enviar']) && isset($_POST['fec_nac'])) echo $_POST['fec_nac'] ?>" required>

      </form>


    </article>



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
  });


  $(function() {
    $("input").not("[type=submit]").jqBootstrapValidation();
  });
</script>

</html>