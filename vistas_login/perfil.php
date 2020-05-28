<?php

session_name("farzone");
session_start();

require "../servicio_rest/funciones.php";

if (!isset($_SESSION["usuario"])) {
  $_SESSION["restringido"] = "";
  header("Location: ../vistas/inicio_sesion.php");
}


$obj=consumir_servicio_REST($url.'get_usuario/'.urlencode($_SESSION["usuario"]),'GET');
if(isset($obj->mensaje_error)){
  die($obj->mensaje_error);

  echo "SOY UN ERRPR";
}else{

  foreach ($obj->usuario as $key) {
    $nombre=$key->nombre;
    $apellido=$key->apellido;
    $contra=$key->password;
    $fec=$key->fec_nacimiento;
    $sexo=$key->sexo;
  }


if(isset($_POST["guardar"])){


  /**$usuario,$nombre,$apellido,$contra,$sexo,$fec_nac*/

    $datos_usuario=array();

    $datos_usuario["usuario"]=$_SESSION["usuario"];
    $datos_usuario["nombre"]=$_POST["nombre"];
    $datos_usuario["apellido"]=$_POST["apellido"];
    $datos_usuario["sexo"]=$_POST["sexo"];
    $datos_usuario["fec_nac"]=$_POST["fec_nac"];

    if(md5($_POST["clave"])!=$contra){
      $datos_usuario["contra"]=md5($_POST["clave"]);
    }else{
      $datos_usuario["contra"]=$contra;
    }


  $obj2=consumir_servicio_REST($url.'actualizar_usuario/'.urlencode($_SESSION["usuario"]),'PUT',$datos_usuario);
  if(isset($obj2->mensaje_error)){
    die($obj2->mensaje_error);
  }else{
    echo "<div class='ok'>";
    echo "<p>Los cambios se han guardado correctamente</p>";
    echo "</div>";
  }

}

?>

<?php


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

<form action="perfil.php" method="POST">

  <header>
    <p id="titulo"><a href="../index.php">Farzone</i></a></p>
    <button type="submit" name="guardar" id="guardar">Guardar</button>
  </header>

  <section>

    <article>

      <picture>
        <button><img src="../img/image.png" alt="no_imagen"></button>
      </picture>

      <p id="name"><?php echo $_SESSION["usuario"]?></p>

    </article>

    <article>



        <label for="contra">Contraseña:</label>
        <input type="password" name="clave" value="" id="contra" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos." pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$">


        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" required>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo $apellido?>" required>

        <p><label>Sexo:</label>
          <ul>
            <li><input type="radio" name="sexo" value="mujer" class="sexo" <?php if($sexo=="mujer"){ echo "checked";}?> />Mujer</li>
            <li><input type="radio" name="sexo" value="hombre" class="sexo" <?php if($sexo=="hombre"){ echo "checked";}?> />Hombre</li>
            <li><input type="radio" name="sexo" value="otro" class="sexo" <?php if($sexo=="otro"){ echo "checked";}?> />Otro</li>

          </ul>
        </p>

        <label for="fec_nac">Fecha de nacimiento: </label>
        <input type="date" name="fec_nac" id="fec_nac" value="<?php echo $fec?>" required>




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

{
<?php

}