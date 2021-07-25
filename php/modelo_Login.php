<?php

$direccion = "localhost";
$usuarioBD = "root";
$claveBD = "";
$bd = "parqueo";

if( isset($_POST['user']) && isset($_POST['pass']) ){
	//Conectarse
	$conexion = new mysqli($direccion,$usuarioBD, $claveBD,$bd);
	//Configurar Codificación de Datos
	$conexion->set_charset("utf-8");

	$userid = $_POST['user'];
	$pwUsuario = $_POST['pass'];

	//Verificar Login
	$consulta = "SELECT * FROM `usuario` where `userid` = '$userid' and `pwUsuario` = '$pwUsuario'";
	$conexion->query($consulta);
	$res = $conexion->query($consulta);

	if($res->num_rows == 0){
		echo json_encode(array("success" => 0));
	}else if($res->num_rows == 1){
		echo json_encode(array("success" => 1));
	}
}






?>
