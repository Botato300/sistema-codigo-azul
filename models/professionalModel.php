<?php
require_once("../libs/database/database.php");

class professionalModel
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

    public function insertPerson(int $idPersona, string $tipoDocumento): void
    {
        $stmt = $this->db->prepare("INSERT INTO personas (idPersona, tipoDocumento) VALUES (?, ?)");
        $stmt->bind_param('is', $idPersona, $tipoDocumento);
        $stmt->execute();
    }

    public function insertMedic(int $idPersona, string $matricula): void
    {
        $stmt = $this->db->prepare("INSERT INTO medicos VALUES (?, ?)");
        $stmt->bind_param('is', $idPersona, $matricula);
        $stmt->execute();
    }

    public function insertNurse(int $idPersona, string $matricula): void
    {
        $stmt = $this->db->prepare("INSERT INTO enfermeros VALUES (?, ?)");
        $stmt->bind_param('is', $idPersona, $matricula);
        $stmt->execute();
    }

    public function updateMedic(int $idPersona, int $matricula): void
    {
        $stmt = $this->db->prepare("UPDATE personas
                                                        INNER JOIN medicos
                                                        ON personas.idRol = medicos.matricula
                                                        SET personas.idRol = ?
                                                        WHERE medicos.matricula = ?");
        $stmt->bind_param('ii', $idPersona, $matricula);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN medicos 
                                                        ON personas.idRol = medicos.matricula");
        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc())
            echo "IdPersona: " . $row['idPersona'] . " Matricula: " . $row['matricula'] . "<br>";
    }

    public function updateNurse(int $idPersona, int $matricula): void
    {
        $stmt = $this->db->prepare("UPDATE personas
                                                        INNER JOIN enfermeros
                                                        ON personas.idPersona = enfermeros.matricula
                                                        SET personas.idPersona = ?
                                                        WHERE enfermeros.matricula = ?");
        $stmt->bind_param('ii', $idPersona, $matricula);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN enfermeros 
                                                        ON personas.idPersona = enfermeros.matricula");
        $stmt->execute();

        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc())
            echo "IdPersona: " . $row['idPersona'] . " Matricula: " . $row['matricula'] . "<br>";
    }

    public function isMedic(int $idPersona): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM personas INNER JOIN medicos ON personas.idRol = medicos.matricula WHERE personas.idRol = ?");
        $stmt->bind_param('i', $idPersona);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }

    public function selectAllMedics(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN medicos
                                                        ON personas.idRol = medicos.matricula");
        $stmt->execute();

        $result = $stmt->get_result();
        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function selectAllNurses(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN enfermeros
                                                        ON personas.idRol = enfermeros.matricula");
        $stmt->execute();

        $result = $stmt->get_result();
        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function deleteMedic(int $matricula): void
    {
        $stmt = $this->db->prepare("DELETE personas, medicos
                                                        FROM personas
                                                        INNER JOIN medicos 
                                                        ON personas.idRol = medicos.matricula
                                                        WHERE medicos.matricula = ?");
        $stmt->bind_param('i', $matricula);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN medicos 
                                                        ON personas.idRol = medicos.matricula");
        $stmt->execute();
    }

    public function selectPerson(int $profNumber): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM personas WHERE idRol = ?");
        $stmt->bind_param('i', $profNumber);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }

    public function deleteNurse(int $matricula): void
    {
        $stmt = $this->db->prepare("DELETE personas, enfermeros
                                                        FROM personas
                                                        INNER JOIN enfermeros 
                                                        ON personas.idRol = enfermeros.matricula
                                                        WHERE enfermeros.matricula = ?");
        $stmt->bind_param('i', $matricula);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN enfermeros 
                                                        ON personas.idRol = enfermeros.matricula");
        $stmt->execute();
    }
}
