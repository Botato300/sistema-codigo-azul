<?php
class Database
{
	private object $db;

	public function __construct()
	{
		$config = parse_ini_file("../../../config/config.ini", false, INI_SCANNER_TYPED);

		$this->db = new mysqli($config["host"], $config["username"], $config["password"], $config["dbname"]);
	}

	public function __destruct()
	{
		$this->db->close();
	}

	public function loginAccount($username, $password)
	{
		$stmt = $this->db->prepare("SELECT password FROM accounts WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$password_hash = $row["password"];

		return password_verify($password, $password_hash);
	}
}
