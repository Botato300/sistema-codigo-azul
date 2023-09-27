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

    public function insertPerson(array $data): void
    {
        $stmt = $this->db->prepare("INSERT INTO personas VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            'sissssissi',
            $data["DNI"],
            $data["DOCUMENT_NUM"],
            $data["NAME"],
            $data["LASTNAME"],
            $data["ADDRESS"],
            $data["DATE_BIRTH"],
            $data["TELEPHONE"],
            $data["GENRES"],
            $data["EMAIL"],
            $data["TUITION"]
        );
        $stmt->execute();
    }


    public function insertMedic(int $matricula, int $enServicio, string $horaInicioGuardia, string $horaFinalGuardia, string $fechaGuardia): void
    {
        $stmt = $this->db->prepare("INSERT INTO medicos VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('iisss', $matricula, $enServicio, $horaInicioGuardia, $horaFinalGuardia, $fechaGuardia);
        $stmt->execute();
    }

    public function insertNurse(int $matricula, int $enServicio, string $horaInicioGuardia, string $horaFinalGuardia, string $fechaGuardia): void
    {
        $stmt = $this->db->prepare("INSERT INTO enfermeros VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('iisss', $matricula, $enServicio, $horaInicioGuardia, $horaFinalGuardia, $fechaGuardia);
        $stmt->execute();
    }

    public function updatePerson($data): void
    {
        $stmt = $this->db->prepare("UPDATE personas SET tipoDocumento = ?, numeroDocumento = ?, nombre = ?, apellido =  ?, domicilio = ?, fechaNacimiento = ?, telefono = ?, genero = ?, correoElectronico = ?  WHERE idRol = ?");
        $stmt->bind_param('sissssissi', $data["DNI"], $data["DOCUMENT_NUM"], $data["NAME"], $data["LASTNAME"], $data["ADDRESS"], $data["DATE_BIRTH"], $data["TELEPHONE"], $data["GENRES"], $data["EMAIL"], $data["TUITION"]);
        $stmt->execute();
    }

    public function updateMedic(int $matricula, int $enServicio, string $horaInicioGuardia, string $horaFinalGuardia, string $fechaGuardia): void
    {
        $stmt = $this->db->prepare("UPDATE personas
                                    INNER JOIN medicos
                                    ON personas.idRol = medicos.matricula
                                    SET medicos.estaDeGuardia = ?,
                                        medicos.horaInicioGuardia = ?,
                                        medicos.horaFinalGuardia = ?,
                                        medicos.fechaGuardia = ?
                                    WHERE medicos.matricula = ?");

        $stmt->bind_param('isssi', $enServicio, $horaInicioGuardia, $horaFinalGuardia, $fechaGuardia, $matricula);
        $stmt->execute();
    }


    public function updateNurse(int $matricula, int $enServicio, string $horaInicioGuardia, string $horaFinalGuardia, string $fechaGuardia): void
    {
        $stmt = $this->db->prepare("UPDATE personas
                                    INNER JOIN enfermeros
                                    ON personas.idRol = enfermeros.matricula
                                    SET enfermeros.estaDeGuardia = ?,
                                        enfermeros.horaInicioGuardia = ?,
                                        enfermeros.horaFinalGuardia = ?,
                                        enfermeros.fechaGuardia = ?
                                    WHERE enfermeros.matricula = ?");

        $stmt->bind_param('isssi', $enServicio, $horaInicioGuardia, $horaFinalGuardia, $fechaGuardia, $matricula);
        $stmt->execute();
    }

    public function getAvailableNurses(): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM enfermeros WHERE estaDeGuardia = 1");
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }

    public function getAvailableMedics(): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM medicos WHERE estaDeGuardia = 1");
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }



    public function isMedic(int $idPersona): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM personas INNER JOIN medicos ON personas.idRol = medicos.matricula WHERE personas.idRol = ?");
        $stmt->bind_param('i', $idPersona);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows > 0;
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

    public function selectMedic(int $profNumber): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM medicos WHERE matricula = ?");
        $stmt->bind_param('i', $profNumber);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row;
    }

    public function selectNurse(int $profNumber): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM enfermeros WHERE matricula = ?");
        $stmt->bind_param('i', $profNumber);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row;
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
