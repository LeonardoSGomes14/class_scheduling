<?php
class SchedulingModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createScheduling($id_class, $scheduling_time, $end_time)
    {
        $id_teacher = $_SESSION['userID'];
        $teacher_name = $_SESSION['userName'];
        $sql = "INSERT INTO scheduling (id_teacher, teacher_name, id_class, scheduling_time, end_time) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_teacher, $teacher_name, $id_class, $scheduling_time, $end_time]);
        return $stmt->rowCount();
    }

    public function undoScheduling($id_class, $id_teacher) {
        $sql = "SELECT * FROM scheduling WHERE id_class = ? AND id_teacher = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_class, $id_teacher]);

        if ($stmt->rowCount() > 0) {
            $sql = "DELETE FROM scheduling WHERE id_class = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id_class]);

            return "Reserva desfeita com sucesso!";
        } else {
            return "Você não tem autorização para desfazer esta reserva.";
        }
    }

    public function getSchedulingByClassroom($id_class)
    {
        $sql = "SELECT * FROM scheduling WHERE id_class = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_class]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listSchedulings()
    {
        $sql = "SELECT * FROM scheduling";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
