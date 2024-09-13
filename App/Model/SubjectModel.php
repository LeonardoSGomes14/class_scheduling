<?php
class SubjectModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createSubject($name, $teacher)
    {
        $sql = "INSERT INTO subjects ($name, $teacher) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $teacher]);
        return $stmt->rowCount();
    }

    public function listSubjects()
    {
        $sql = "SELECT * FROM subjects";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSubject($id_subject, $name, $teacher)
    {
        $sql = "UPDATE subjects SET name = ?, teacher = ? WHERE id_subject = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $teacher, $id_subject]);
    }

    public function deleteSubject($id_subject)
    {
        $sql = "DELETE FROM subjects WHERE id_subject = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_subject]);
    }
}
