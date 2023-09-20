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

    public function insertPerson(int $idPersona, string $tipoDocumento): void
    {
        $stmt = $this->db->prepare("INSERT INTO personas (idPersona, tipoDocumento) VALUES (?, ?)");
        $stmt->bind_param('is', $idPersona, $tipoDocumento);
        $stmt->execute();
    }    

    public function insertPatient(int $idPersona, string $historiaClinica): void
    {
        $stmt = $this->db->prepare("INSERT INTO pacientes VALUES (?, ?)");
        $stmt->bind_param('is', $idPersona, $historiaClinica);
        $stmt->execute();
    }    

    public function update(int $idPersona, int $historiaClinica): void
    {
        $stmt = $this->db->prepare("UPDATE personas
                                                        INNER JOIN pacientes
                                                        ON personas.idPersona = pacientes.historiaClinica
                                                        SET personas.idPersona = ?
                                                        WHERE pacientes.historiaClinica = ?");
        $stmt->bind_param('ii', $idPersona, $historiaClinica);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN pacientes 
                                                        ON personas.idPersona = pacientes.historiaClinica");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "IdPersona: ".$row['idPersona']." Historia Clinica: ".$row['historiaClinica']."<br>";
    }    

    public function selectAll(): void
    {
        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN pacientes 
                                                        ON personas.idPersona = pacientes.historiaClinica");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "Idpersona: ".$row['idPersona']."<br>";
            echo "historiaClinica: ".$row['historiaClinica']."<br>";
            echo "nombre: ".$row['nombre']."<br>";
            echo "apellido: ".$row['apellido']."<br>";
            echo "telefono: ".$row['telefono']."<br>";
    }

    public function delete(int $historiaClinica): void
    {
        $stmt = $this->db->prepare("DELETE personas, pacientes
                                                        FROM personas
                                                        INNER JOIN pacientes 
                                                        ON personas.idPersona = pacientes.historiaClinica
                                                        WHERE pacientes.historiaClinica = ?");
        $stmt->bind_param('i', $historiaClinica);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM personas 
                                                        INNER JOIN pacientes 
                                                        ON personas.idPersona = pacientes.historiaClinica");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
        {
            echo "Idpersona: ".$row['idPersona']."<br>";
            echo "historiaClinica: ".$row['historiaClinica']."<br>";
            echo "nombre: ".$row['nombre']."<br>";
            echo "apellido: ".$row['apellido']."<br>";
            echo "telefono: ".$row['telefono']."<br>";    
        }
}    
}

?>