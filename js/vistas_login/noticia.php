<?php

session_name('farzone');
session_start();

require "../servicio_rest/funciones.php";

if(isset($_POST["enviar_comentario"])){

    /**insertar_comentario_noticia */

    $obj4=consumir_servicio_REST($url.'get_usuario/'.urlencode($_SESSION["usuario"]),'GET');
    if(isset($obj4->mensaje_error)){
      die($obj4->mensaje_error);
    }else{
  
      foreach ($obj4->usuario as $key2) {
        $id_usuario=$key2->id_usuario;
      }
    }

    $datos_comentario=array();

    $datos_comentario["id_usuario"]=$id_usuario;
    $datos_comentario["id_noticia"]=$_SESSION["id_noticia"];
    $datos_comentario["desc_comentario"]=$_POST["comentario"];
    $datos_comentario["fec_publicacion"]=date("Y-m-d");

    $obj5=consumir_servicio_REST($url.'insertar_comentario_noticia','POST',$datos_comentario);
    if(isset($obj5->mensaje_error)){
      die($obj5->mensaje_error);
    }

    


}if (isset($_POST['pub_user'])) {
    $_SESSION['usuario_a_buscar'] = $_POST['pub_user'];
    if ($_POST['pub_user'] == $_SESSION['usuario']) {
        header('Location: ../vistas_login/user_details.php');
        exit;
    }
    header('Location: ../vistas/check_user.php');
    exit;
}

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

    <form action='noticia.php' method='post'>

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
            <form action="noticia.php" method="post">

            <p id="indicacion">Escribe un comentario:</p>

            <textarea name="comentario" id="user_comentario" cols="40" rows="5" required></textarea>

            <button type='submit' name='enviar_comentario' value="<?php echo $_SESSION['usuario']?>" id="enviar_comentario"><i class="fas fa-share"></i></button>

            </form>

            <form action="noticia.php" method="post">
            <?php

            $obj2 = consumir_servicio_REST($url . 'comentarios_noticia/' . urlencode($_SESSION["id_noticia"]), 'GET');
            if (isset($obj2->mensaje_error)) {
                die($obj2->mensaje_error);
            } else {

                foreach ($obj2->comentarios as $key) {

                        echo "<div class='comentario'>";

                        /**INFO DEL USUARIO QUE SUBIO EL COMENT*/

                        $obj3=consumir_servicio_REST($url.'get_usuario_by_id/'.urlencode($key->id_usuario),'GET');
                        if(isset($obj3->mensaje_error)){
                          die($obj3->mensaje_error);
                        }else{
                      
                          foreach ($obj3->usuario as $key2) {
                            $usuario=$key2->usuario;
                          }
                        }

                        echo "<p class='label_user'><button type='submit' name='pub_user' value='".$usuario."'>" . $usuario . "</button></p>";

                        echo " <p class='desc_comen'>".$key->desc_comentario."</p>";

                        echo " <button type='submit' name='responder' value='".$key->id_noticia."' class='responder'>Responder</button>";

                        echo "<button type='submit' name='like' value='".$key->id_noticia."' class='like'><i class='fas fa-heart'></i></button>";

                        echo "</div>";
                   
                }
            }

            ?>

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


            </form>
        </article>

    </section>

</body>

</html>