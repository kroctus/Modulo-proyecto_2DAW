<?php

	require "config.php";
	function conectar(){

	@$conexion=mysqli_connect(SERVIDOR_BD,USUARIO_BD,CLAVE_BD,NOMBRE_BD);
	return $conexion;
}
	
?>
