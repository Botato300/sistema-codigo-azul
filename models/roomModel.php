<?php
require_once("../libs/database/database.php");

class roomModel
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
    
    public function insert(int $numero, string $nombre): void
    {
        $stmt = $this->db->prepare("INSERT INTO quirofanos VALUES (?, ?)");
        $stmt->bind_param('is', $numero, $nombre);
        $stmt->execute();
    }    

    public function update(int $numero, string $nombre): void
    {
        $stmt = $this->db->prepare("UPDATE quirofanos SET nombre=? WHERE numero=?");
        $stmt->bind_param('si', $nombre, $numero);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM quirofanos");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "Numero: ".$row['numero']." Nombre: ".$row['nombre']."<br>";
    }    

    public function selectAll(): void
    {
        $stmt = $this->db->prepare("SELECT * FROM quirofanos");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "Numero: ".$row['numero']." Nombre: ".$row['nombre']."<br>";
    }

    public function delete(int $numero): void
    {
        $stmt = $this->db->prepare("DELETE FROM quirofanos WHERE numero=?");
        $stmt->bind_param('i', $numero);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM quirofanos");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "Numero: ".$row['numero']." Nombre: ".$row['nombre']."<br>";
    }    
}

?>