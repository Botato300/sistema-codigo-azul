<?php
class Validation
{
	public static function validateLogin(string $email, string $password): bool
	{
		if (!self::validateEmail($email)) return false;
		if (!self::validatePassword($password)) return false;

		return true;
	}

	public static function validateEmail(string $email): bool
	{
		$email = trim($email);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if (empty($email)) {
			echo json_encode([
				"status" => false,
				"details" => "No ingresaste ningún correo electrónico."
			]);

			return false;
		}
		if (strlen($email) > 64) {
			echo json_encode([
				"status" => false,
				"details" => "Tu correo electrónico supera la cantidad de caracteres permitidos. (64)"
			]);

			return false;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo json_encode([
				"status" => false,
				"details" => "El correo electrónico ingresado es inválido."
			]);

			return false;
		}

		list(, $domain) = explode('@', $email);
		if (!checkdnsrr($domain, 'MX')) {
			echo json_encode([
				"status" => false,
				"details" => "El correo electrónico ingresado no existe."
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

		if (strlen($password) < 6) {
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
