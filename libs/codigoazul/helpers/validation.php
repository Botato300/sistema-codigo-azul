<?php
class Validation
{
	public static function validateLogin(string $username, string $password): bool
	{
		if (!self::validateUsername($username)) return false;
		if (!self::validatePassword($password)) return false;

		return true;
	}

	public static function validateUsername(string $username): bool
	{
		$username = trim($username);

		if (empty($username)) {
			echo json_encode([
				"status" => false,
				"details" => "No ingresaste ningún nombre de usuario."
			]);

			return false;
		}
		if (strlen($username) > 32) {
			echo json_encode([
				"status" => false,
				"details" => "Tu nombre de usuario supera la cantidad de caracteres permitidos. (32)"
			]);

			return false;
		}

		if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
			echo json_encode([
				"status" => false,
				"details" => "El nombre de usuario solo puede contener letras y números."
			]);

			return false;
		}

		return true;
	}

	public static function validatePassword(string $password): bool
	{
		$password = trim($password);

		if (empty($password)) {
			echo json_encode([
				"status" => false,
				"details" => "No ingresaste ninguna contraseña."
			]);

			return false;
		}

		if (strlen($password) > 16) {
			echo json_encode([
				"status" => false,
				"details" => "Tu contraseña supera la cantidad de caracteres permitidos. (16)"
			]);

			return false;
		}

		if (strlen($password) <= 6) {
			echo json_encode([
				"status" => false,
				"details" => "Tu contraseña debe tener al menos 6 caracteres."
			]);

			return false;
		}

		if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
			echo json_encode([
				"status" => false,
				"details" => "La contraseña solo puede contener letras y números."
			]);

			return false;
		}

		return true;
	}
}
