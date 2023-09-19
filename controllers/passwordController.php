<?php
require_once("../models/userModel.php");
require_once("../libs/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

$email = $request["data"]["email"];

if (!Validation::validateEmail($email)) return false;

$user = new userModel();
$password = $user->recoveryPassword($email);

$emailTo = $email;
$title	= "Recuperar contraseña";
$message	= "Tu contraseña es: $password";
$emailFrom = "From: support@codigoazul.com";

if (mail($emailTo, $title, $message, $emailFrom)) {
	echo json_encode([
		"status" => true
	]);
} else {
	echo json_encode([
		"status" => false,
		"details" => "No se pudo enviarte el correo electrónico."
	]);
}
