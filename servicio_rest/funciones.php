<?php
require "conexion.php";

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

function insertar_usuario($usuario, $password, $nombre, $apellido, $sexo,$fec_nac)
{
	$con=conectar();
	if(!$con){
		return array("mensaje_error"=>"Error no se pudo conectar a la BD ERROR: ".mysqli_connect_errno());
	}else{
		
		mysqli_set_charset($con,'utf8');
		$consulta="INSERT into usuarios (usuario,password,nombre,apellido,sexo,fec_nacimiento) VALUES ('$usuario','$password','$nombre','$apellido','$sexo','$fec_nac')";
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
					$usuario=array();
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