<?php
require_once 'C:\xampp\htdocs\class_scheduling\App\Model\UserModel.php';

class UserController
{
    private $usermodel;

    public function __construct($pdo)
    {
        $this->usermodel = new userModel($pdo);
    }

    public function createUser($name, $email, $password, $user_type, $school_year, $subject)
    {
        $this->usermodel->createUser($name, $email, $password, $user_type, $school_year, $subject);
    }

    public function selectTeacher() {
        return $types = $this->usermodel->selectTeacher();
    }    

    public function listUsers()
    {
        return $this->usermodel->listUsers();
    }

    public function showUsersList()
    {   
        $users = $this->listUsers();
        include 'C:\xampp\htdocs\class_scheduling\App\View\Users\view.php'; 
    }

    public function updateUser($id_users, $name, $email, $password, $user_type, $school_year, $subject)
    {
        $this->usermodel->updateUser($id_users, $name, $email, $password, $user_type, $school_year, $subject);
    }

    public function deleteUser($id_users)
    {
        $this->usermodel->deleteUser($id_users);
    }
}
