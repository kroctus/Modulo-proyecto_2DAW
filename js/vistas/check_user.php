<?php

require "../servicio_rest/funciones.php";
session_name("farzone");
session_start();


if (isset($_POST['seguir_usuario'])) {

  if (!isset($_SESSION['usuario'])) {
    $_SESSION['must_login']="Debes iniciar sesion para realizar esta acción";
    header('Location: ../vistas/inicio_sesion.php');
    exit;
  }
}elseif(isset($_POST['publicacion_btn'])){

  $_SESSION['publicacion_a_buscar']=$_POST['publicacion_btn'];
  header('Location: ../vistas/detalle_publicacion.php');
  exit;

}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Farzone-<?php echo $_SESSION['usuario_a_buscar'] ?></title>
  <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/logo_cuadrado2.png">

  <link rel="stylesheet" href="../css/estilo_user_details.css">

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
    <form action="check_user.php" method="post">
      <p id="titulo"><a href="../index.php">Farzone</i></a></p>
      <button type='submit' name='seguir_usuario' id="guardar">Seguir a este usuario</button>
    </form>
  </header>

  <section>

    <form action="check_user.php" method="post">
      <?php

      $obj = consumir_servicio_REST($url . 'get_usuario/' . urlencode($_SESSION["usuario_a_buscar"]), 'GET');
      if (isset($obj->mensaje_error)) {
        die($obj->mensaje_error);
      } else {



        foreach ($obj->usuario as $key) {

          $id_usuario = $key->id_usuario;

          echo "<article id='user_block'>";
          echo "<div>";

          echo "<img src='../img/image.png' id='img_perfil'/>";
          echo "<p id='nombre'>" . $key->usuario . "</p>";
          echo "<button type='submit' name='seguir_usuario' id='btn_edit'>Seguir a este usuario</button>";

          echo "<div>";

          echo "<p id='descripcion'>" . $key->descripcion . "</p>";
          echo "</article>";

          echo "<article id='info'>";

          echo "<div>";
          echo "<p>0</p>";
          echo "<p class='desc'>Publicaciones</p>";
          echo "</div>";

          echo "<div>";
          echo "<p>0</p>";
          echo "<p class='desc'>Seguidores</p>";
          echo "</div>";

          echo "</article>";
        }
      }

      ?>

    </form>
  </section>

  <section id='publicaciones'>

  <form action="check_user.php" method="post">

    <?php

    $obj = consumir_servicio_REST($url . 'get_publicaciones_user/' . urlencode($id_usuario), 'GET');
    if (isset($obj->mensaje_error)) {
      echo "<p>No hay publicaciones</p>";
      die($obj->mensaje_error);
    } else {

      if($obj==false){
        echo "<p>No hay publicaciones</p>";
        return;
      }

      foreach ($obj->publicaciones as $key) {

        switch ($key->categoria) {

          case ('diseño'):
            echo "<button type='submit' name='publicacion_btn' value='" . $key->id_publicacion . "'><img src='../uploads/pictures/" . $key->archivo . "'/></button>";
            break;

          case ('fotografia'):
            echo "<button type='submit' name='publicacion_btn' value='" . $key->id_publicacion . "'><img src='../uploads/pictures/" . $key->archivo . "'/></button>";
            break;

          case ('ilustracion'):
            echo "<button type='submit' name='publicacion_btn' value='" . $key->id_publicacion . "'><img src='../uploads/pictures/" . $key->archivo . "'/></button>";
            break;

          case ('musica'):
            echo "<button type='submit' name='publicacion_btn' value='" . $key->id_publicacion . "'><img src='../img_comprimidas/musica.jpeg/" . $key->archivo . "'/></button>";
            break;
        }
      }
    }

    ?>
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
  var estado = true;

  $(document).ready(function() {

    $('#open_dec').click(function() {
      if (estado == true) {
        $('#descripcion').fadeIn();
        estado = false;
      } else {
        $('#descripcion').fadeOut();
        estado = true;
      }
    });
  });
</script>

</html>