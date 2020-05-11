<?php

require "../servicio_rest/funciones.php";
session_name("farzone");
session_start();


if(!isset($_SESSION['id_comunidad'])){
    header('Location: pagina_principal.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Farzone-comunidad</title>
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
   <!-- <button id="guardar"><i class="fas fa-plus"></i></button>-->
  </header>

  <section class='header_comunidad'>

  <form action="comunidad.php" method="post">

    <?php
    
        $obj=consumir_servicio_REST($url.'get_comunidad/'.urlencode($_SESSION['id_comunidad']),'GET');

        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        }

        foreach ($obj->comunidad as $key) {
            echo "<img class='icono' src='../uploads/img_comunidades/".$key->icono."'/>";

            echo "<div class='nombre_comunidad'>";
            echo "<p id='nombre_com'>".$key->nombre."</p>";
           
            switch ($key->categoria) {
                case 'diseño':
                    echo "<button id='cat_rosa' type='submit' value='diseño'>".$key->categoria."</button>";
                    break;
    
                case 'fotografia':
                    echo "<button type='submit' id='cat_fotografia' value='fotografia'>".$key->categoria."</button>";
                break;
    
                case 'ilustracion':
                    echo "<button type='submit' id='cat_ilustracion' value='ilustracion'>".$key->categoria."</button>";
                break;
    
                case 'musica':
                    echo "<button type='submit' id='cat_musica' value='musica'>".$key->categoria."</button>";
                break;
            }

            echo "</div>";

            echo "<div class='acerca_de_div'>";
            echo "<span class='acerca_de'>Acerca de esta comunidad:</span>";
            echo "</div>";
            echo "<button type='button' id='open_dec'><i class='fas fa-arrow-alt-circle-down'></i></button>";
    
            echo "<p id='descripcion'>".$key->descripcion."</p>";
        }

            echo "<button class='unirse' type='submit' name='unirse_btn'>Unirse</button>";
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

    var estado=true;

  $(document).ready(function(){

      $('#open_dec').click(function(){
        if(estado==true){
            $('#descripcion').fadeIn();
            estado=false;
        }else{
            $('#descripcion').fadeOut();
            estado=true;
        }
      });
  });

</script>

</html>