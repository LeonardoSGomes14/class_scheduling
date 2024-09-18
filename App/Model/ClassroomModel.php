<?php
class ClassroomModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createClassroom($identification, $conditionstatus, $equipaments, $description)
    {
        $sql = "INSERT INTO classrooms (identification, conditionstatus, equipaments, description) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$identification, $conditionstatus, $equipaments, $description]);
        return $stmt->rowCount();
    }

    public function listClassrooms()
    {
        $sql = "SELECT * FROM classrooms";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listClassroomsByID($id_class) {
        $sql = "SELECT * FROM classrooms WHERE id_class = :id_class";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_class', $id_class, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateClassroom($id_class, $identification, $conditionstatus, $equipaments, $description)
    {
        $sql = "UPDATE classrooms SET identification = ?, conditionstatus = ?, equipaments = ?, description = ? WHERE id_class = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$identification, $conditionstatus, $equipaments, $description, $id_class]);
    }

    public function deleteClassroom($id_class)
    {
        $sql = "DELETE FROM classrooms WHERE id_class = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_class]);
    }
}
