<?php
require_once("../libs/database/database.php");

class patientModel
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

    public function insertPerson(array $data): void
    {
        $stmt = $this->db->prepare("INSERT INTO personas VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            'sissssissi',
            $data["DNI"],
            $data["DOCUMENT_NUM"],
            $data["NAME"],
            $data["LAST_NAME"],
            $data["ADDRESS"],
            $data["DATE_BIRTH"],
            $data["TELEPHONE"],
            $data["GENRES"],
            $data["EMAIL"],
            $data["TUITION"]
        );
        $stmt->execute();
    }

    public function insertPatient(array $data): void
    {
        $estado = 0;

        $stmt = $this->db->prepare("INSERT INTO pacientes VALUES (?, ?, ?)");
        $stmt->bind_param('isi', $data["TUITION"], $data["BLOOD"], $estado);
        $stmt->execute();
    }

    public function update($data): void
    {
        $stmt = $this->db->prepare("UPDATE personas SET tipoDocumento = ?, numeroDocumento = ?, nombre = ?, apellido =  ?, domicilio = ?, fechaNacimiento = ?, telefono = ?, genero = ?, correoElectronico = ?  WHERE idRol = ?");
        $stmt->bind_param('sissssissi', $data["DNI"], $data["DOCUMENT_NUM"], $data["NAME"], $data["LASTNAME"], $data["ADDRESS"], $data["DATE_BIRTH"], $data["TELEPHONE"], $data["GENRES"], $data["EMAIL"], $data["TUITION"]);
        $stmt->execute();
    }

    public function selectAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN pacientes 
                                                        ON personas.idRol = pacientes.historiaClinica");
        $stmt->execute();

        $result = $stmt->get_result();
        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function delete(int $historiaClinica): void
    {
        $stmt = $this->db->prepare("DELETE personas, pacientes
                                                        FROM personas
                                                        INNER JOIN pacientes 
                                                        ON personas.idRol = pacientes.historiaClinica
                                                        WHERE pacientes.historiaClinica = ?");
        $stmt->bind_param('i', $historiaClinica);
        $stmt->execute();
    }
}
