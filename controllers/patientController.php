<?php
require_once("../models/patientModel.php");
require_once("../libs/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
	case "insert":
		$data = $request["data"];

		if (!Validation::validateArray($data)) return false;

		try {
			$pat = new patientModel();

			$pat->insertPerson($data);

         $pat->insertPatient($data);

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

		$pat = new patientModel();

		$pat->update($data);

		echo json_encode([
			"status" => true
		]);

		break;

	case "delete":
		$patientNumber = $request["data"]["id"];

		if (!Validation::validateArray($request["data"])) return false;

		$pat = new patientModel();

		$pat->delete($patientNumber);

		echo json_encode([
			"status" => true
		]);

		break;

	case "search":
		$patientNumber = $request["data"]["patientNumber"];

		if (!Validation::validateArray($request["data"])) return false;

		$pat = new patientModel();

      $pat->selectAll($patientNumber);

		echo json_encode([
			"status" => true,
			"data" => $content
		]);

		break;
	case "getAll":
		$pat = new patientModel();

		$rows = $pat->selectAll();

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

      case "getPatient":
         $pat = $request["data"]["patientNumber"];
   
         $pat = new patientModel();
   
         $data = $pat->selectAll($patientNumber);
   
            $data["grupoSanguineo"];
            $data["fechaGuardia"];

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
