<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reproductor</title>
    <script src="https://kit.fontawesome.com/68921df666.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/quienes.css">
    
  </head>
  <body>

    <header>
        <p><a href="../index.php"><i class="fas fa-chevron-left"></i></a></p>
        <p id="titulo">Farzone</p>
        <label for="menu_busqueda"></i></label>
    </header>
    
    <article>

        <h1>¿Qué es Farzone?</h1>

        <p>Es una pregunta que agradecemos que hagas, ¡Farzone es un espacio para que puedas explotar toda tu creativdad!</p>
        <p>No hay mejor forma de responder a esa pregunta que siendo creativos, y como sabemos que <span>*te da pereza leer*</span> te lo respondemos con 
        un vídeo </p>

    </article>


  <div id="contenedor">

            <video id="videoPlayer" width="500">
              <source src="../videos/farzone.webm" type="video/mp4">
              Tu navegador no soporta el vídeo de HTML5
            </video>

            <span id="linea"></span>

            <div id="botones">
                <button onclick="playPause()"><i class="fas fa-play"></i></button>
                <button onclick="parar()"><i class="fas fa-stop"></i></button>




                <button onclick="skipMinus(10)"><i class="fas fa-step-backward"></i></button>
                <button onclick="skip(10)"><i class="fas fa-step-forward"></i></i></button>

                <button onclick="low(10)"><i class="fas fa-backward"></i></button>
                <button onclick="fast(10)"><i class="fas fa-forward"></i></button>

                <button onclick="silenciar()" id="muted"><i class="fas fa-volume-mute"></i></button>

                  <span id="tiempo"></span>

                <input type="range" name="barra" value="" min="0" max="10" id="barra"/>

                <button onclick="makeLarge()" id="expand"><i class="fas fa-expand"></i></button>


            </div>
  </div>

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
            }

            function low(value){
              video.playbackRate -=value;
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
                return hora+":"+minuto+":"+segundo;
               }

          video.addEventListener("timeupdate",function(ev){
          document.getElementById("tiempo").innerHTML = hora(video.currentTime);
        },true);


        //volumen

        barra.addEventListener("change",function(ev){
          video.volume= ev.currentTarget.value;},true);



  </script>







  </body>
</html>
