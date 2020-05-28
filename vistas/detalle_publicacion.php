<?php

session_name('farzone');
session_start();

require "../servicio_rest/funciones.php";


if(!isset($_SESSION["id_publicacion"])){
header("Location: ../index.php");
}

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
}elseif (isset($_POST["edit_pub"])) {
    $_SESSION["pub_a_edit"]=$_POST["edit_pub"];
    header("Location: ../vistas/edit_publicacion.php");
}elseif (isset($_POST["delete_pub"])) {

    echo "<form action='detalle_publicacion.php' method='post' class='bloqueo_not'>";

        echo "<p>¿Estas seguro de que deseas eliminar esta publicación?</p>";
        echo "<button type='submit' name='cont_delete' value='".$_POST["delete_pub"]."' >Si,eliminar</button>";
        echo "<button type='submit'>No</button>";

    echo "</form>";
}elseif (isset($_POST["cont_delete"])) {

    $_SESSION["its_delete"]="";
    
    $delete=consumir_servicio_REST($url.'borrar_comentarios/'.$_POST["cont_delete"],"DELETE");
    if(isset($delete->mensaje_error)){
        die($delete->mensaje_error);
    }else{
        $obj=consumir_servicio_REST($url.'borrar_publicacion/'.$_POST["cont_delete"],"DELETE");
        if(isset($delete->mensaje_error)){
            die($delete->mensaje_error);   
        }else{
            echo "<form action='detalle_publicacion.php' method='post' class='bloqueo_not'>";
                echo "<p>Se ha eliminado la publicación</p>";
                echo "<button type='submit' name='vale'>Vale</button>";
            echo "</form>";
        }
    }

}elseif (isset($_POST["vale"])) {
    unset($_SESSION["its_delete"]);
    unset($_SESSION["id_publicacion"]);
    header("Location: ../vistas_login/pagina_principal.php");
    exit;
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

        <?php
        
        if(isset($_SESSION["its_delete"])){
            echo "<p>Esta publicación no existe</p>";
            exit;
        }
        ?>

        <article id="noticia">
            <form action="detalle_publicacion.php" method="post">
                <?php
                $obj = consumir_servicio_REST($url . 'get_publicacion/' . urlencode($_SESSION["id_publicacion"]), 'GET');
                if (isset($obj->mensaje_error)) {
                    die($obj->mensaje_error);
                } else {

                    foreach ($obj->publicacion as $key) {

                        $obj3 = consumir_servicio_REST($url . 'get_usuario_by_id/' . urlencode($key->id_usuario), 'GET');
                        if (isset($obj3->mensaje_error)) {
                            die($obj3->mensaje_error);
                        }

                        foreach ($obj3->usuario as $kay) {
                            $usuario = $kay->usuario;
                        }
                
                        if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]==$usuario){
                            echo "<div class='contenedor_opc'>";
                            
                            echo "<button type='submit' name='edit_pub' id='btn_edit' value='".$key->id_publicacion."'><i class='far fa-edit fa-2x'></i></button>";
                            echo "<button type='submit' name='delete_pub' id='btn_delete' value='".$key->id_publicacion."'><i class='fas fa-trash-alt fa-2x'></i></button>";
                            
                            echo "</div>";
                        }

                        if ($key->categoria == 'musica') {

                            echo '<article class="contenido">';
                            echo '<p>' . $key->titulo . '</p>';

                            echo '<span id="linea"></span>';

                            echo '<audio id="audio" controls>';
                            echo '<source src="../uploads/audio/' . $key->archivo . '" />';
                            echo '</audio>';

                            echo '</article>';



                            echo "<p class='cont_btn_usu'>";
                            echo 'Publicado por: ';
                            echo "<button type='submit' name='pub_user' class='to_usuario_btn'  value='" . $usuario . "'>" . $usuario . "</button>";
                            echo "</p>";
                            echo "<p>" . $key->descripcion . "</p>";
                        } else {

                            $obj3 = consumir_servicio_REST($url . 'get_usuario_by_id/' . urlencode($key->id_usuario), 'GET');
                            if (isset($obj3->mensaje_error)) {
                                die($obj3->mensaje_error);
                            }

                            foreach ($obj3->usuario as $kay) {
                                $usuario = $kay->usuario;
                            }
                    
                            if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]==$usuario){
                                echo "<div class='contenedor_opc'>";
                                
                                echo "<button type='submit' name='edit_pub' id='btn_edit' value='".$key->id_publicacion."'><i class='far fa-edit fa-2x'></i></button>";
                                echo "<button type='submit' name='delete_pub' id='btn_delete' value='".$key->id_publicacion."'><i class='fas fa-trash-alt fa-2x'></i></button>";
                                
                                echo "</div>";
                            }

                            echo "<img src='../uploads/pictures/" . $key->archivo . "'>";
                            echo "<h1>" . $key->titulo;
                            echo "</h1>";

                         


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