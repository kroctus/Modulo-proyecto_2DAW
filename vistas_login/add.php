<?php

session_name("farzone");
session_start();

require "../servicio_rest/funciones.php";

if (!isset($_SESSION["usuario"])) {
  $_SESSION["restringido"] = "";
  header("Location: ../vistas/inicio_sesion.php");
}


if (isset($_POST["guardar"])) {

  /**IMAGEN*/
  if ($_POST["categoria"] == 'ilustracion' || $_POST["categoria"] == "diseño" || $_POST["categoria"] == 'fotografia') {

    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
      $uploadOk = 1;

      if (move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/pictures/' . $_FILES['file']['name'])) {
        echo "<div class='ok'>";
        echo "<p>Su publicación se ha subido correctamente</p>";
        echo "</div>";
      }
    } else {
      echo "<div class='error'>";
      echo "<p>El archivo seleccionado no es compatible con la categoria, por favor elija otra categoria o cambie el archivo</p>";
      echo "</div>";
      $uploadOk = 0;
    }
  }

  /**MUSICA */

  if ($_POST["categoria"] == 'musica') {

    // Check if image file is a actual image or fake image

    $allowed = array('mp3', 'ogg', 'flac');
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
      $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
      if (!in_array(strtolower($extension), $allowed)) {
        echo "<div class='error'>";
        echo "<p>El archivo seleccionado no es compatible con la categoria seleccionada, por favor elija otra categoria o cambie el archivo</p>";
        echo "</div>";
      }

      $nombre = $_FILES['file']['name'] . date("Y/m/d");
      if (move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/audio/' . $_FILES['file']['name'])) {
        echo "<div class='ok'>";
        echo "<p>Su publicación se ha subido correctamente</p>";
        echo "</div>";
      }
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Farzone-Add</title>
  <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/logo_cuadrado2.png">

  <link rel="stylesheet" href="../css/estilo_add.css">

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

  <form action="add.php" method="POST" enctype="multipart/form-data">

    <header>
      <p id="titulo"><a href="../index.php">Farzone</i></a></p>
      <button type="submit" name="guardar" id="guardar">Publicar</button>
    </header>

    <section>

      <article>

        <picture>
          <img src="../img/image.png" alt="no_imagen">
        </picture>

        <input type="file" name="file" id="" accept="image/*,audio/*">

        <p id="name">sube aquí tu archivo</p>

      </article>

      <article>



        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="" id="titulo" required>


        <label for="descripcion">descripcion:</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" required></textarea>

        <p><label for="categoria">Categoria:</label>

          <select name="categoria" id="categoria" required>

            <option value=""></option>
            <option value="musica">Musica</option>
            <option value="fotografia">Fotografia</option>
            <option value="diseño">Diseño</option>
            <option value="ilustracion">Ilustración</option>

          </select>

        </p>





      </article>



    </section>

  </form>




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