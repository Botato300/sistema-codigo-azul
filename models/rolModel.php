<?php
require_once("../libs/database/database.php");

class rolModel
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
    
    public function insert(int $id, string $tipo): void
    {
        $stmt = $this->db->prepare("INSERT INTO roles VALUES (?, ?)");
        $stmt->bind_param('is', $id, $tipo);
        $stmt->execute();
    }    

    public function update(int $id, string $tipo): void
    {
        $stmt = $this->db->prepare("UPDATE roles SET tipo=? WHERE id=?");
        $stmt->bind_param('si', $tipo, $id);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM roles");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "Id: ".$row['id']." Tipo: ".$row['tipo']."<br>";
    }    

    public function selectAll(): void
    {
        $stmt = $this->db->prepare("SELECT * FROM roles");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "Id: ".$row['id']." Tipo: ".$row['tipo']."<br>";
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM roles WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT * FROM roles");
        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc())
            echo "Id: ".$row['id']." Tipo: ".$row['tipo']."<br>";
    }    
}

?>