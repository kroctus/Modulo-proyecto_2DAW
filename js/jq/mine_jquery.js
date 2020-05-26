
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