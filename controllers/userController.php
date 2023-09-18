<?php
require_once("../models/userModel.php");
require_once("../libs/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
    case "login":
        $email = $request["data"]["email"];
        $password = $request["data"]["password"];

        $isValidData = Validation::validateLogin($email, $password);
        if (!$isValidData) return false;

        $user = new userModel();
        $result = $user->login($email, $password);
        if ($result) {
            echo json_encode([
                "status" => true,
                "userType" => $user->getUserType($email),
                "token" => $user->getToken()
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "details" => "El correo electrónico o contraseña son incorrectos."
            ]);
        }
        break;
    default:
        echo json_encode([
            "status" => false,
            "details" => "La accion enviada es inválida."
        ]);
}
