<?php

session_name('farzone');
session_start();

require "../servicio_rest/funciones.php";


if (isset($_SESSION['publicacion_a_buscar'])) {
    $_SESSION["id_publicacion"] = $_SESSION['publicacion_a_buscar'];
    unset($_SESSION['publicacion_a_buscar']);
}

if (isset($_POST['pub_user'])) {
    $_SESSION['usuario_a_buscar'] = $_POST['pub_user'];
    if ($_POST['pub_user'] == $_SESSION['usuario']) {
        header('Location: ../vistas_login/user_details.php');
        exit;
    }
    header('Location: ../vistas/check_user.php');
    exit;
} else if (isset($_POST["enviar_comentario"])) {



    /**insertar_comentario_noticia */

    $obj4 = consumir_servicio_REST($url . 'get_usuario/' . urlencode($_SESSION["usuario"]), 'GET');
    if (isset($obj4->mensaje_error)) {
        die($obj4->mensaje_error);
    } else {

        foreach ($obj4->usuario as $key2) {
            $id_usuario = $key2->id_usuario;
        }
    }

    $datos_comentario = array();

    $datos_comentario["des_comentario"] = $_POST["comentario"];
    $datos_comentario["id_usuario"] = $id_usuario;
    $datos_comentario["id_publicacion"] = $_SESSION["id_publicacion"];

    $obj5 = consumir_servicio_REST($url . 'insertar_comentario_publicacion', 'POST', $datos_comentario);
    if (isset($obj5->mensaje_error)) {
        echo "ERRROR";
        die($obj5->mensaje_error);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farzone-Publicación</title>
    <link rel="stylesheet" href="../css/estilos_noticia.css">

    <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/logo_cuadrado2.png">



    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script type="text/javascript" src="../js/funciones.js"></script>

    <!--fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>

<body>


    <header>
        <p><a href="../index.php"><i class="fas fa-chevron-left"></i></a></p>
        <p id="titulo">Farzone magazine<i class="fas fa-pager"></i></i></p>
        <label for="menu_busqueda"></i></label>
    </header>


    <section>

        <span class="linea"></span>

        <article id="noticia">
            <form action="detalle_publicacion.php" method="post">
                <?php
                $obj = consumir_servicio_REST($url . 'get_publicacion/' . urlencode($_SESSION["id_publicacion"]), 'GET');
                if (isset($obj->mensaje_error)) {
                    die($obj->mensaje_error);
                } else {

                    foreach ($obj->publicacion as $key) {

                        if ($key->categoria == 'musica') {

                            echo '<article class="contenido">';
                            echo '<p>' . $key->titulo . '</p>';

                            echo '<span id="linea"></span>';


                            echo '<audio id="audio" controls>';
                            echo '<source src="../uploads/audio/' . $key->archivo . '" />';
                            echo '</audio>';

                            echo '</article>';


                            $obj3 = consumir_servicio_REST($url . 'get_usuario_by_id/' . urlencode($key->id_usuario), 'GET');
                            if (isset($obj3->mensaje_error)) {
                                die($obj3->mensaje_error);
                            }

                            foreach ($obj3->usuario as $kay) {
                                $usuario = $kay->usuario;
                            }

                            echo "<p class='cont_btn_usu'>";
                            echo 'Publicado por: ';
                            echo "<button type='submit' name='pub_user' class='to_usuario_btn'  value='" . $usuario . "'>" . $usuario . "</button>";
                            echo "</p>";
                            echo "<p>" . $key->descripcion . "</p>";
                        } else {

                            echo "<img src='../uploads/pictures/" . $key->archivo . "'>";
                            echo "<h1>" . $key->titulo . "</h1>";

                            $obj3 = consumir_servicio_REST($url . 'get_usuario_by_id/' . urlencode($key->id_usuario), 'GET');
                            if (isset($obj3->mensaje_error)) {
                                die($obj3->mensaje_error);
                            }

                            foreach ($obj3->usuario as $kay) {
                                $usuario = $kay->usuario;
                            }


                            echo "<p class='cont_btn_usu'>";
                            echo 'Publicado por: ';
                            echo "<button type='submit' name='pub_user' class='to_usuario_btn'  value='" . $usuario . "'>" . $usuario . "</button>";
                            echo "</p>";

                            echo "<p>" . $key->descripcion . "</p>";
                        }
                    }
                }

                ?>

            </form>

        </article>

        <article id="comentarios">
            <form action="detalle_publicacion.php" method="post">

                <?php

                echo "<h1>Comentarios</h1>";
                if (isset($_SESSION['usuario'])) {

                    echo '<p id="indicacion">Escribe un comentario:</p>';

                    echo '<textarea name="comentario" id="user_comentario" cols="40" rows="5" required></textarea>';

                    echo '<button type="submit" name="enviar_comentario" value="' . $_SESSION['usuario'] . '" id="enviar_comentario"><i class="fas fa-share"></i></button>';
                }

                ?>
            </form>

            <form action="detalle_publicacion.php" method="post">
                <?php

                $obj2 = consumir_servicio_REST($url . 'comentarios_publicacion/' . urlencode($_SESSION["id_publicacion"]), 'GET');
                if (isset($obj2->mensaje_error)) {
                    die($obj2->mensaje_error);
                } else {

                    if ($obj2 == false) {
                        echo "<h1 class='no_comen'>No hay Comentarios</h1>";
                        return;
                    }

                    echo "<h1 class='no_comen'>Comentarios</h1>";

                    foreach ($obj2->comentarios as $key) {

                        echo "<div class='comentario'>";

                        /**INFO DEL USUARIO QUE SUBIO EL COMENT*/

                        $obj3 = consumir_servicio_REST($url . 'get_usuario_by_id/' . urlencode($key->id_usuario), 'GET');
                        if (isset($obj3->mensaje_error)) {
                            die($obj3->mensaje_error);
                        } else {

                            foreach ($obj3->usuario as $key2) {
                                $usuario = $key2->usuario;
                            }
                        }

                        echo "<p class='label_user'><button type='submit' name='pub_user' value='" . $key2->usuario . "'>" . $key2->usuario . "</button></p>";

                        echo " <p class='desc_comen'>" . $key->des_comentario . "</p>";

                        echo " <button type='submit' name='responder' value='" . $key->id_publicacion . "' class='responder'>Responder</button>";

                        echo "<button type='submit' name='like' value='" . $key->id_publicacion . "' class='like'><i class='fas fa-heart'></i></button>";

                        echo "</div>";
                    }
                }

                ?>

                

            </form>
        </article>

    </section>


</body>

<script>
    /*MUSIC SCRIPT*/
    var video = document.getElementById("audio");

    function play() {

        if (video.paused)
            video.play();
        else
            video.pause();
    }

    function reload() {
        video.load();
    }

    function parar() {
        video.pause();
        video.currentTime = 0;
    }

    function reiniciar() {
        video.pause();
        video.currentTime = 0;
        video.play();
    }

    function silenciar() {
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

    function desmutear() {
        video.muted = false;
    }

    function fast(value) {
        video.playbackRate += value;
        video.play();
    }

    function low(value) {
        video.playbackRate -= value;
        video.play();
    }

    function skip(value) {
        video.currentTime += value;
    }

    function skipMinus(value) {
        video.currentTime -= value;
    }




    function hora(segundos) {
        var d = new Date(segundos * 1000);
        // Ajuste de las 23 horas
        var hora = (d.getHours() == 0) ? 23 : d.getHours() - 1;
        var hora = (hora < 9) ? "0" + hora : hora;
        var minuto = (d.getMinutes() < 9) ? "0" + d.getMinutes() : d.getMinutes();
        var segundo = (d.getSeconds() < 9) ? "0" + d.getSeconds() : d.getSeconds();
        return minuto + ":" + segundo;
    }

    video.addEventListener("timeupdate", function(ev) {
        document.getElementById("tiempo").innerHTML = hora(video.currentTime);
    }, true);


    //volumen

    barra.addEventListener("change", function(ev) {
        video.volume = ev.currentTarget.value;
    }, true);
</script>


</html>