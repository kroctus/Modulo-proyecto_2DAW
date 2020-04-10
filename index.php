<?php

session_name("proyecto");
session_start();

if (isset($_POST["Iniciar"])) {

  header("Location: vistas/inicio_sesion.php");
  exit;
}elseif(isset($_POST["Registrarte"])){
  header("Location: vistas/registrarse.php");
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
  <link rel="shortcut icon" href="img/logo_cuadrado2.png">
  <link rel="stylesheet" href="css/estilo.css">
  <script src="jq/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="jq/JQueryRotate.js" type="text/javascript"></script>

  <!--carrusel jquery-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
</head>

<body>

  <header>
    <label for="menu" id="icono_menu">&#9776;</label>
    <p id="titulo">Farzone</p>
    <label id="menu_busqueda_btn"><i class="fas fa-search"></i></label>

    <p id="titulo_2"><a href="index.php">Farzone</a></p>
    <input type="search" name="busqueda" value="" id="busq_2">
    <p id="iniciar_sesion_header"><a><i class="fas fa-user-circle"></i><?php if (isset($_SESSION["usuario"])) {

                                                                          echo $_SESSION["usuario"];
                                                                        } else {
                                                                          echo "Login";
                                                                        }
                                                                        ?></a></p>

  </header>

  <form method="post" action="index.php">

    <div class="opc_session">

      <span><button type="button" id="cerrar_session"><i class="fas fa-times"></i></button></span>

      <button type="submit" name="Iniciar" id="iniciar" class="btn">Iniciar</button>
      <button type="submit" name="Registrarte" id="registrar" class="btn">Registrarte</button>

      <button type="button" class="mode"><i class="fas fa-moon"></i>/<i class="fas fa-sun"></i></button>


    </div>

    <div class="opc_login">

      <span><button type="button" id="cerrar_session2"><i class="fas fa-times"></i></button></span>

      <button type="submit" name="Iniciar" id="iniciar" class="btn">Iniciar</button>
      <button type="submit" name="Registrarte" id="registrar" class="btn">Registrarte</button>

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

    <article id="intro">

      <h2>Bienvenido al mundo de contenidos</h2>
      <button type="button" name="button">Empezar</button>

    </article>

    <div id="noticias">
      <h1>Noticias</h1>

      <div class="carousel">
        <div class="slider">
          <div>
            <img src="img_comprimidas/carrusel.webp">
          </div>
          <div>
            <img src="img_comprimidas/with.webp">
          </div>

          <div>
            <img src="img_comprimidas/java.webp">
          </div>
        </div>
      </div>
    </div>

    <article id="musica" class="categorias">

      <h2><a href="vistas/categoria_musica.php">Música</a></h2>
      <p>Todos los generos que puedas imaginar y si no encuentras uno subelo tu mismo</p>

    </article>

    <article id="diseño" class="categorias">


      <h2><a href="vistas/categoria_diseño.php">Diseño</a></h2>
      <p>Sube aquí tus diseños y descubre también el arte de los demás</p>

    </article>

    <article id="fotografia" class="categorias">


      <h2><a href="vistas/categoria_fotografia.php">Fotografía<a href="#"></a></h2>
      <p>nada mejor que capturar ese momento especial, bienvenidos fotografos</p>

    </article>

    <article id="ilustracion" class="categorias">


      <h2><a href="vistas/categoria_ilustracion.php">Ilustración</a></h2>
      <p>nada mejor que capturar ese momento especial, bienvenidos fotografos</p>

    </article>


    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>

    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
    </article>


    <p id="subcategoria_title">Musica</p>
    <p class="ver_todas"><a href="vistas/categoria_musica.php">Ver todas</a></p>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/musica.webp" alt="">
    </article>

    <p id="subcategoria_title">Diseño</p>
    <p class="ver_todas"><a href="vistas/categoria_diseño.php">Ver todas</a></p>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/diseño.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/diseño.webp" alt="">
    </article>



    <p id="subcategoria_title">Fotografía</p>
    <p class="ver_todas"><a href="vistas/categoria_fotografia.php">Ver todas</a></p>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/foto.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/foto.webp" alt="">
    </article>


    <p id="subcategoria_title">Ilustracion</p>
    <p class="ver_todas"><a href="vistas/categoria_ilustracion.php">Ver todas</a></p>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/ilustracion.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="img_comprimidas/ilustracion.webp" alt="">
    </article>








    <span id="arrow"><i class="fas fa-angle-double-down"></i></span>

    <article class="categorias" id="comunidad">

      <h3 id="comunidad_text">Comunidades</h3>

      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>
      <p class="comunidades"><a href="#">Comunidad</a></p>



      <p id="falta_comunidad"><a href="#">¿Hace falta alguna comunidad?</a></p>


    </article>

    <div id="plus">
      <i class="fas fa-plus-circle 5x"></i>
    </div>


    <div id="up">
      <i class="far fa-caret-square-up 5x"></i>
    </div>


    <p id="quienes"><a href="vistas/quienessomos.php">¿Quienes somos?</a></p>

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
          "transform": "translate(-80vw,-40px)"
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

    var estadoBusqueda= false;

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

  $(document).ready(function(){
    $('.mode').click(function(){
      
      $('body').css({
        "background-color":"white",
        "color":"white",
      });

      $('section').css({
        "background-color":"white",
        "color":"black"
      });

      $('section').children('p').css({
        "color":"black",
      });

      $('.ver_todas').children('a').css({
        "color":"black",
      });

      $('section').children('a').css({
        "color":"black",
      });

      $('#comunidad').css({
        "border":"none",
      });

      $('#up').css({
        "color":"black",
      });

      $('#arrow').css({
        "color":"black",
      });



    });
  });

</script>


</html>