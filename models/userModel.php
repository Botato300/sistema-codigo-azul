<?php
require_once("../libs/codigoazul/database/database.php");

class userModal
{
    private object $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getDatabase();
    }

    public function login(string $username, string $password): bool
    {
        return true;
        // $stmt = $this->db->prepare("SELECT password FROM accounts WHERE username = ?");
        // $stmt->bind_param("s", $username);
        // $stmt->execute();

        // $result = $stmt->get_result();
        // $row = $result->fetch_assoc();
        // $password_hash = $row["password"];

        // return password_verify($password, $password_hash);
    }
}

new userModal();
