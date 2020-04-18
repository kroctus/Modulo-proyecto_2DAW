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
		$consulta="SELECT * from publicaciones";
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