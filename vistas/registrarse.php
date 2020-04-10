<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Farzone-Registro</title>
  <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/logo_cuadrado2.png">

  <link rel="stylesheet" href="../css/estilo_registro.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/tooltipster.bundle.min.css" />
  <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css" />
  <script src="../js/jqBootstrapValidation.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


  <script type="text/javascript" src="../tooltipster/dist/js/tooltipster.bundle.min.js"></script>
</head>

<body>

  <header>
    <p><a href="../index.php"><i class="fas fa-chevron-left"></i></a></p>
    <p id="titulo">Farzone</p>
    <label for="menu_busqueda"></i></label>
  </header>

  <section>

    <h1 id="saludo">Estas a un paso de unirte a nuestra gran Familia</h1>

    <span class="linea"></span>


    <form action="registrarse.php" method="POST" id="form_movil">

      <p><label for="usuario">Usuario:</label>
        <input  type="text" name="usuario" value="" id="usuario"  title="camila28" placeholder="Camila28" required /></p>

      <p><label for="contra">Contraseña:</label>
        <input  type="password" name="clave" value="" id="contra" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos." pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required>
      </p>

      <p><label for="nombre">Nombre:</label>
        <input  type="text" name="nombre" id="nombre" value="" required></p>

      <p><label for="apellido">Apellido:</label>
        <input  type="text" name="apellido" id="apellido" value="" required></p>

      <p><label>Sexo:</label>
        <ul>
          <li><input type="radio" name="sexo" value="mujer" />Mujer</li>
          <li><input type="radio" name="sexo" value="hombre" />Hombre</li>
          <li><input type="radio" name="sexo" value="otro" checked />Otro</li>

        </ul>
      </p>

      <p><label for="fec_nac">Fecha de nacimiento: </label>
        <input type="date" name="fec_nac" id="fec_nac" required></p>

      <p id="iniciar_btn"><button type="submit" name="enviar" id="iniciar">Enviar</button></p>

    </form>


    <!--segundo formulario para la tablet-->

    <form action="registrarse.php" method="POST" id="form_escritorio">

      <table>

        <tr>
          <td>
            <label for="usuario">Usuario:</label>
          </td>
        </tr>

        <tr>
          <td>
            <input type="text" name="usuario" value="" id="usuario" class="required" title="camila28" placeholder="Camila28" required />
          </td>
        </tr>

        <tr>
          <td>
            <label for="contra">Contraseña:</label>
          </td>
        </tr>

        <tr>
          <td>
            <input type="password" name="clave" value="" id="contra" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos." pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required>
          </td>
        </tr>

        <tr>
          <td>
            <label for="nombre">Nombre:</label>
          </td>
        </tr>

        <tr>
          <td>
            <input type="text" name="nombre" id="nombre" value="" required>
          </td>
        </tr>

        <tr>
          <td>
            <label for="apellido">Apellido:</label>
          </td>
        </tr>

        <tr>
          <td>
            <input type="text" name="apellido" id="apellido" value="" required>
          </td>
        </tr>

        <tr>
          <td>
            <label>Sexo:</label>
          </td>
        </tr>

        <tr>
          <td>
            <ul>
              <li><input type="radio" name="sexo" value="mujer" />Mujer</li>
              <li><input type="radio" name="sexo" value="hombre" />Hombre</li>
              <li><input type="radio" name="sexo" value="otro" checked />Otro</li>

            </ul>
          </td>
        </tr>

        <tr>
          <td>
          <label for="fec_nac">Fecha de nacimiento: </label>
          </td>
        </tr>

        <tr>
          <td>
          <input type="date" name="fec_nac" id="fec_nac" required></p>
          </td>
        </tr>

      </table>

      <button type="submit" name="enviar" id="iniciar">Enviar</button>

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
  });


  $(function() {
    $("input").not("[type=submit]").jqBootstrapValidation();
  });
</script>

</html>