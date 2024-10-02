<?php
class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createUser($name, $email, $password, $user_type, $school_year, $subject)
    {
        $sql = "INSERT INTO users (name, email, password, user_type, school_year, subject) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $email, $password, $user_type, $school_year, $subject]);
        return $stmt->rowCount();
    }

    public function selectTeacher() {
        $stmt = $this->pdo->prepare("SELECT name FROM users WHERE user_type = :user_type");
        $stmt->bindValue(':user_type', 1, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function listUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUser($id_users, $name, $email, $password, $user_type, $school_year, $subject)
    {
        $sql = "UPDATE users SET name = ?, email = ?, password = ?, user_type = ?, school_year = ?, subject = ? WHERE id_users = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $email, $password, $user_type, $school_year, $subject, $id_users]);
    }

    public function deleteUser($id_users)
    {
        $sql = "DELETE FROM users WHERE id_users = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_users]);
    }
}
