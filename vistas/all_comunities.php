<?php

require "../servicio_rest/funciones.php";
session_name("farzone");
session_start();

if (isset($_POST["crear_comunidad"])) {

    header('Location: add_comunidad.php');
    exit;
} else if (isset($_POST["btn_comunidad"])) {

    $_SESSION['id_comunidad'] = $_POST["btn_comunidad"];
    header('Location: comunidades.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las comunidades</title>


    <link rel="shortcut icon" href="../img/logo_cuadrado2.png">

    <link rel="stylesheet" href="../css/estilo_all_comunidades.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../tooltipster/dist/css/tooltipster.bundle.min.css" />
    <script type="text/javascript" src="../js/funciones.js"></script>

    <!--fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <form action="all_comunities.php" method="post">
            <p id="titulo"><a href="../index.php">Farzone</i></a></p>
            <button type='submit' name='crear_comunidad' id="guardar">Crear comunidad</button>
        </form>
    </header>

    <section>

        <video id="video" loop autoplay preload muted>
            <?php

            $num = rand(1, 3);

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

            <form action="all_comunities.php" method="post">

                <div class="filtro">

                    <label for="filtro_cat">Filtrar por categorias: </label>

                    <select name="filtro_cat" id="filtro_cat" onchange="this.form.submit()">

                        <option value="all" <?php if (isset($_POST["filtro_cat"]) && $_POST["filtro_cat"] == 'all') echo "selected" ?>>Todas</option>
                        <option value="diseño" <?php if (isset($_POST["filtro_cat"]) && $_POST["filtro_cat"] == 'diseño') echo "selected" ?>>Diseño</option>
                        <option value="ilustracion" <?php if (isset($_POST["filtro_cat"]) && $_POST["filtro_cat"] == 'ilustracion') echo "selected" ?>>Ilustración</option>
                        <option value="fotografia" <?php if (isset($_POST["filtro_cat"]) && $_POST["filtro_cat"] == 'fotografia') echo "selected" ?>>Fotografía</option>
                        <option value="musica" <?php if (isset($_POST["filtro_cat"]) && $_POST["filtro_cat"] == 'musica') echo "selected" ?>>Música</option>

                    </select>

                </div>

                <?php
                echo "<article id='user_block'>";
                echo "<button type='submit' name='crear_comunidad' id='btn_edit'>Crear una comunidad</button>";
                echo "</article>";

                echo "<article id='comunity_list'>";

                $categoria_comunidad = "";

                if (isset($_POST["filtro_cat"])) {

                    switch ($_POST["filtro_cat"]) {
                        case 'diseño':
                            $categoria_comunidad = 'diseño';
                            break;

                        case 'ilustracion':
                            $categoria_comunidad = 'ilustracion';
                            break;

                        case 'fotografia':
                            $categoria_comunidad = 'fotografia';
                            break;

                        case 'musica':
                            $categoria_comunidad = 'musica';
                            break;
                        default:
                            /**CATEGORIA TODOS*/
                            /*echo "<p class='comunidad_class'>Todas las comunidades</p>";*/

                            $obj = consumir_servicio_REST($url . 'comunidades', 'GET');
                            if (isset($obj->mensaje_error)) {
                                die($obj->mensaje_error);
                            } else {

                                foreach ($obj->comunidades as $key) {

                                    echo "<div class='comunidades'>";
                                    echo "<img src='../uploads/img_comunidades/" . $key->icono . "'>";
                                    echo "<button type='submit' name='btn_comunidad' value='" . $key->id_comunidad . "'>" . $key->nombre . "</button>";
                                    echo "</div>";
                                }
                            }
                            exit;
                            break;
                    }


                    $obj = consumir_servicio_REST($url . 'get_comunidad_by_cate/' .$categoria_comunidad, 'GET');
                    if (isset($obj->mensaje_error)) {
                        die($obj->mensaje_error);
                    } else {

                        foreach ($obj->comunidad as $key) {

                            echo "<div class='comunidades'>";
                            echo "<img src='../uploads/img_comunidades/" . $key->icono . "'>";
                            echo "<button type='submit' name='btn_comunidad' value='" . $key->id_comunidad . "'>" . $key->nombre . "</button>";
                            echo "</div>";
                        }
                    }
                } else {

                    /**CATEGORIA TODOS*/
                    /*echo "<p class='comunidad_class'>Todas las comunidades</p>";*/

                    $obj = consumir_servicio_REST($url . 'comunidades', 'GET');
                    if (isset($obj->mensaje_error)) {
                        die($obj->mensaje_error);
                    } else {

                        foreach ($obj->comunidades as $key) {

                            echo "<div class='comunidades'>";
                            echo "<img src='../uploads/img_comunidades/" . $key->icono . "'>";
                            echo "<button type='submit' name='btn_comunidad' value='" . $key->id_comunidad . "'>" . $key->nombre . "</button>";
                            echo "</div>";
                        }
                    }
                }

                echo "</article>";
                ?>

            </form>
        </div>
    </section>

    <script>
        $(document).ready(function() {

            $('header').css({
                "background": "none"
            });

            $('body').css({
                "background-image": "url('../img/fondo1.jpg')"
            });

            if (window.matchMedia('(min-width: 1129px)').matches) {
                $('body').css({
                    "background-color": "#191919",
                    "background-image": "none"
                });
            }
        });

        $(window).resize(function() {

            if (window.matchMedia('(min-width: 1129px)').matches) {
                $('body').css({
                    "background-color": "#191919",
                    "background-image": "none"
                });
            }


            if (window.matchMedia('(max-width: 1129px)').matches) {
                $('body').css({
                    "background-image": "url('../img/fondo1.jpg')"
                });
            }
        });
    </script>


</body>

</html>