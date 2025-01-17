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

$app->get('/get_usuario_by_id/:usuario', function($id){
	echo json_encode(get_usuario_by_id($id),JSON_FORCE_OBJECT);
});

$app->get('/noticias', function(){
	echo json_encode(get_noticias(),JSON_FORCE_OBJECT);
});

$app->get('/get_noticia/:id', function($id){
	echo json_encode(get_noticia($id),JSON_FORCE_OBJECT);
});

$app->get('/comentarios_noticia/:id', function($id){
	echo json_encode(get_coment_noticia($id),JSON_FORCE_OBJECT);
});

$app->post('/insertar_comentario_noticia', function () {
	echo json_encode(insertar_comentario_noticia($_POST["id_usuario"],$_POST["id_noticia"],$_POST["desc_comentario"],$_POST["fec_publicacion"]),JSON_FORCE_OBJECT);
});

$app->post('/insertar_publicacion', function () {
	echo json_encode(insertar_publicacion($_POST["titulo"],$_POST["descripcion"],$_POST["fec_publicacion"],$_POST["categoria"],$_POST["usuario"],$_POST["archivo"]),JSON_FORCE_OBJECT);
});


$app->post('/login', function ()  {
	echo json_encode(login($_POST["usuario"],$_POST["password"]),JSON_FORCE_OBJECT);

});

$app->put('/actualizar_usuario/:usuario', function ($usuario) use($app) {
	$datos_usuario=$app->request->put();
	echo json_encode(actualizar_usuario($usuario,$datos_usuario["nombre"],$datos_usuario["apellido"],$datos_usuario["contra"],$datos_usuario["sexo"],$datos_usuario["fec_nac"]),JSON_FORCE_OBJECT);
	/*echo json_encode(actualizar_tablero(2,3,9,"vacio","B2"),JSON_FORCE_OBJECT);*/
});

/**PUBLICACIONES */


$app->get('/publicaciones', function(){
	echo json_encode(get_publicaciones(),JSON_FORCE_OBJECT);
});

$app->get('/get_publicacion/:id',function($id){
	echo json_encode(get_publicacion($id),JSON_FORCE_OBJECT);
});

$app->get('/comentarios_publicacion/:id', function($id){
	echo json_encode(get_coment_publicacion($id),JSON_FORCE_OBJECT);
});

$app->get('/get_publicaciones_by_tipo/:tipo',function($tipo){
	echo json_encode(get_publicacion_by_tipo($tipo),JSON_FORCE_OBJECT);
});

$app->get('/get_publicaciones_by_tipo_limit/:tipo',function($tipo){
	echo json_encode(get_publicacion_by_tipo_limit($tipo),JSON_FORCE_OBJECT);
});

$app->get('/get_publicaciones_user/:id',function($id){
	echo json_encode(get_publicaciones_user($id),JSON_FORCE_OBJECT);
});

$app->post('/insertar_comentario_publicacion', function () {
	echo json_encode(insertar_comentario_publicacion($_POST["des_comentario"],$_POST["id_usuario"],$_POST["id_publicacion"]),JSON_FORCE_OBJECT);
});


$app->delete('/borrar_publicacion/:id',function($id){
	echo json_encode(borrar_publicacion($id),JSON_FORCE_OBJECT);
});




/**COMUNIDADES */


$app->get('/comunidades', function(){
	echo json_encode(get_comunidades(),JSON_FORCE_OBJECT);
});

$app->get('/comunidades_limit', function(){
	echo json_encode(get_comunidades_limit(),JSON_FORCE_OBJECT);
});

$app->get('/get_comunidad/:id',function($id){
	echo json_encode(get_comunidad($id),JSON_FORCE_OBJECT);
});

$app->get('/get_comunidad_by_cate/:categoria',function($categoria){
	echo json_encode(get_comunidad_by_tipo($categoria),JSON_FORCE_OBJECT);
});

$app->post('/crear_comunidad', function () {
	/*$creador, $nombre, $descripcion, $icono,$categoria */
	echo json_encode(insertar_comunidad($_POST["creador"],$_POST["nombre"],$_POST["descripcion"],$_POST["icono"],$_POST["categoria"],$_POST["fec_creacion"]),JSON_FORCE_OBJECT);
});



$app->run();

?>
