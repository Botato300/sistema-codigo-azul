<?php
require_once("../models/userModel.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

$email = $request["data"]["email"];

$user = new userModal();
$password = $user->recoveryPassword($email);

$emailTo = $email;
$title	= "Recuperar contraseña";
$message	= "Tu contraseña es: $password";
$emailFrom = "From: support@codigoazul.com";

if (mail($emailTo, $title, $message, $emailFrom)) {
	header("Location: recoverSuccess.php");
} else {
	echo json_encode([
		"status" => false,
		"details" => "No se pudo enviarte el correo electrónico."
	]);
}
