<?php
include('conexion.php');

$correo = $_POST['txtcorreo'];

$queryusuario 	= mysqli_query($conn, "SELECT * FROM usuarios WHERE correoElectronico = '$correo'");
$nr = mysqli_num_rows($queryusuario);

if ($nr == 1) {
	$mostrar	= mysqli_fetch_array($queryusuario);
	$enviarpass = $mostrar['contrasenia'];

	$paracorreo = $correo;
	$titulo	= "Recuperar contraseña";
	$mensaje	= $enviarpass;
	$correoPropio = "From: iandargenio@gmail.com";

	if (mail($paracorreo, $titulo, $mensaje, $correoPropio)) {
		header("Location: 'recoverSuccess.php'");
	} else {
		echo "<script> alert('Error');window.location= 'index.php' </script>";
	}
} else {
	echo "<script> alert('Este correo no existe');window.location= 'index.php' </script>";
}
