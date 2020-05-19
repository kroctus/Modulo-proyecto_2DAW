<?php

require "../servicio_rest/funciones.php";
session_name("farzone");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las comunidades</title>


    <link rel="shortcut icon" href="../img/logo_cuadrado2.png">

    <link rel="stylesheet" href="../css/estilo_user_details.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/tooltipster.bundle.min.css" />
    <script type="text/javascript" src="../js/funciones.js"></script>

    <!--fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <form action="check_user.php" method="post">
            <p id="titulo"><a href="../index.php">Farzone</i></a></p>
            <button type='submit' name='seguir_usuario' id="guardar">Crear comunidad</button>
        </form>
    </header>

    <section>

        <video id="video" loop autoplay preload muted>
            <?php

            $num=rand(1,3);

            switch ($num) {
                case 1:
                    echo '<source src="../videos/video.webm" type="video/webm; codecs="vp8,vorbis"" />';
                    break;
                case 2:
                    echo '<source src="../videos/video_2.webm" type="video/webm; codecs="vp8,vorbis"" />';
                    break;

                case 3:
                    echo '<source src="../videos/video_3.webm" type="video/webm; codecs="vp8,vorbis"" />';
                    break;

                default:
                echo '<source src="../videos/video.webm" type="video/webm; codecs="vp8,vorbis"" />';
                    break;
            }

            ?>
        </video>

        <div class='contenedor'>
            <h1 id='head_h1'>Encuentra la comunidad perfecta para ti</h1>
            <p class='advice'>Sino encuentras lo que necesitas siempre puedes crear una</p>
            <form action="check_user.php" method="post">
                <?php
                echo "<article id='user_block'>";
                echo "<button type='submit' name='seguir_usuario' id='btn_edit'>Crear una comunidad</button>";
                echo "</article>";

                echo "<article id='comunity_list'>";

                $obj = consumir_servicio_REST($url . 'comunidades', 'GET');
                if (isset($obj->mensaje_error)) {
                    die($obj->mensaje_error);
                } else {

                    foreach ($obj->comunidades as $key) {

                        echo "<div class='comunidades'>";
                        echo "<img src='../img/" . $key->icono . "'>";
                        echo "<button type='submit' name='btn_comunidad' value='" . $key->id_comunidad . "'>" . $key->nombre . "</button>";
                        echo "</div>";
                    }
                }

                echo "</article>";
                ?>

            </form>
        </div>
    </section>

<script>

$(document).ready(function(){

    $('header').css({
        "background":"none"
    });

    $('body').css({
        "background-image":"url('../img/fondo1.jpg')"
    });

    if (window.matchMedia('(min-width: 1129px)').matches) {
        $('body').css({
        "background-color":"#191919",
        "background-image":"none"
    });
      }
});

$(window).resize(function(){
    
    if (window.matchMedia('(min-width: 1129px)').matches) {
        $('body').css({
        "background-color":"#191919",
        "background-image":"none"
    });
      }

      
    if (window.matchMedia('(max-width: 1129px)').matches) {
        $('body').css({
        "background-image":"url('../img/fondo1.jpg')"
    });
      }
});

</script>


</body>

</html>