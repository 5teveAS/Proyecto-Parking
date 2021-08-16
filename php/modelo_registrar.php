<?php

$direccion = "localhost:3308";
$usuarioBD = "root";
$claveBD = "";
$bd = "parqueo";

if( isset($_POST['user']) && isset($_POST['pass']) ){

	$conexion = new mysqli($direccion,$usuarioBD, $claveBD,$bd);

	$conexion->set_charset("utf-8");

	$userid = $_POST['user'];
	$pwUsuario = $_POST['pass'];


	$insercion = "INSERT INTO usuario (userid, pwUsuario) VALUES ('$userid','$pwUsuario')";
	$conexion->query($insercion);
	$res = $conexion->query($insercion);

    echo "registrado";
}

?>
