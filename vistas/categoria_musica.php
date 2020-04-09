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
</head>

<body>

  <header>
    <label for="menu" id="icono_menu">&#9776;</label>
    <p id="titulo">Farzone</p>
    <label for="menu_busqueda"><i class="fas fa-search"></i></label>

    <p id="titulo_2"><a href="../index.php">Farzone</a></p>
    <input type="search" name="busqueda" value="" id="busq_2">
    <p id="iniciar_sesion_header"><a href="../inicio_sesion.php"><i class="fas fa-user-circle"></i>iniciar sesion</a></p>




  </header>

  <nav id="menu_desplegable">
    <span>
      <li><a href="../inicio_sesion.php"><i class="fas fa-user-circle"></i>Iniciar sesión</a></li>
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


  <section>

    <article>
      <h1>Noticias</h1>

      <div class="carousel">
        <div class="slider">
          <div>
            <img src="../img_comprimidas/carrusel.webp">
          </div>
          <div>
            <img src="../img_comprimidas/with.webp">
          </div>

          <div>
            <img src="../img_comprimidas/java.webp">
          </div>
        </div>
      </div>
    </article>
    </article>

    <article class="">
      <h3>musica</h3>
    </article>

    <span id="linea"></span>

    <article id="diseño" class="categorias">

      <h2><a href="#">Subcategoria musica 1</a></h2>
      <p>Todos los generos que puedas imaginar y si no encuentras uno subelo tu mismo</p>

    </article>

    <article id="musica" class="categorias">


      <h2><a href="#">Subcategoria musica 2</a></h2>
      <p>Sube aquí tus musicas y descubre también el arte de los demás</p>

    </article>

    <article id="fotografia" class="categorias">


      <h2><a href="#">Subcategoria musica 3<a href="#"></a></h2>
      <p>nada mejor que capturar ese momento especial, bienvenidos fotografos</p>

    </article>

    <article id="ilustracion" class="categorias">


      <h2><a href="#">Subcategoria Diseño 4</a></h2>
      <p>sskdnolsnoshnoishdosjsjd</p>

    </article>

    <article id="diseño" class="categorias">

      <h2><a href="#">Subcategoria musica 1</a></h2>
      <p>Todos los generos que puedas imaginar y si no encuentras uno subelo tu mismo</p>

    </article>

    <article id="musica" class="categorias">


      <h2><a href="#">Subcategoria musica 2</a></h2>
      <p>Sube aquí tus musicas y descubre también el arte de los demás</p>

    </article>

    <article id="fotografia" class="categorias">


      <h2><a href="#">Subcategoria musica 3<a href="#"></a></h2>
      <p>nada mejor que capturar ese momento especial, bienvenidos fotografos</p>

    </article>

    <article id="ilustracion" class="categorias">


      <h2><a href="#">Subcategoria musica 4</a></h2>
      <p>sskdnolsnoshnoishdosjsjd</p>

    </article>


    <nav id="desplegable">
      <ul class="nav">
        <li><a href="">Lo más reciente<i class="fas fa-chevron-down"></i></a>
          <ul>
            <li><a href="">Submenu1</a></li>
            <li><a href="">Submenu2</a></li>
            <li><a href="">Submenu3</a></li>
            <li><a href="">Submenu4</a></li>
          </ul>
        </li>
        <li><a href="">Categorias<i class="fas fa-chevron-down"></i></a>
          <ul>
            <li><a href="">Submenu1</a></li>
            <li><a href="">Submenu2</a></li>
            <li><a href="">Submenu3</a></li>
            <li><a href="">Submenu4</a></li>
          </ul>
        </li>
        <li><a href="">Ordenar por<i class="fas fa-chevron-down"></i></a>
          <ul>
            <li><a href="">Submenu1</a></li>
            <li><a href="">Submenu2</a></li>
            <li><a href="">Submenu3</a></li>
            <li><a href="">Submenu4</a></li>
          </ul>
        </li>
      </ul>
    </nav>

    <audio id="videoPlayer">
      <source src="../sound/m1.mp3"/>
      Your browser does not support the audio element.
    </audio>



    

    <article class="contenido">
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
      
    </article>

    <article class="contenido">
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
      
    </article>

    <article class="contenido">
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
      
    </article>

    <article class="contenido">
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
      
    </article>

    <article class="contenido">
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
      
    </article>

    <article class="contenido">
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
      
    </article>

    <article class="contenido">
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
      
    </article>

    <article class="contenido">
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
      
    </article>

    <p id="subcategoria_title">Subcategoria1</p>
    <p class="ver_todas"><a href="#">Ver todas</a></p>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>




    <p id="subcategoria_title">Subcategoria2</p>
    <p class="ver_todas"><a href="#">Ver todas</a></p>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>


    <p id="subcategoria_title">Subcategoria3</p>
    <p class="ver_todas"><a href="#">Ver todas</a></p>
    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>


    <p id="subcategoria_title">Subcategoria4</p>
    <p class="ver_todas"><a href="#">Ver todas</a></p>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
    </article>

    <article class="subcategoria_contenido">
      <img src="../img_comprimidas/musica.webp" alt="">
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
  $(document).ready(function () {
    $('header').children('label:first-child').click(function () {

      if (estadoMenu == false) {
        $('section').css({
          "opacity": "0.5",
        });
        estadoMenu = true;
      } else {
        $('section').css("opacity", "1");
        estadoMenu = false;
      }

    });
  });


  // el scroll top

  $(document).scroll(function () {
    var scroll = $(this).scrollTop();
    //  console.log("scroll: " + scroll);

    //Aparece y desparece el div
    if (scroll >= 1155 && estadoMenu3==false) {

      $('header').css("opacity", "0.7");
      if (window.matchMedia('(min-width: 1250px)').matches) {
        console.log("hola");
        if (window.matchMedia('(min-width: 1250px)').matches) {
        console.log("hola");
        $('#up').fadeIn();
      }
      }
    } else {
      $('header').css("opacity", "1");
      $('#up').fadeOut();
    }
    //Cuando se haga el click sobre el div
    $('#up').click(function () {

      $('html').animate({
        scrollTop: 0
      }, function () {
        console.log("cancelo");
        $('html').stop(true);
      });

    });

  });

</script>

<script>
  var video = document.getElementById("videoPlayer");
  function playPause() {
      if (video.paused)
          video.play();
      else
          video.pause();
  }
  function reload() {
     video.load();
  }
  function makeLarge() {
      video.requestFullscreen();
  }
  function makeSmall() {
      video.width = 250;
  }
  function makeNormal() {
      video.width = 500;
  }

  function parar(){
    video.pause();
    video.currentTime = 0;
  }

  function reiniciar(){
    video.pause();
    video.currentTime = 0;
    video.play();
  }

  function silenciar(){
    if(video.muted==true){
      console.log("silencio");
          video.muted=false;
          document.getElementById('muted').innerHTML='<i class="fas fa-volume-up"></i>';
    }else {
      video.muted=true;
      console.log("dessilencio");
      document.getElementById('muted').innerHTML='<i class="fas fa-volume-mute">';
    }
  }

  function desmutear(){
      video.muted=false;
  }

  function fast(value){
    video.playbackRate +=value;
    video.play();
  }

  function low(value){
    video.playbackRate -=value;
    video.play();
  }

  function skip(value){
    video.currentTime += value;
  }

  function skipMinus(value){
    video.currentTime -= value;
  }




  function hora(segundos){
      var d=new Date(segundos*1000);
      // Ajuste de las 23 horas
      var hora = (d.getHours()==0)?23:d.getHours()-1;
      var hora = (hora<9)?"0"+hora:hora;
      var minuto = (d.getMinutes()<9)?"0"+d.getMinutes():d.getMinutes();
      var segundo = (d.getSeconds()<9)?"0"+d.getSeconds():d.getSeconds();
      return minuto+":"+segundo;
     }

video.addEventListener("timeupdate",function(ev){
document.getElementById("tiempo").innerHTML = hora(video.currentTime);
},true);


//volumen

barra.addEventListener("change",function(ev){
video.volume= ev.currentTarget.value;},true);



</script>

<script>

  //Slider con jquery
  $(document).ready(function(){
    $('.slider').bxSlider();
  });
</script>

<script>
  var estadoMenu3=false;
  $(document).ready(function () {
    $("#icono_menu").click(function () {

      console.log("hollaaaaaaaa");
      

      if (estadoMenu3 == false) {
        $("#menu_desplegable").css({
          "transform" : "translate(-12px)",
          "z-index": "10001",
          "opacity":"1",
        });

        $('.bloqueo').css({
          "display":"block",
        });

        estadoMenu3=true;
  }

  else {
        $("#menu_desplegable").css({
          "transform": "translate(-80vw,-40px)"
        });

        $('.bloqueo').css({
          "display":"none",
        });

        estadoMenu3=false;
  }

    });
  });

</script>

</html>