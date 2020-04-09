<?php
require "conexion.php";

function obtener_libros($ini = null, $reg = null, $bus = null)
{
	$con = conectar();
	if (!$con) {
		return array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');
		if (isset($bus))
			$where = "WHERE (cod LIKE '%" . $bus . "%' OR nombre_corto LIKE '%" . $bus . "%')";
		else
			$where = "";
		if (!isset($ini))
			$consulta = "SELECT * FROM libros " . $where;
		else
			$consulta = "SELECT * FROM libros " . $where . " LIMIT " . $ini . " , " . $reg;

		$resultado = realizar_consulta($con, $consulta);
		if (!$resultado) {
			return array("mensaje_error" => "Imposible realizar la consulta. Error n&uacute;mero " . mysqli_errno($con) . ": " . mysqli_error($con));
		}
		$productos = array();
		while ($fila = obtener_tupla_assoc($resultado)) {
			$productos[] = $fila;
		}
		liberar_resultados($resultado);
		cerrar_conexion($con);

		return array("libros" => $productos);
	}
}

function obtener_libro($columna, $valor)
{
	$con = conectar();
	if (!$con) {
		return array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');

		$consulta = "SELECT * FROM libros WHERE " . $columna . "='" . $valor . "'";
		$resultado = realizar_consulta($con, $consulta);
		if (!$resultado) {
			return array("mensaje_error" => "Imposible realizar la consulta. Error número " . mysqli_errno($con) . ": " . mysqli_error($con));
		}

		if ($fila = obtener_tupla_assoc($resultado)) {
			$respuesta = array("libro" => $fila);
			liberar_resultados($resultado);
			cerrar_conexion($con);
		} else
			$respuesta = array("mensaje" => "No existe el producto con el " . $columna . ":" . $valor);

		return $respuesta;
	}
}

function insertar_libro($titulo, $autor, $descripcion, $precio, $portada)
{
	$con = conectar();
	if (!$con) {
		return array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');

		$consulta = "INSERT INTO libros (titulo,autor,descripcion,precio,portada) VALUES ('$titulo', '$autor', '$descripcion','$precio','$portada')";
		$resultado = realizar_consulta($con, $consulta);
		if (!$resultado)
			$respuesta = array("mensaje_error" => "Imposible realizar la consulta. Error número " . mysqli_errno($con) . ": " . mysqli_error($con));
		else
			$respuesta = array("mensaje" => "Se ha insertado el libro con titulo: " . $titulo . " y la portada: " . $portada);

		cerrar_conexion($con);
		return $respuesta;
	}
}

function actualizar_libro($cod, $titulo, $autor, $descripcion, $precio)
{
	$con = conectar();
	if (!$con) {
		return array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');

		$consulta = "UPDATE libros  SET titulo='$titulo',autor='$autor',descripcion='$descripcion',precio='$precio'  WHERE referencia='$cod'";
		$resultado = realizar_consulta($con, $consulta);
		if (!$resultado)
			$respuesta = array("mensaje_error" => "Imposible realizar la consulta. Error número " . mysqli_errno($con) . ": " . mysqli_error($con));
		else
			$respuesta = array("mensaje" => "Se ha actualizado el libro con titulo : " . $titulo);

		cerrar_conexion($con);
		return $respuesta;
	}
}

function borrar_libro($cod)
{
	$con = conectar();
	if (!$con) {
		return array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');

		$consulta = "DELETE FROM libros WHERE referencia='$cod'";
		$resultado = realizar_consulta($con, $consulta);
		if (!$resultado)
			$respuesta = array("mensaje_error" => "Imposible realizar la consulta. Error número " . mysqli_errno($con) . ": " . mysqli_error($con));
		else
			$respuesta = array("mensaje" => "Se ha borrado el libro con código: " . $cod);

		cerrar_conexion($con);
		return $respuesta;
	}
}

function login($nombre, $clave)
{
	$con = conectar();
	if (!$con) {
		$devolver = array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');
		$consulta = "SELECT * FROM usuarios WHERE lector='" . $nombre . "' AND clave=md5('" . $clave . "')";
		$resultado = realizar_consulta($con, $consulta);
		if (!$resultado) {
			return array("mensaje_error" => "Imposible realizar la consulta:" . $consulta);
		}
		if (obtener_total_reg($resultado) <= 0)
			$user["no_user"] = $nombre;
		else {
			$user["exito"][] = obtener_tupla_assoc($resultado);
			@session_name("tienda");
			@session_start();
			$_SESSION['usuario'] = $nombre;
			$_SESSION['clave'] = md5($clave);
			$_SESSION['ultimo_acceso'] = time();
		}

		liberar_resultados($resultado);
		cerrar_conexion($con);
		return $user;
	}
}

function seguridad()
{
	@session_name("tienda");
	@session_start();

	$devolver = -2;
	if (isset($_SESSION["usuario"]) && isset($_SESSION["clave"])  && isset($_SESSION["ultimo_acceso"])) {
		if (time() - $_SESSION["ultimo_acceso"] > 60 * MINUTOS) {
			//session_destroy(); 
			$devolver = -1;
		} else {
			$con = conectar();
			if (!$con) {
				$devolver = "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error();
			} else {
				conf_charset($con, 'utf8');
				$consulta = "SELECT * FROM usuarios WHERE lector='" . $_SESSION["usuario"] . "' AND clave='" . $_SESSION["clave"] . "'";

				$resultado = realizar_consulta($con, $consulta);
				if (!$resultado) {
					$devolver = "Imposible realizar la consulta. Error n&uacute;mero " . mysqli_errno($con) . ": " . mysqli_error($con);
				} else {

					$_SESSION["ultimo_acceso"] = time();

					$devolver = obtener_tupla_assoc($resultado);
					liberar_resultados($resultado);
					cerrar_conexion($con);
				}
			}
		}
	}
	return $devolver;
}


function subir($file)
{
	if ($file["error"])
		$errorFoto = " * Error subiendo el archivo al servidor * ";
	elseif (!getimagesize($file["tmp_name"]))
		$errorFoto = " * No has seleccionado un archivo imagen * ";
	elseif ($file["size"] > 500000)
		$errorFoto = " * Has seleccionado un archivo imagen muy grande (max. 5KB) * ";


	if (!isset($errorFoto)) {
/*
		// $respuesta=obtener_ultimo_libro();// devuelve la foto y su extension
		//$arr=explode(".",$respuesta->mensaje->portada);// extraemos la extension
		$con = conectar();
		$ultimo = mysqli_insert_id($con);

		$arr = explode(".", $file['name']);
		$extension = end($arr);

		//$id=get_ultimo_registro();// delvuelve el id

		// este método obtiene el último libro insertado y con esto obtendriamos la referencia
		$aux = get_ultimo_registro();

		//tambien hemos intentado utilizar el metodo mysqli_insert_id pero no ha dado resultado , me devuelve on array con un objeto en vez de el numero convencional
		//Entonces hemos optado por subir la imagen con el nombre por defecto.
*/

		@$var = move_uploaded_file($file["tmp_name"], "../img/".$file["name"]);
		if ($var) {
			return array("mensaje" => "* La imagen se ha movido a la carpeta destino con éxito *");
		} else {
			return array("error_mov" => " * La imagen no se ha podido mover a la carpeta destino " . $file["name"] . "*");
			//$id=mysqli->insert_id;

		}
	} else
		return array("error" => $errorFoto);
}


function get_ultimo_registro()
{
	$con = conectar();
	if (!$con) {
		return array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');

		$consulta = "SELECT * FROM libros ORDER BY referencia DESC LIMIT 1";
		$resultado = realizar_consulta($con, $consulta);

		if (!$resultado)
			$respuesta = array("mensaje_error" => "Imposible realizar la consulta. Error número " . mysqli_errno($con) . ": " . mysqli_error($con));
		else

			$fila = mysqli_fetch_assoc($resultado);
		$fila2 = mysqli_insert_id($con);
		return array("mensaje" => $fila);
	}
}

function obtener_ultimo_libro()
{
	/**SELECT MAX(referencia) FROM libros; */
	$con = conectar();
	if (!$con) {
		return array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		conf_charset($con, 'utf8');

		$consulta = "SELECT MAX(referencia) FROM libros";
		$resultado = mysqli_query($con, $consulta);

		if (!$resultado)
			$respuesta = array("mensaje_error" => "Imposible realizar la consulta. Error número " . mysqli_errno($con) . ": " . mysqli_error($con));
		else

			$fila = mysqli_fetch_assoc($resultado);
		//$respuesta=array("mensaje"=>$fila);

		//cerrar_conexion($con);
		return $fila;
	}
}
