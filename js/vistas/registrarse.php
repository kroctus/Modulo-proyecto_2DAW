<?php

  session_name('farzone');
  session_start();

$cambio=false;

$url = "http://localhost/Proyectos/PROYECTO/servicio_rest/";
require "../servicio_rest/funciones.php";

function repetido($usuario){

$url = "http://localhost/Proyectos/PROYECTO/servicio_rest/";
  $obj2=consumir_servicio_REST($url.'get_usuario/'.urlencode($usuario),'GET');
  if($obj2==false){
  
    return false;//esta repetido
  }else{
    return true;//esta repetido
  }

}


?>

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

  <script type="text/javascript" src="../js/funciones.js"></script>

  <!--fuentes-->
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 
  
</head>

<body>

  <header>
    <p><a href="../index.php"><i class="fas fa-chevron-left"></i></a></p>
    <p id="titulo">Farzone</p>
    <label for="menu_busqueda"></i></label>
  </header>

  <section>

    <h1 id="saludo"><?php if($cambio==false) echo "Estas a un paso de unirte a nuestra gran Familia";  else echo "BIENVENIDO";?></h1>

    <?php

if(isset($_POST["enviar"])){

  $repetido=repetido($_POST["usuario"]);


  if($repetido==false){


  $datos_usuario=array();

  $contra=md5($_POST["clave"]);

$datos_usuario["usuario"]=$_POST["usuario"];
$datos_usuario["password"]=$contra;
$datos_usuario["nombre"]=$_POST["nombre"];
$datos_usuario["apellido"]=$_POST["apellido"];
$datos_usuario["sexo"]=$_POST["sexo"];
$datos_usuario["fec_nac"]=$_POST["fec_nac"];

$obj=consumir_servicio_REST($url.'usuario/registrar','POST',$datos_usuario);

if(isset($obj->mensaje_error)){
die($obj->mensaje_error);
}else{

echo "<div class='notificacion' >";
echo "<p>El registro se ha completado exitosamente , bienvenido <span class='nombre'>".$_POST["nombre"]."</span></p>";
echo "</div>";

$cambio=true;
  
}
  }

}elseif(isset($_POST["enviar2"])){

  $repetido=repetido($_POST["usuario2"]);


    if($repetido==false){


    $datos_usuario=array();
  
    $contra=md5($_POST["clave2"]);

$datos_usuario["usuario"]=$_POST["usuario2"];
$datos_usuario["password"]=$contra;
$datos_usuario["nombre"]=$_POST["nombre2"];
$datos_usuario["apellido"]=$_POST["apellido2"];
$datos_usuario["sexo"]=$_POST["sexo2"];
$datos_usuario["fec_nac"]=$_POST["fec_nac2"];

$obj=consumir_servicio_REST($url.'usuario/registrar','POST',$datos_usuario);

if(isset($obj->mensaje_error)){
  die($obj->mensaje_error);
}else{

  echo "<div class='notificacion' >";
  echo "<p>El registro se ha completado exitosamente , bienvenido <span class='nombre'>".$_POST["nombre2"]."</span></p>";
echo "</div>";

}
    }

  
  }


    
    ?>

    <span class="linea"></span>


    <form action="registrarse.php" method="POST" id="form_movil">

      <p>  <label for="usuario">Usuario:<?php if(isset($_POST["enviar"]) && $repetido==true) echo "<span class='error'>Este usuario ya existe</span>";?></label>
        <input  type="text" name="usuario" value="<?php if(isset($_POST['enviar']) && isset($_POST['usuario'])) echo $_POST['usuario']?>" id="usuario"  title="camila28" placeholder="Camila28" required /></p>

      <p><label for="contra">Contraseña:</label>
        <input  type="password" name="clave" value="<?php if(isset($_POST['enviar']) && isset($_POST['clave'])) echo $_POST['clave']?>" id="contra" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
NO puede tener otros símbolos." pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required>
      </p>

      <p><label for="nombre">Nombre:</label>
        <input  type="text" name="nombre" id="nombre" value="<?php if(isset($_POST['enviar']) && isset($_POST['nombre'])) echo $_POST['nombre']?>" required></p>

      <p><label for="apellido">Apellido:</label>
        <input  type="text" name="apellido" id="apellido" value="<?php if(isset($_POST['enviar']) && isset($_POST['apellido'])) echo $_POST['apellido']?>" required></p>

      <p><label>Sexo:</label>
        <ul>
          <li><input type="radio" name="sexo" value="mujer" class="sexo" />Mujer</li>
          <li><input type="radio" name="sexo" value="hombre" class="sexo" />Hombre</li>
          <li><input type="radio" name="sexo" value="otro" class="sexo" checked />Otro</li>

        </ul>
      </p>

      <p><label for="fec_nac">Fecha de nacimiento: </label>
        <input type="date" name="fec_nac" id="fec_nac" value="<?php if(isset($_POST['enviar']) && isset($_POST['fec_nac'])) echo $_POST['fec_nac']?>" required></p>

      <p id="iniciar_btn"><button type="submit" name="enviar" id="iniciar">Enviar</button></p>

    </form>


    <!--segundo formulario para la tablet-->

    <form action="registrarse.php" method="POST" id="form_escritorio">

      <table>

        <tr>
          <td>
            <label for="usuario">Usuario:<?php if(isset($_POST["enviar2"]) && $repetido==true) echo "<span class='error'>Este usuario ya existe</span>";?></label>
          </td>
        </tr>

        <tr>
          <td>
            <input type="text" name="usuario2" value="<?php if(isset($_POST['enviar2']) && isset($_POST['usuario2'])) echo $_POST['usuario2']?>" id="usuario2" class="required" title="camila28" placeholder="Camila28" required />
          </td>
        </tr>

        <tr>
          <td>
            <label for="contra">Contraseña:</label>
          </td>
        </tr>

        <tr>
          <td>
            <input type="password" name="clave2" value="<?php if(isset($_POST['enviar2']) && isset($_POST['clave2'])) echo $_POST['clave2']?>" id="contra2" title="Debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
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
            <input type="text" name="nombre2" id="nombre2" value="<?php if(isset($_POST['enviar2']) && isset($_POST['nombre2'])) echo $_POST['nombre2']?>" required>
          </td>
        </tr>

        <tr>
          <td>
            <label for="apellido">Apellido:</label>
          </td>
        </tr>

        <tr>
          <td>
            <input type="text" name="apellido2" id="apellido2" value="<?php if(isset($_POST['enviar2']) && isset($_POST['apellido2'])) echo $_POST['apellido2']?>" required>
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
              <li><input type="radio" name="sexo2" value="mujer" class="sexo2" />Mujer</li>
              <li><input type="radio" name="sexo2" value="hombre" class="sexo2" />Hombre</li>
              <li><input type="radio" name="sexo2" value="otro" checked  class="sexo2"/>Otro</li>

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
          <input type="date" name="fec_nac2" id="fec_nac2" value="<?php if(isset($_POST['enviar2']) && isset($_POST['fec_nac2'])) echo $_POST['fec_nac2']?>" required></p>
          </td>
        </tr>

      </table>

      <button type="submit" name="enviar2" id="iniciar" >Enviar</button>

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