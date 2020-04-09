<?php 
require_once "config.php";

function conectar()
{
	@$con=mysqli_connect(HOST_DB, USER_DB,PASS_DB,NAME_DB);
	return $con;
}

function conf_charset($conex,$char)
{
	mysqli_set_charset($conex, $char);
}
function cerrar_conexion($conex)
{
	mysqli_close($conex);
}

function hay_resultados($resul)
{
	return (mysqli_num_rows($resul)>=1);
}

function liberar_resultados($resul)
{
	mysqli_free_result($resul);
}

function ultimo_id($conex)
{
	return mysqli_insert_id($conex);
}

function realizar_consulta($conex,$consul)
{
	return mysqli_query($conex,$consul);
}
function obtener_tupla_assoc($resul)
{
	return mysqli_fetch_assoc($resul);
}

function obtener_total_reg($result)
{
	return mysqli_num_rows($result);
}
?>
