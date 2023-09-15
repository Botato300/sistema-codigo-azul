<?php
require_once("../models/userModel.php");

$response = file_get_contents("php://input");
$content = json_decode($response, true);

switch ($content["action"]) {
    case "login":
        $username = $content["data"]["username"];
        $password = $content["data"]["password"];

        $user = new userModal();

        $result = $user->login($username, $password);
        if ($result) {
            echo json_encode(["status" => true]);
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
            "details" => "La accion enviada es invalida."
        ]);
}
