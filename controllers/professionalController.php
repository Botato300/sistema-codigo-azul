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

	case "update":
		$data = $request["data"];

		if (!Validation::validateArray($data)) return false;

		$prof = new professionalModel();

		// $prof->updatePerson();	<-- FALTA AGREGAR ESTE METODO

		// if ($prof->isMedic($data["profNumber"])) $prof->updateMedic($data["profNumber"]);
		// else $prof->updateNurse($data["profNumber"]);	<-- FALTA PROGRAMAR BIEN LOS METODOS ESTOS


		echo json_encode([
			"status" => true
		]);

		break;

	case "delete":
		$profNumber = $request["data"]["id"];

		if (!Validation::validateArray($request["data"])) return false;

		$prof = new professionalModel();
		if ($prof->isMedic($profNumber)) $prof->deleteMedic($profNumber);
		else $prof->deleteNurse($profNumber);

		echo json_encode([
			"status" => true
		]);

		break;

	case "search":
		$profNumber = $request["data"]["profNumber"];

		if (!Validation::validateArray($request["data"])) return false;

		$prof = new professionalModel();
		$content = $prof->selectPerson($profNumber);

		if (is_null($content)) {
			echo json_encode([
				"status" => false
			]);

			return false;
		}

		echo json_encode([
			"status" => true,
			"data" => $content
		]);

		break;
	case "getAll":
		$prof = new professionalModel();

		$rowsMedics = $prof->selectAllMedics();
		$rowsNurses = $prof->selectAllNurses();
		$rows = array_merge($rowsMedics, $rowsNurses);

		if (empty($rows)) {
			echo json_encode([
				"status" => false
			]);

			return false;
		}

		echo json_encode([
			"status" => true,
			"data" => $rows
		]);
		break;
	case "getProfessional":
		$profNumber = $request["data"]["profNumber"];

		$prof = new professionalModel();

		$data = $prof->selectPerson($profNumber);
		if ($prof->isMedic($profNumber)) $data["tipoCarrera"] = "medico";
		else $data["tipoCarrera"] = "enfermero";

		echo json_encode([
			"status" => true,
			"data" => $data
		]);
		break;
	default:
		echo json_encode([
			"status" => false,
			"details" => "La accion enviada es invalida."
		]);
}
