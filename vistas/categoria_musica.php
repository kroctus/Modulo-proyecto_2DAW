<?php
require "../servicio_rest/funciones.php";
session_name("farzone");
session_start();

if(isset($_POST['publicacion_btn'])){

  $_SESSION['publicacion_a_buscar']=$_POST['publicacion_btn'];
  header('Location: ../vistas/detalle_publicacion.php');
  exit;

}elseif(isset($_POST["usuario"])){
  $_SESSION["usuario_a_buscar"]=$_POST["usuario"];
  header('Location: ../vistas/check_user.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Farzone-musica</title>
  <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/logo_cuadrado2.png">
  <link rel="stylesheet" href="../css/estilos_categoria_musica.css">
  <script src="../jq/jquery-3.1.1.min.js" type="text/javascript"></script>

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
    <label for="menu_busqueda"><i class="fas fa-search"></i></label>

    <p id="titulo_2"><a href="../index.php">Farzone</a></p>
    <input type="search" name="busqueda" value="" id="busq_2">
    <p id="iniciar_sesion_header"><a><i class="fas fa-user-circle"></i>iniciar sesion</a></p>




  </header>

  <form method="post" action="categoria_musica.php">

    <div class="opc_session">

      <span><button type="button" id="cerrar_session"><i class="fas fa-times"></i></button></span>

      <button type="submit" name="Iniciar" id="iniciar" class="btn">Iniciar</button>
      <button type="submit" name="Registrarte" id="registrar" class="btn">Registrarte</button>


    </div>

    <div class="opc_login">

      <span><button type="button" id="cerrar_session2"><i class="fas fa-times"></i></button></span>

      <button type="submit" name="Iniciar" id="iniciar" class="btn">Iniciar</button>
      <button type="submit" name="Registrarte" id="registrar" class="btn">Registrarte</button>


    </div>

  </form>

  <nav id="menu_desplegable">
    <span>
      <li><a id="login"><i class="fas fa-user-circle"></i>Iniciar sesión</a></li>
      <li><a href="../index.php"><i class="fas fa-home"></i>Inicio</a></li>
      <li><a href="#"><i class="fas fa-newspaper"></i>Noticias</a></li>
      <li><a href="#comunidad"><i class="fas fa-users"></i>Comunidades</a></li>
      <li><a href="#"><i class="fas fa-cogs"></i>Ajustes</a></li>
    </span>
  </nav>


  <input type="checkbox" name="" value="" id="menu_busqueda">

  <nav id="menu_desplegable_busqueda">
    <li><input type="search" name="busqueda" value="" placeholder="Busca algo" /><i class="fas fa-search"></i></li>
  </nav>

  <div class="bloqueo">



  </div>
  <section>

    <article class="">
      <h3>musica</h3>
    </article>

    <span id="linea"></span>


    
    <?php
   echo '<form action="categoria_musica.php" method="post">';
    $categoria='musica';
    $obj = consumir_servicio_REST($url . 'get_publicaciones_by_tipo/' . $categoria, 'GET');
    if (isset($obj->mensaje_error)) {
      echo "<p>No hay publicaciones</p>";
      die($obj->mensaje_error);
    } else {

  foreach ($obj->publicaciones as $aux) {
    $id_usuario = $aux->id_usuario;

    $obj3 = consumir_servicio_REST($url . 'get_usuario_by_id/' . urlencode($id_usuario), 'GET');
    if (isset($obj3->mensaje_error)) {
      die($obj3->mensaje_error);
    } else {
      foreach ($obj3->usuario as $key) {
        $usuario=$key->usuario;
        
      }
    }

    echo' <audio id="videoPlayer'.$aux->id_publicacion.'">';
    echo'  <source src="../uploads/audio/'.$aux->archivo.'" />';
    echo'  Your browser does not support the audio element.';
    echo' </audio>';

    echo'<article class="contenido">';
    echo '<p><button type="submit" name="usuario" value="'.$usuario.'" class="btn_opc_rep">'.$usuario.'</button></p>';
    echo '<p><button type="submit" name="publicacion_btn" value="'.$aux->id_publicacion.'" class="btn_opc_rep">'.$aux->titulo.'</button></p>';
    echo '<span id="linea"></span>';

    echo '<button type="button" name="button" onclick="playPause('.$aux->id_publicacion.')"><i class="fas fa-play fa-1x"></i></i></button>';
    echo '<button type="button" name="button" onclick="parar('.$aux->id_publicacion.')"><i class="fas fa-stop fa-1x"></i></button>';
    echo '<button type="button" name="button" onclick="reiniciar('.$aux->id_publicacion.')"><i class="fas fa-redo-alt fa-1x"></i></button>';
    echo '<button type="button" name="button" onclick="low(1,'.$aux->id_publicacion.')"><i class="fas fa-backward"></i></button>';
    echo '<button type="button" name="button" onclick="fast(1,'.$aux->id_publicacion.')"><i class="fas fa-forward"></i></button>';
    echo '<button type="button" name="button" onclick="silenciar('.$aux->id_publicacion.')" id="muted"><i class="fas fa-volume-up"></i></button>';

    echo ' <span id="tiempo'.$aux->id_publicacion.'"></span>';

    echo '</article>';
  }
}
        echo "<form>";
    ?>



<!--    <article class="contenido">
      <p>Autor: nombre</p>
      <p>titulo: titulo</p>
      <span id="linea"></span>

      <button type="button" name="button" onclick="playPause()"><i class="fas fa-play fa-1x"></i></i></button>
      <button type="button" name="button" onclick="parar()"><i class="fas fa-stop fa-1x"></i></button>
      <button type="button" name="button" onclick="reiniciar()"><i class="fas fa-redo-alt fa-1x"></i></button>
      <button type="button" name="button" onclick="low(1)"><i class="fas fa-backward"></i></button>
      <button type="button" name="button" onclick="fast(1)"><i class="fas fa-forward"></i></button>
      <button type="button" name="button" onclick="silenciar()" id="muted"><i class="fas fa-volume-up"></i></button>

      <span id="tiempo"></span>

    </article> -->




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

    <div id="up">
      <i class="far fa-caret-square-up 5x"></i>
    </div>



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
  /*MUSIC SCRIPT*/


  function playPause(id) {
    var video = document.getElementById("videoPlayer"+id);
    if (video.paused)
      video.play(id);
    else
      video.pause(id);
  }

  function reload(id) {
    var video = document.getElementById("videoPlayer"+id);
    video.load();
  }

  function makeLarge(id) {
    var video = document.getElementById("videoPlayer"+id);
    video.requestFullscreen(id);
  }

  function makeSmall(id) {
    var video = document.getElementById("videoPlayer"+id);
    video.width = 250;
  }

  function makeNormal(id) {
    var video = document.getElementById("videoPlayer"+id);
    video.width = 500;
  }

  function parar(id) {
    var video = document.getElementById("videoPlayer"+id);
    video.pause(id);
    video.currentTime = 0;
  }

  function reiniciar(id) {
    var video = document.getElementById("videoPlayer"+id);
    video.pause(id);
    video.currentTime = 0;
    video.play(id);
  }

  function silenciar(id) {
    var video = document.getElementById("videoPlayer"+id);
    if (video.muted == true) {
      console.log("silencio");
      video.muted = false;
      document.getElementById('muted').innerHTML = '<i class="fas fa-volume-up"></i>';
    } else {
      video.muted = true;
      console.log("dessilencio");
      document.getElementById('muted').innerHTML = '<i class="fas fa-volume-mute">';
    }
  }

  function desmutear(id) {
    var video = document.getElementById("videoPlayer"+id);
    video.muted = false;
  }

  function fast(value,id) {
    var video = document.getElementById("videoPlayer"+id);
    video.playbackRate += value;
    video.play();
  }

  function low(value,id) {
    var video = document.getElementById("videoPlayer"+id);
    video.playbackRate -= value;
    video.play();
  }

  function skip(value,id) {
    var video = document.getElementById("videoPlayer"+id);
    video.currentTime += value;
  }

  function skipMinus(value,id) {
    var video = document.getElementById("videoPlayer"+id);
    video.currentTime -= value;
  }




  function hora(segundos,id) {
    var video = document.getElementById("videoPlayer"+id);
    var d = new Date(segundos * 1000);
    // Ajuste de las 23 horas
    var hora = (d.getHours() == 0) ? 23 : d.getHours() - 1;
    var hora = (hora < 9) ? "0" + hora : hora;
    var minuto = (d.getMinutes() < 9) ? "0" + d.getMinutes() : d.getMinutes();
    var segundo = (d.getSeconds() < 9) ? "0" + d.getSeconds() : d.getSeconds();
    return minuto + ":" + segundo;
  }

  video.addEventListener("timeupdate", function(ev) {
    var video = document.getElementById("videoPlayer"+id);
    document.getElementById("tiempo"+id).innerHTML = hora(video.currentTime);
  }, true);


  //volumen

  barra.addEventListener("change", function(ev) {
    var video = document.getElementById("videoPlayer"+id);
    video.volume = ev.currentTarget.value;
  }, true);
</script>


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



</html>