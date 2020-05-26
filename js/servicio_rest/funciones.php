<?php
require "conexion.php";

$url = "http://localhost/Proyectos/PROYECTO/servicio_rest/";

function prueba(){
return array("hola"=>"hola");
}

function consumir_servicio_REST($url,$metodo,$datos=null)
{

        $llamada = curl_init();
        curl_setopt($llamada, CURLOPT_URL, $url);
        curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);
        if(isset($datos))
            curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));

        $response=curl_exec($llamada);
        curl_close($llamada);
        if(!$response)
            die("Error consumiendo el servicio Web: ".$url);

        return json_decode($response);
}

/**---Login---*/

function login($usuario, $contra)
{
	$con = conectar();
	if (!$con) {
		$devolver = array("mensaje_error" => "Imposible conectar. Error n&uacute;mero " . mysqli_connect_errno() . ": " . mysqli_connect_error());
	} else {
		mysqli_set_charset($con, 'utf8');
		$consulta = "SELECT * FROM usuarios WHERE usuario='" . $usuario . "' AND password=md5('" . $contra . "')";
		$resultado = mysqli_query($con, $consulta);
		if (!$resultado) {
			return array("mensaje_error" => "Imposible realizar la consulta:" . $consulta);
		}
		if (mysqli_num_rows($resultado) <= 0)
			$user["no_user"] = $usuario;
		else {
			$user["exito"][] = mysqli_fetch_assoc($resultado);
			@session_name("farzone");
			@session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['clave'] = md5($contra);
		}

		mysqli_free_result($resultado);
		mysqli_close($con);
		return $user;
	}
}

function insertar_usuario($usuario, $password, $nombre, $apellido, $sexo,$fec_nac)
{
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="INSERT into usuarios (usuario,password,nombre,apellido,sexo,fec_nacimiento,correo,ubicacion,imagen) VALUES ('$usuario','$password','$nombre','$apellido','$sexo','$fec_nac','nada','nada','no_imagen.png')";
		$resultado=mysqli_query($con,$consulta);

		if(!$resultado){
			
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje_error"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"El registro se ha completado exitosamente , bienvenido a nuestra familia");
		}
	}
}

function get_usuario($usuario){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from usuarios where usuario='".$usuario."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$usuario=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$usuario[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("usuario"=>$usuario);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function get_usuario_by_id($id){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from usuarios where id_usuario='".$id."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$usuario=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$usuario[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("usuario"=>$usuario);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function actualizar_usuario($usuario,$nombre,$apellido,$contra,$sexo,$fec_nac){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Imposible conectar. Error ".mysqli_connect_errno());
	}else{
		mysqli_set_charset($con, "utf8");
		$consulta="update usuarios set nombre='".$nombre."', password='".$contra."', apellido='".$apellido."', sexo='".$sexo."', fec_nacimiento='".$fec_nac."' where usuario='".$usuario."'";
		$resultado=mysqli_query($con, $consulta);
		if (!$resultado) {
			$mensaje="Imposible realizar la consulta. Error ".mysqli_errno($con);
			mysqli_close($con);
			return array("mensaje_error"=>$mensaje);
		}else{
			mysqli_close($con);
			return array("mensaje"=>"Se ha actualizado el usuario con nombre : ".$nombre);
		}
	}
}

function get_noticias(){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from noticias";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{


					$noticias=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$noticias[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("noticias"=>$noticias);

	}
}

}

function get_noticia($id){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from noticias where id_noticia='".$id."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$noticia=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$noticia[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("noticia"=>$noticia);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function get_coment_noticia($id){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from comentarios_noticias where id_noticia='".$id."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$comentarios=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$comentarios[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("comentarios"=>$comentarios);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function insertar_comentario_noticia($id_usuario, $id_noticia, $desc_comentario, $fec_publicacion)
{
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="INSERT into comentarios_noticias (id_usuario,id_noticia,desc_comentario,fec_publicacion) VALUES ('$id_usuario','$id_noticia','$desc_comentario','$fec_publicacion')";
		$resultado=mysqli_query($con,$consulta);

		if(!$resultado){
			
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje_error"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"se ha agregado el comentario exitosamente");
		}
	}
}

function insertar_publicacion($titulo, $descripcion, $fec_publicacion, $categoria,$id_usuario,$archivo)
{
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		$likes=0;
		mysqli_set_charset($con,'utf8');
		$consulta="INSERT into publicaciones (titulo,descripcion,fec_publicacion,categoria,id_usuario,num_likes,archivo) VALUES ('$titulo','$descripcion','$fec_publicacion','$categoria','$id_usuario','$likes','$archivo')";
		$resultado=mysqli_query($con,$consulta);

		if(!$resultado){
			
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje_error"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"se ha agregado el comentario exitosamente");
		}
	}
}

function get_publicaciones(){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from publicaciones ORDER BY id_publicacion DESC";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{


					$publicaciones=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$publicaciones[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("publicaciones"=>$publicaciones);

	}
}

}

function get_publicacion($id){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from publicaciones where id_publicacion='".$id."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$publicacion=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$publicacion[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("publicacion"=>$publicacion);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}


function get_publicacion_by_tipo($tipo){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from publicaciones where categoria='".$tipo."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$publicacion=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$publicacion[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("publicaciones"=>$publicacion);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function get_publicacion_by_tipo_limit($tipo){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from publicaciones where categoria='".$tipo."' ORDER BY id_publicacion DESC LIMIT 5";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$publicacion=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$publicacion[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("publicaciones"=>$publicacion);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function get_coment_publicacion($id){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from comentarios where id_publicacion='".$id."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$comentarios=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$comentarios[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("comentarios"=>$comentarios);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function get_publicaciones_user($id){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from publicaciones where id_usuario='".$id."' ORDER BY id_publicacion DESC";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$publicaciones=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$publicaciones[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("publicaciones"=>$publicaciones);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}

function insertar_comentario_publicacion($des_comentario,$id_usuario,$id_publicacion)
{
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="INSERT into comentarios (des_comentario,id_usuario,id_publicacion,num_likes) VALUES ('$des_comentario','$id_usuario','$id_publicacion',0)";
		$resultado=mysqli_query($con,$consulta);

		if(!$resultado){
			
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje_error"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"se ha agregado el comentario exitosamente");
		}
	}
}

/**COMUNIDADES */

function get_comunidades(){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from comunidades ORDER BY id_comunidad DESC";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{


					$comunidades=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$comunidades[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("comunidades"=>$comunidades);

	}
}

}

/**COMUNIDADES */

function get_comunidades_limit(){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from comunidades limit 5";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{


					$comunidades=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$comunidades[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("comunidades"=>$comunidades);

	}
}

}

function get_comunidad($id){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from comunidades where id_comunidad='".$id."'  ORDER BY id_comunidad DESC";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$publicacion=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$comunidad[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("comunidad"=>$comunidad);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}


function get_comunidad_by_tipo($categoria){
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="SELECT * from comunidades where categoria='".$categoria."'";
		$resultado=mysqli_query($con,$consulta);
		if(!$resultado){		
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{

				if(mysqli_num_rows($resultado)>0){
					$comunidad=Array();
					while($fila=mysqli_fetch_assoc($resultado)){
						$comunidad[]=$fila;
					}
		
					mysqli_free_result($resultado);
					mysqli_close($con);
					return array("comunidad"=>$comunidad);
				
				}else{
					return false;// no esta repetido
				}
	}
}

}
/**$_POST["creador"],$_POST["nombre"],$_POST["descripcion"],$_POST["icono"],$_POST["categoria"],$_POST["fec_creacion"] */
function insertar_comunidad($creador, $nombre, $descripcion, $icono,$categoria,$fec_creacion)
{
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		$likes=0;
		mysqli_set_charset($con,'utf8');
		$consulta="INSERT into comunidades (creador,nombre,descripcion,icono,categoria,fec_creacion) VALUES ('$creador','$nombre','$descripcion','$icono','$categoria','$fec_creacion')";
		$resultado=mysqli_query($con,$consulta);

		if(!$resultado){
			
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje_error"=>"Error no se ha realizado la consulta ERROR: ".mysqli_errno($con));
		}else{
			mysqli_free_result($resultado);
			mysqli_close($con);
			return array("mensaje"=>"se ha creado la comunidad exitosamente");
		}
	}
}