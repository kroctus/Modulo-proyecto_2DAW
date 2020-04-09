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

// Definimos las respuesta de la ruta base con un tipo de consulta GET
$app->get('/libros', function ()  {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode(obtener_libros(),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});

$app->get('/ultimo_registro', function ()  {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode(get_ultimo_registro(),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});

$app->get('/libros2', function ()  {
		echo json_encode(obtener_libros(),JSON_FORCE_OBJECT);
});

$app->get('/productos/:ini/:reg', function ($ini,$reg)  {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode(obtener_productos($ini,$reg),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});

$app->get('/productos/:bus', function ($bus)  {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode(obtener_productos(null,null,$bus),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);

});

$app->get('/productos/:ini/:reg/:bus', function ($ini,$reg,$bus)  {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode(obtener_productos($ini,$reg,$bus),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});


$app->get('/libro/:campo/:valor', function ($campo,$valor) {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode(obtener_libro($campo,$valor),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});

$app->post('/libro/insertar', function () {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode(insertar_libro($_POST["titulo"],$_POST["autor"],$_POST["descripcion"],$_POST["precio"],$_POST["portada"]),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});

$app->put('/libro/actualizar/:cod', function ($cod) use($app) {
	$seguridad=seguridad();
	if(is_array($seguridad))
	{
		$datos=$app->request->put();
		echo json_encode(actualizar_libro($cod,$datos["titulo"],$datos["autor"],$datos["descripcion"],$datos["precio"]),JSON_FORCE_OBJECT);
	}
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});

$app->delete('/libro/borrar/:cod', function ($cod)  {
	$seguridad=seguridad();
	if(is_array($seguridad)&& isset($seguridad["id_usuario"]))
		echo json_encode(borrar_libro($cod),JSON_FORCE_OBJECT);
	else
		echo json_encode(array("html_code"=>""),JSON_FORCE_OBJECT);
});


$app->post('/login', function ()  {

	echo json_encode(login($_POST["usuario"],$_POST["clave"]),JSON_FORCE_OBJECT);

	
});

$app->get('/logueado', function ()  {
	$seguridad=seguridad();
	if(is_array($seguridad))
		echo json_encode($seguridad,JSON_FORCE_OBJECT);
	else
	{
		if($seguridad<-1)
			$devolver= array("no_login"=>"No has hecho login");
		else
			$devolver= array("time"=>"Su tiempo de sesión ha expirado");
		
		echo json_encode($devolver,JSON_FORCE_OBJECT);
	}
});	

$app->get('/salir', function () {

	//echo json_encode(obtener_chats(),JSON_FORCE_OBJECT);
	session_name("tienda");
	session_start();
	session_destroy();
	echo json_encode(array("nada"=>"nada"),JSON_FORCE_OBJECT);

});

$app->post('/subirImagen', function ()  {
	
	if(!isset($_FILES["image"]))
	{
		echo json_encode(array("mensaje_error"=>"No has seleccionado una imagen"),JSON_FORCE_OBJECT);
	}else
	{

		echo json_encode(subir($_FILES["image"]),JSON_FORCE_OBJECT);
	}

	
});


$app->get('/get_ultimo_libro',function(){
	echo json_encode(obtener_ultimo_libro(),JSON_FORCE_OBJECT);
});


$app->run();

?>
