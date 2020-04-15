var url = "http://localhost/Proyectos/PROYECTO/servicio_rest/";



function hacer_login() {



    var usu = document.getElementById("usuario").value;
    var pass = document.getElementById("clave").value;
    var parametros = { "usuario": usu, "clave": pass };

    $.post(url + "login", parametros, null, "json")
        .done(function (data) {


            if (data.no_user) {
                document.getElementById("usuario").value = data.no_user;
                $("#error_login").html("Usuario no registrado. Vuelva a intentarlo");
                document.getElementById("clave").value = "";
                document.getElementById("clave").focus();

            } else if (data.exito) {
                $("#error_login").html("");
                document.getElementById("clave").value = "";
                $('#divLogin').fadeOut();
                var saludo = "Bienvenido <strong>" + data.exito[0].lector + "</strong> - <a href='index.html' onclick='return salir_sesion();'>Salir</a>";
                idUsuario = data.exito[0].id_usuario;

                if (data.exito[0].tipo == "normal") {
                    $('#vista_normal').fadeIn();
                    $('#vista_admin').fadeOut();

                    $('#libros').fadeOut();
                    $('#libros_normal').fadeIn();
                    $('#saludo_normal').html(saludo);

                }
                else {
                    $('#saludo_admin').html(saludo);
                }


            } else {
                $("#error_login").html('Error: ' + data.mensaje_error);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });


    return false;

}

function registrarse(){

    console.log("-------------Registrarse--------");
    

    var usuario = $('#usuario').val();
    var contra = $('#contra').val();
    var nombre = $('#nombre').val();
    var apellido = $('#apellido').val();
    var sexo = $('input[name$="sexo"]:checked').val();
    var fec_nac = $('#fec_nac').val();

    console.log("Usuario: " + usuario);
    console.log("contra: " + contra);
    console.log("sexo: " + sexo);
    console.log("fec_nac: " + fec_nac);

    return;

    
    


    var parametros = { "usuario": usuario, "password": contra, "nombre": nombre, "apellido": apellido, "sexo": sexo, "fec_nacimiento": fec_nac /**foto*/ };

    $.post(url + 'usuario/registrar', parametros, null, "json")
        .done(function (data) {

            var mensaje;
            if (data.mensaje) {
                $("#formAgregar")[0].reset();
                mensaje = data.mensaje;
                //id=data.id;

            }
            else if (data.mensaje_error) {
                mensaje = data.mensaje_error;
            }
            else {
                saltar_a_inicio();
            }


           
            
            $("#mensaje").html(mensaje + '<form action="index.html" method="post"><button type="submit">vale</button></form>');
         


        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });
}

function registrarse2(){

    var url = "http://localhost/Proyectos/PROYECTO/servicio_rest/";

    console.log("-------------Registrarse--------");
    

    var usuario = $('#usuario2').val();
    var contra = $('#contra2').val();
    var nombre = $('#nombre2').val();
    var apellido = $('#apellido2').val();
    var sexo = $('input[name$="sexo2"]:checked').val();
    var fec_nac = $('#fec_nac2').val();

    console.log("Usuario: " + usuario);
    console.log("contra: " + contra);
    console.log("sexo: " + sexo);
    console.log("fec_nac: " + fec_nac);



    
    var parametros = { "usuario": usuario, "password": contra, "nombre": nombre, "apellido": apellido, "sexo": sexo, "fec_nac": fec_nac };


    

    $.post(url + 'usuario/registrar', parametros, null, "json")
        .done(function (data) {

            console.log("punto done");
            

            var mensaje;
            if (data.mensaje) {
                //$("#formAgregar")[0].reset();
                mensaje = data.mensaje;
                //id=data.id;

            }
            else if (data.mensaje_error) {
                mensaje = data.mensaje_error;
            }
            else {

                console.log(" -----slatar inicio-----");
               // saltar_a_inicio();
            }


           console.log("Messaje: " + mensaje);
           
            
            //$("#mensaje").html(mensaje + '<form action="index.html" method="post"><button type="submit">vale</button></form>');
         


        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });
}

