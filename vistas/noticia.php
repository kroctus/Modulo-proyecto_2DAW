<?php

session_name('farzone');
session_start();

require "../servicio_rest/funciones.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farzone-Noticia</title>
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
        <p id="titulo">Farzone news <i class="far fa-newspaper"></i></p>
        <label for="menu_busqueda"></i></label>
    </header>


    <section>

        <span class="linea"></span>

        <article id="noticia">

            <?php

            $obj = consumir_servicio_REST($url . 'get_noticia/' . urlencode($_SESSION["id_noticia"]), 'GET');
            if (isset($obj->mensaje_error)) {
                die($obj->mensaje_error);
            } else {

                foreach ($obj->noticia as $key) {

                    echo "<img src='../img/" . $key->imagen . "'>";
                    echo "<h1>" . $key->titulo . "</h1>";
                    echo "<h3>" . $key->copete . "</h3>";
                    echo "<p>" . $key->descripcion . "</p>";
                }
            }

            ?>



        </article>

        <article id="comentarios">

            <h1>Comentarios</h1>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>

            <div class="comentario">

                <p class="label_user"><span class="user">Camila28</span></p>

                <p class="desc_comen">Gabriel es el amor de mi vida, mi osito, me casaré con él</p>

                <button type="submit" name="responder" class="responder">Responder</button>
                <button type="submit" name="like" class="like"><i class="fas fa-heart"></i></button>

            </div>



        </article>

    </section>

</body>

</html>