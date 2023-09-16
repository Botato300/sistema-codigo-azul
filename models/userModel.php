<?php
require_once("../libs/database/database.php");

class userModal
{
    private object $db;

    public function __construct()
    {
        $database = new DatabaseConnection();
        $this->db = $database->getDatabase();
    }

    public function login(string $email, string $password): bool
    {
        return true;
        // $stmt = $this->db->prepare("SELECT contrasenia FROM usuarios WHERE email = ?");
        // $stmt->bind_param("s", $email);
        // $stmt->execute();

        // $result = $stmt->get_result();
        // $row = $result->fetch_assoc();
        // $password_hash = $row["contrasenia"];

        // return password_verify($password, $password_hash);
    }

    public function register(string $email, string $password): bool
    {
        return true;

        // $token = bin2hex(random_bytes(16));
        // $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        // $sql = "INSERT INTO usuarios (correoElectronico, contrasenia, token) VALUES (?, ?, ?)";
        // $stmt = $this->db->prepare($sql);
        // $stmt->bind_param("ssss", $email, $passwordHashed, $token);
        // $stmt->execute();
    }
}
