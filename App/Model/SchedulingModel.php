<?php
class SchedulingModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createScheduling($scheduling_time, $end_time)
    {
        $id_teacher = $_SESSION['userID'];
        $teacher_name = $_SESSION['userName'];
        $sql = "INSERT INTO scheduling (id_teacher, teacher_name, scheduling_time, end_time) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_teacher, $teacher_name, $scheduling_time, $end_time]);
        return $stmt->rowCount();
    }

    public function listSchedulings()
    {
        $sql = "SELECT * FROM scheduling";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteSchedulings($id_scheduling)
    {
        $sql = "DELETE FROM scheduling WHERE id_scheduling = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_scheduling]);
    }
}
