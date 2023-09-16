<?php
class DatabaseConnection
{
	private object $db;

	public function __construct()
	{
		$config = parse_ini_file(__DIR__ . "/../../../config/config.ini", false, INI_SCANNER_TYPED);

		$this->db = new mysqli($config["host"], $config["username"], $config["password"], $config["dbname"]);
	}

	public function __destruct()
	{
		$this->db->close();
	}

	public function getDatabase(): object
	{
		return $this->db;
	}
}
