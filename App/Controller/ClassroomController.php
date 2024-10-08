<?php
require_once 'C:\xampp\htdocs\class_scheduling\App\Model\ClassroomModel.php';

class   ClassroomController
{
    private $classroommodel;

    public function __construct($pdo)
    {
        $this->classroommodel = new classroomModel($pdo);
    }

    public function createClassroom($identification, $contitionstatus, $equipaments, $description)
    {
        $this->classroommodel->createClassroom($identification, $contitionstatus, $equipaments, $description);
    }

    public function listClassrooms()
    {
        return $this->classroommodel->listClassrooms();
    }

    public function listClassroomsByID($id_class) {
        $classrooms = $this->classroommodel->listClassroomsByID($id_class);
        return $classrooms;
    }

    public function showClassroomsList()
    {
        $classrooms = $this->listClassrooms();
        include 'C:\xampp\htdocs\class_scheduling\App\View\Classrooms\view_all.php';
    }

    public function showIndClassroomsList()
    {
        $classrooms = $this->listClassrooms();
        include 'C:\xampp\htdocs\class_scheduling\App\View\Classrooms\view_ind.php'; 
    }

    public function showDispClassroomsList()
    {
        $classrooms = $this->listClassrooms();
        include 'C:\xampp\htdocs\class_scheduling\App\View\Classrooms\view_disp.php'; 
    }

    public function updateClassroom($id_class, $identification, $contitionstatus, $equipaments, $description)
    {
        $this->classroommodel->updateClassroom($id_class, $identification, $contitionstatus, $equipaments, $description);
    }

    public function updateClassroomStatus($id_class, $status) {
        $this->classroommodel->updateClassroomStatus($id_class, $status);
    }

    public function deleteClassroom($id_class)
    {
        $this->classroommodel->deleteClassroom($id_class);
    }
}
