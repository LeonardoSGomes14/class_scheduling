<?php
class SubjectModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createSubject($name)
    {
        $sql = "INSERT INTO subjects (name) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name]);
        return $stmt->rowCount();
    }

    public function listSubjects()
    {
        $sql = "SELECT * FROM subjects";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSubject($id_subject, $name)
    {
        $sql = "UPDATE subjects SET name = ? WHERE id_subject = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $id_subject]);
    }

    public function deleteSubject($id_subject)
    {
        $sql = "DELETE FROM subjects WHERE id_subject = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_subject]);
    }
}
