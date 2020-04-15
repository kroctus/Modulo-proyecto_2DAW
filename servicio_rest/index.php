<?php
require "funciones.php";
require 'Slim/Slim.php';
// El framework Slim tiene definido un namespace llamado Slim
// Por eso aparece \Slim\ antes del nombre de la clase.
\Slim\Slim::registerAutoloader();
// Creamos la aplicaci�n
$app = new \Slim\Slim();
// Indicamos el tipo de contenido y condificaci�n que devolveremos desde el framework Slim
$app->contentType('application/json; charset=utf-8');

$app->get('/prueba',function(){
	echo json_encode(prueba(),JSON_FORCE_OBJECT);
});


$app->post('/usuario/registrar', function () {
	echo json_encode(insertar_usuario($_POST["usuario"],$_POST["password"],$_POST["nombre"],$_POST["apellido"],$_POST["sexo"],$_POST["fec_nac"]),JSON_FORCE_OBJECT);
});

$app->get('/get_usuario/:usuario', function($usuario){
	echo json_encode(get_usuario($usuario),JSON_FORCE_OBJECT);
});

$app->post('/login', function ()  {
	echo json_encode(login($_POST["usuario"],$_POST["password"]),JSON_FORCE_OBJECT);

});

$app->run();

?>
