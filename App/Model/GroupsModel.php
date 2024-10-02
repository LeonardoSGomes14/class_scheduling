<?php
class GroupModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createGroup($teacher, $year_school) {
        $sql = "INSERT INTO groups (teacher, year_school) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$teacher, $year_school]);
        return $stmt->rowCount();
    }

    public function updateGroup($id_group, $teacher, $year_school) {
        $sql = "UPDATE groups SET teacher = ?, year_school = ? WHERE id_group = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$teacher, $year_school, $id_group]);
    }

    public function listGroups()
    {
        $sql = "SELECT * FROM groups";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectGroups($teacher) {
        $sql = "SELECT * FROM groups WHERE teacher = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$teacher]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteGroup($id_group) {
        $sql = "DELETE FROM groups WHERE id_group = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_group]);
    }
}
?>