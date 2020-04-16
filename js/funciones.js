var url = "http://localhost/Proyectos/PROYECTO/servicio_rest/";
var id_usuario;

var cambio=0;


function hacer_login() {

    console.log("----HACER LOGIN----");
    

    var usu = document.getElementById("usuario2").value;
    var pass = document.getElementById("contra2").value;

    console.log("Usuario: " + usu);
    console.log("contra: " + pass);
    
    var parametros = { "usuario": usu, "password": pass };

    $.post(url + "login", parametros, null, "json")
        .done(function (data) {

            console.log("ME METO EN PUNTO DONE");
            


            if (data.no_user) {
                document.getElementById("usuario2").value = data.no_user;
                $("#error_login").html("Usuario no registrado. Vuelva a intentarlo");
                document.getElementById("contra2").value = "";
                document.getElementById("contra2").focus();

            } else if (data.exito) {
                document.getElementById("contra2").value = "";
                var saludo = "Bienvenido <strong>" + data.exito[0].usuario + "</strong> - <a href='index.html' onclick='return salir_sesion();'>Salir</a>";
                idUsuario = data.exito[0].id_usuario;

                cambio=1;
                console.log(saludo);  
                window.location.replace("../index.php");


            } else {
                console.log('Error: ' + data.mensaje_error);    
                //$("#error_login").html('Error: ' + data.mensaje_error);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });


    return false;

}

