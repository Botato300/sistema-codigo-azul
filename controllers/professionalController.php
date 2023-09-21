<?php
require_once("../models/professionalModel.php");
require_once("../libs/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
	case "insert":
		$data = $request["data"];

		if (!Validation::validateArray($data)) return false;

		try {
			$prof = new professionalModel();
			//falta poner bien este
			// $prof->insertPerson();

			if ($data["CARREER_TYPE"] == "medico") {
				//falta poner bien el 2do argumento
				$prof->insertMedic($data["TUITION"], 1);
			} else {
				//falta poner bien el 2do argumento
				$prof->insertNurse($data["TUITION"], 1);
			}
		} catch (Exception) {
			echo json_encode([
				"status" => false
			]);
			return false;
		}

		echo json_encode([
			"status" => true
		]);

		break;

		// case "update":
		//     $zoneName = $request["data"]["name"];
		//     $zoneNumber = $request["data"]["number"];

		//     if (!Validation::validateArray($request["data"])) return false;

		//     $area = new professionalModel();
		//     $area->update($zoneNumber, $zoneName);

		//     echo json_encode([
		//         "status" => true
		//     ]);

		//     break;

		// case "delete":
		//     $zoneNumber = $request["data"]["number"];

		//     if (!Validation::validateArray($request["data"])) return false;

		//     $area = new areaModel();
		//     $area->delete($zoneNumber);

		//     echo json_encode([
		//         "status" => true
		//     ]);

		//     break;

		// case "search":
		//     $zoneNumber = $request["data"]["zoneNumber"];

		//     if (!Validation::validateArray($request["data"])) return false;

		//     $area = new professionalModel();
		//     $content = $area->select($zoneNumber);

		//     if (is_null($content)) {
		//         echo json_encode([
		//             "status" => false
		//         ]);

		//         return false;
		//     }

		//     echo json_encode([
		//         "status" => true,
		//         "data" => $content
		//     ]);

		//     break;
	case "getAll":
		$area = new professionalModel();

		$rowsMedics = $area->selectAllMedics();
		$rowsNurses = $area->selectAllNurses();
		$rows = array_merge($rowsMedics, $rowsNurses);

		echo json_encode([
			"status" => true,
			"data" => $rows
		]);
		break;
	default:
		echo json_encode([
			"status" => false,
			"details" => "La accion enviada es invalida."
		]);
}
