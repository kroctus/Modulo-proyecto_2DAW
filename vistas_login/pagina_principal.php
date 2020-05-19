<?php

require "../servicio_rest/funciones.php";
session_name("farzone");
session_start();


if (isset($_POST["logout"])) {

  session_unset();
  header("Location: ../index.php");
  exit;
}elseif (isset($_POST["ajustes"])){
  header("Location: user_details.php");
  exit;
}elseif(isset($_POST["noticia"])){

  $_SESSION["id_noticia"]=$_POST["noticia"];
  header("Location: noticia.php");
  exit;
}elseif(isset($_POST["add"])){
  header("Location: add.php");
  exit;
}elseif(!isset($_SESSION["usuario"])){
  $_SESSION["restringido"]="";
  header("Location: ../vistas/inicio_sesion.php");

}elseif(isset($_POST["titulo_pub"])){

  $_SESSION["id_publicacion"]=$_POST['titulo_pub'];
  $_SESSION["categoria"]=$_POST["categoria"];
  header('Location: ../vistas/detalle_publicacion.php');
  exit;
  
}elseif (isset($_POST["usuario_pub"])) {
  $_SESSION['usuario_a_buscar']=$_POST['usuario_pub'];
  if($_POST['usuario_pub']==$_SESSION['usuario']){
    header('Location: ../vistas_login/user_details.php');
    exit;
  }
  header('Location: ../vistas/check_user.php');
  exit;
}elseif(isset($_POST["btn_comunidad"])){

  $_SESSION['id_comunidad']=$_POST["btn_comunidad"];
  header('Location: comunidades.php');
  exit;
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title id="eltitulo">Farzone</title>
  <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/logo_cuadrado2.png">
  <link rel="stylesheet" href="../css/estilo.css">
  <script src="../jq/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="../jq/JQueryRotate.js" type="text/javascript"></script>

  <!--carrusel jquery-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <!--fuentes-->
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> 

   <!--Mi script-->
   <script src="../js/funciones.js"></script>
</head>

<body>

  <header>
    <label for="menu" id="icono_menu">&#9776;</label>
    <p id="titulo">Farzone</p>
    <label id="menu_busqueda_btn"><i class="fas fa-search"></i></label>

    <p id="titulo_2"><a href="../index.php">Farzone</a></p>
    <input type="search" name="busqueda" value="" id="busq_2">
    <p id="iniciar_sesion_header"><a><i class="fas fa-user-circle"></i><?php if (isset($_SESSION["usuario"])) {

                                                                          echo $_SESSION["usuario"];
                                                                        } else {
                                                                          echo "Login";
                                                                        }
                                                                        ?></a></p>

  </header>

  <form method="post" action="pagina_principal.php" id="form_index">

    <div class="opc_session">

      <span><button type="button" id="cerrar_session"><i class="fas fa-times"></i></button></span>

      <button type="submit" name="logout" id="logout" class="btn_2"><i class="fas fa-sign-out-alt"></i>Cerrar session</button>
      <button type="submit" name="ajustes" id="ajustes" class="btn_2"><i class="fas fa-cog"></i>mi perfil</button>

      <button type="button" class="mode"><i class="fas fa-moon"></i>/<i class="fas fa-sun"></i></button>


    </div>

    <div class="opc_login">

      <span><button type="button" id="cerrar_session2"><i class="fas fa-times"></i></button></span>

      <button type="submit" name="logout" id="logout" class="mode"><i class="fas fa-sign-out-alt"></i>Cerrar session</button>
      <button type="submit" name="ajustes" id="ajustes" class="mode"><i class="fas fa-cog"></i>mi perfil</button>

      <button type="button" class="mode"><i class="fas fa-moon"></i>/<i class="fas fa-sun"></i></button>


    </div>

  </form>

  <!--<input type="checkbox" name="" value="" id="menu">-->

  <nav id="menu_desplegable">
    <span>
      <li id="login"><a><i class="fas fa-user-circle"></i><?php if (isset($_SESSION["usuario"])) {

                                                            echo $_SESSION["usuario"];
                                                          } else {
                                                            echo "Login";
                                                          }
                                                          ?></a></li>
      <li><a href="index.php"><i class="fas fa-home"></i>Inicio</a></li>
      <li><a href="#"><i class="fas fa-newspaper"></i>Noticias</a></li>
      <li><a href="#comunidad"><i class="fas fa-users"></i>Comunidades</a></li>
      <li><a href="#"><i class="fas fa-cogs"></i>Ajustes</a></li>
    </span>
  </nav>

  <input type="checkbox" name="" value="" id="menu_busqueda">

  <nav id="menu_desplegable_busqueda">
    <li><input type="search" name="busqueda" value="" placeholder="Busca algo" /></li>
  </nav>

  <div class="bloqueo">



  </div>

  
  <section>

  <form action="pagina_principal.php" method='post'>

    <article id="intro">

      <video id="video" loop autoplay preload muted>
        <source src="../videos/4K_8.webm" type='video/webm; codecs="vp8,vorbis"' />
      </video>
      <form method="post" action="pagina_principal.php">
        <h2>Tu espacio para ser creativo</h2>
        <button type="submit" name="empezar">Bienvenido <?php echo $_SESSION["usuario"]?></button>
      </form>
    </article>



    <div id="noticias">
      <h1>Noticias</h1>

      <div class="carousel">
        <div class="slider">

          <?php

          $obj = consumir_servicio_REST($url . 'noticias', 'GET');
          if (isset($obj->mensaje_error)) {
            die($obj->mensaje_error);
          } else {

            foreach ($obj->noticias as $key) {
              echo "<div class='div_noticia'>";

              echo "<form method='post' action='pagina_principal.php'><button type='submit' name='noticia' value='" . $key->id_noticia . "'>" . $key->titulo . "</button></form>";
              echo "<p>" . $key->copete . "</p>";
              echo "<img src='../img/" . $key->imagen . "'>";

              echo "</div>";
            }
          }

          ?>
        </div>
      </div>
    </div>

    <article id="musica" class="categorias">

      <h2><a href="../vistas/categoria_musica.php">Música</a></h2>
      <p>Todos los generos que puedas imaginar y si no encuentras uno subelo tu mismo</p>

    </article>

    <article id="diseño" class="categorias">


      <h2><a href="../vistas/categoria_diseño.php">Diseño</a></h2>
      <p>Sube aquí tus diseños y descubre también el arte de los demás</p>

    </article>

    <article id="fotografia" class="categorias">


      <h2><a href="../vistas/categoria_fotografia.php">Fotografía<a href="#"></a></h2>
      <p>nada mejor que capturar ese momento especial, bienvenidos fotografos</p>

    </article>

    <article id="ilustracion" class="categorias">


      <h2><a href="../vistas/categoria_ilustracion.php">Ilustración</a></h2>
      <p>nada mejor que capturar ese momento especial, bienvenidos fotografos</p>

    </article>


    <form method="post" action="pagina_principal.php" id="form_publicaciones">
    <?php
   
    $aux = consumir_servicio_REST($url . 'publicaciones', 'GET');
    if (isset($aux->mensaje_error)) {
      die($aux->mensaje_error);
    } else {
      foreach ($aux->publicaciones as $key) {

        $obj=consumir_servicio_REST($url.'get_usuario_by_id/'.urlencode($key->id_usuario),'GET');
        if(isset($obj->mensaje_error)){
          die($obj->mensaje_error);
        }

        foreach ($obj->usuario as $kay) {
          $usuario=$kay->usuario;
        }


        switch ($key->categoria) {

          case ('diseño'):
            echo "<div class='publicacion'>";
            echo "<img src='../uploads/pictures/" . $key->archivo . "'>";
            echo '<div>';
            echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
            echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
            echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
            echo '</div>';
            echo "</div>";
            break;

          case ('fotografia'):
            echo "<div class='publicacion'>";
            echo "<img src='../uploads/pictures/" . $key->archivo . "'>";
            echo '<div>';
            echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
            echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
            echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
            echo '</div>';
            echo "</div>";
            break;

          case ('ilustracion'):
            echo "<div class='publicacion'>";
            echo "<img src='../uploads/pictures/" . $key->archivo . "'>";
            echo '<div>';
            echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
            echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
            echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
            echo '</div>';
            echo "</div>";
            break;

          case ('musica'):

            echo "<div class='publicacion'>";
            echo "<img src='../img_comprimidas/musica.webp'>";
            echo '<div>';
            echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
            echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
            echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
            echo '</div>';
            echo "</div>";

            break;
          
        }
      }

      echo "<span class='espacio'></span>";

    }

    ?>

    </form>

    <form action="pagina_principal.php" method="post"/>

    <p id="subcategoria_title">Musica</p>
    <p class="ver_todas"><a href="../vistas/categoria_musica.php">Ver todas</a></p>

    <?php

$obj = consumir_servicio_REST($url . 'get_publicaciones_by_tipo_limit/'.urlencode('musica'), 'GET');
if (isset($obj->mensaje_error)) {
  die($obj->mensaje_error);
} else {

  $obj3=consumir_servicio_REST($url.'get_usuario_by_id/'.urlencode($key->id_usuario),'GET');
  if(isset($obj3->mensaje_error)){
    die($obj3->mensaje_error);
  }

  foreach ($obj3->usuario as $kay) {
    $usuario=$kay->usuario;
  }

  foreach ($obj->publicaciones as $key) {

      echo "<article class='subcategoria_contenido'>";
        echo "<img src='../img_comprimidas/musica.webp'>";
        echo "<div>";
          echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
          echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
          echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
        echo "</div>";
      echo "</article>";


  }
}

?>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
      <div>
      <button class='titulo'>".$key->titulo."</button>
      <button class='autor'>".$usuario."</button>
      </div>
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
      <div>
      <button class='titulo'>".$key->titulo."</button>
      <button class='autor'>".$usuario."</button>
      </div>
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
      <div>
      <button class='titulo'>".$key->titulo."</button>
      <button class='autor'>".$usuario."</button>
      </div>
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
      <div>
      <button class='titulo'>".$key->titulo."</button>
      <button class='autor'>".$usuario."</button>
      </div>
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
      <div>
      <button class='titulo'>".$key->titulo."</button>
      <button class='autor'>".$usuario."</button>
      </div>
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
      <div>
      <button class='titulo'>".$key->titulo."</button>
      <button class='autor'>".$usuario."</button>
      </div>
    </article>


    <p id="subcategoria_title">Diseño</p>
    <p class="ver_todas"><a href="../vistas/categoria_diseño.php">Ver todas</a></p>

    <?php

$obj = consumir_servicio_REST($url . 'get_publicaciones_by_tipo_limit/'.urlencode('diseño'), 'GET');
if (isset($obj->mensaje_error)) {
  die($obj->mensaje_error);
} else {

  $obj3=consumir_servicio_REST($url.'get_usuario_by_id/'.urlencode($key->id_usuario),'GET');
  if(isset($obj3->mensaje_error)){
    die($obj3->mensaje_error);
  }

  foreach ($obj3->usuario as $kay) {
    $usuario=$kay->usuario;
  }

  foreach ($obj->publicaciones as $key) {

      echo "<article class='subcategoria_contenido'>";
        echo "<img src='../uploads/pictures/".$key->archivo."'>";
        echo "<div>";
        echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
        echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
        echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
        echo "</div>";
      echo "</article>";


  }
}

?>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/diseño.webp" alt="">
    </article>



    <p id="subcategoria_title">Fotografía</p>
    <p class="ver_todas"><a href="../vistas/categoria_fotografia.php">Ver todas</a></p>

    <?php

$obj = consumir_servicio_REST($url . 'get_publicaciones_by_tipo_limit/'.urlencode('fotografia'), 'GET');
if (isset($obj->mensaje_error)) {
  die($obj->mensaje_error);
} else {

  $obj3=consumir_servicio_REST($url.'get_usuario_by_id/'.urlencode($key->id_usuario),'GET');
  if(isset($obj3->mensaje_error)){
    die($obj3->mensaje_error);
  }

  foreach ($obj3->usuario as $kay) {
    $usuario=$kay->usuario;
  }

  foreach ($obj->publicaciones as $key) {

      echo "<article class='subcategoria_contenido'>";
        echo "<img src='../uploads/pictures/".$key->archivo."'>";
        echo "<div>";
        echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
        echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
        echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
        echo "</div>";
      echo "</article>";


  }
}

?>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/foto.webp" alt="">
    </article>


    <p id="subcategoria_title">Ilustracion</p>
    <p class="ver_todas"><a href="../vistas/categoria_ilustracion.php">Ver todas</a></p>

    <?php

$obj = consumir_servicio_REST($url . 'get_publicaciones_by_tipo_limit/'.urlencode('ilustracion'), 'GET');
if (isset($obj->mensaje_error)) {
  die($obj->mensaje_error);
} else {

  $obj3=consumir_servicio_REST($url.'get_usuario_by_id/'.urlencode($key->id_usuario),'GET');
  if(isset($obj3->mensaje_error)){
    die($obj3->mensaje_error);
  }

  foreach ($obj3->usuario as $kay) {
    $usuario=$kay->usuario;
  }

  foreach ($obj->publicaciones as $key) {

      echo "<article class='subcategoria_contenido'>";
        echo "<img src='../uploads/pictures/".$key->archivo."'>";
        echo "<div>";
        echo "<button class='titulo' type='submit' name='titulo_pub' value='".$key->id_publicacion."'>".$key->titulo."</button>";
        echo "<button class='autor' type='submit' name='usuario_pub' value='".$usuario."'>".$usuario."</button>";
        echo "<input type='hidden' name='categoria' value='".$key->categoria."'/>";
        echo "</div>";
      echo "</article>";


  }
}

?>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/ilustracion.webp" alt="">
    </article>


    </form>





    <span id="arrow"><i class="fas fa-angle-double-down"></i></span>

    <article class="categorias" id="comunidad">

      <h3 id="comunidad_text">Comunidades</h3>

      <?php 
      
          $obj=consumir_servicio_REST($url.'comunidades','GET');
          if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
          }else{
            
          foreach ($obj->comunidades as $key) {
            
            echo "<p class='comunidades'><button type='submit' name='btn_comunidad' value='".$key->id_comunidad."'>".$key->nombre."</button></p>";

          }
          }
      ?>


      <p id="falta_comunidad"><a href="#">¿Hace falta alguna comunidad?</a></p>


    </article>


    <div id="up">
      <i class="far fa-caret-square-up 5x"></i>
    </div>

    <div id='plus'>
    <form action="pagina_principal.php" method="post">
    <button type='submit' name='add'><i class="fas fa-plus-circle"></i></button>
    </form>
    </div>



    <p id="quienes"><a href="vistas/quienessomos.php">¿Quienes somos?</a></p>

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
  var estadoMenu = false;
  $(document).ready(function() {

    $('#plus').css({
      "display":"block"
    });

    $('header').children('label:first-child').click(function() {

      if (estadoMenu == false) {

        estadoMenu = true;
      } else {


        estadoMenu = false;
      }

    });

    //Efecto rotatorio con pluggin externo
    $('#arrow').mouseover(function() {
      $(this).rotate({

        angle: 0,
        animateTo: 360


      });
    });


  });


  // el scroll top
  //La cabecera debe mantenerse fija cuando se visualice el botón de ir hacia arriba y cierta transparencia
  $(document).scroll(function() {
    var scroll = $(this).scrollTop();
    if (scroll >= 1000 && estadoMenu3 == false) {
      // cuando el scroll llegue a ese punto cambiará la opacidad de la cabecera creando el efecto tranparente
      $('header').css("opacity", "0.7");
      if (window.matchMedia('(min-width: 1250px)').matches) {
        $('#up').fadeIn();
      }

    } else {
      //regreso a su estado original
      $('header').css("opacity", "1");
      $('#up').fadeOut();
    }
    //Cuando se haga el click sobre el div(el boton de ir hacia arriba) 
    $('#up').click(function() {

      $('html').animate({
        scrollTop: 0
      }, function() {
        $('html').stop(true);
      });

    });

    if (window.matchMedia('(min-width: 1250px)').matches) {
      $('.opc_login').css({

        "visibility": "visible",

      });
    } else {
      $('.opc_login').fadeOut();
    }

  });
</script>


<script>
  //Slider con jquery
  $(document).ready(function() {
    $('.slider').bxSlider();



  });
</script>

<script>
  var control_bloqueo = false;
  var estadoMenu3 = false;
  $(document).ready(function() {

    console.log("CAMBIO: " + cambio);
    


    $(window).resize(function() {

      //Menú desplegable solo en tablet y movil.
      if (window.matchMedia('(min-width: 1250px)').matches) {

        console.log("eSTRADO DEL MENMU ES ");


        $('.bloqueo').css({
          "display": "none",
        });

        $("#menu_desplegable").css({
          "transform": "translate(-80vw,-40px)"
        });

        $("#menu_desplegable_busqueda").css({
          "transform": "translate(250%,1%)"
        });



      }
    });


    //Menu desplegable izqu
    $("#icono_menu").click(function() {

      if (estadoMenu3 == false) {
        $("#menu_desplegable").css({
          "transform": "translate(-12px)",
          "z-index": "10001",
          "opacity": "1",
        });

        $('.bloqueo').css({
          "display": "block",
        });

        estadoMenu3 = true;

      } else {
        $("#menu_desplegable").css({
          "transform": "translate(-95vw,-40px)"
        });

        if (control_bloqueo == false) {
          $('.bloqueo').css({
            "display": "none",
          });
        }

        estadoMenu3 = false;
      }

    });

    //Menu desplegable derc

    var estadoBusqueda = false;

    $("#menu_busqueda_btn").click(function() {

      if (estadoBusqueda == false) {
        $("#menu_desplegable_busqueda").css({
          "transform": "translate(35%)",
          "z-index": "10001",
          "opacity": "1",
        });
        /*
                $('.bloqueo').css({
                  "display": "block",
                });
        */
        estadoBusqueda = true;

      } else {

        console.log("FUNCIONO");

        $("#menu_desplegable_busqueda").css({
          "transform": "translate(250%,1%)"
        });

        if (control_bloqueo == false) {
          $('.bloqueo').css({
            "display": "none",
          });
        }

        estadoBusqueda = false;
      }

    });


    /*Opciones login*/

    $('#login').click(function() {
      $(".opc_session").fadeIn();
      $(".opc_session").css({
        "transform": "translate(0vw,1vh)",
      });

      $('.bloqueo').css({
        "display": "block",
      });

      $('#menu_desplegable').fadeOut();

      control_bloqueo = true;

    });

    $('#cerrar_session').click(function() {

      control_bloqueo = false;

      $(".opc_session").fadeOut();
      $(".opc_session").css({
        "transform": "translate(0vw,-100vh)",
      });



      $('#menu_desplegable').fadeIn();
    });

    if (control_bloqueo == false) {
      $('.bloqueo').css({
        "display": "none",
      });
    } else {
      $('.bloqueo').css({
        "display": "block",
      });
    }


  });
</script>

<script>
  /*Opciones login*/
  /*iniciar_sesion_header*/

  $(document).ready(function() {

    /*Opciones login*/

    $('#iniciar_sesion_header').click(function() {
      $(".opc_login").fadeIn();
      $(".opc_login").css({
        "transform": "translate(0vw,1vh)",
      });

      $('.bloqueo').css({
        "display": "block",
      });

      $('#menu_desplegable').fadeOut();

      control_bloqueo = true;

    });

    $('#cerrar_session2').click(function() {

      $(".opc_login").fadeOut();
      $(".opc_login").css({
        "transform": "translate(0vw,-100vh)",
      });

      $('.bloqueo').css({
        "display": "none",
      });

    });



  });
</script>

<script>
  /**Modo oscuro/dia */

  $(document).ready(function() {
    $('.mode').click(function() {

      $('body').css({
        "background-color": "white",
        "color": "white",
      });

      $('section').css({
        "background-color": "white",
        "color": "black"
      });

      $('section').children('p').css({
        "color": "black",
      });

      $('.ver_todas').children('a').css({
        "color": "black",
      });

      $('section').children('a').css({
        "color": "black",
      });

      $('#comunidad').css({
        "border": "none",
      });

      $('#up').css({
        "color": "black",
      });

      $('#arrow').css({
        "color": "black",
      });



    });
  });
</script>

</html>