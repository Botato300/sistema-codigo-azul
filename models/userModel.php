<?php
require_once("../libs/database/database.php");

class userModel
{
    private object $db;

    public function __construct()
    {
        $database = new DatabaseConnection();
        $this->db = $database->getDatabase();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function login(string $email, string $password): bool
    {
        $stmt = $this->db->prepare("SELECT contrasenia FROM usuarios WHERE correoElectronico = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (is_null($row)) return false;

        $password_hash = $row["contrasenia"];

        return password_verify($password, $password_hash);

        return $password === $row["contrasenia"];
    }

    public function createUser(string $email, string $accountType, string $password): void
    {
        $token = bin2hex(random_bytes(16));
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (tipo, correoElectronico, contrasenia, token) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $accountType, $email, $passwordHashed, $token);
        $stmt->execute();
    }

    public function recoveryPassword($email): string
    {
        $stmt = $this->db->prepare("SELECT contrasenia FROM usuarios WHERE correoElectronico = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row["contrasenia"];
    }

    public function getUserType($email): string
    {
        $stmt = $this->db->prepare("SELECT tipo FROM usuarios WHERE correoElectronico = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row["tipo"];
    }

    public function getToken(string $email): string
    {
        $stmt = $this->db->prepare("SELECT token FROM usuarios WHERE correoElectronico = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row["token"];
    }

    public function isValidToken(string $token): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row ? true : false;
    }
}
