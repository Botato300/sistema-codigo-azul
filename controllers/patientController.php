<?php
require_once("../models/patientModel.php");
require_once("../libs/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
	case "insert":
		$data = $request["data"];

		if (!Validation::validateArray($data)) return false;

		$patient = new patientModel();

		$patient->insertPerson($data);
		$patient->insertPatient($data);

		echo json_encode([
			"status" => true
		]);

		break;

	case "update":
		$data = $request["data"];

		if (!Validation::validateArray($data)) return false;

		$patient = new patientModel();

		$patient->update($data);

		echo json_encode([
			"status" => true
		]);

		break;

	case "delete":
		$patientNumber = $request["data"]["id"];

		if (!Validation::validateArray($request["data"])) return false;

		$patient = new patientModel();

		$patient->delete($patientNumber);

		echo json_encode([
			"status" => true
		]);

		break;

	case "getAll":
		$patient = new patientModel();

		$rows = $patient->selectAll();

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
		$patientNumber = $request["data"]["patientNumber"];

		$patient = new patientModel();

		$data = $patient->selectAll($patientNumber);

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
