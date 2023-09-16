<?php
require_once("../models/userModel.php");
require_once("../libs/codigoazul/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
    case "login":
        $email = $request["data"]["email"];
        $password = $request["data"]["password"];

        $isValidData = Validation::validateLogin($email, $password);
        if (!$isValidData) return false;

        $user = new userModal();
        $result = $user->login($email, $password);
        if ($result) {
            echo json_encode([
                "status" => true,
                "token" => "abc123"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "details" => "No se pudo iniciar sesion."
            ]);
        }
        break;
    default:
        echo json_encode([
            "status" => false,
            "details" => "La accion enviada es inválida."
        ]);
}
