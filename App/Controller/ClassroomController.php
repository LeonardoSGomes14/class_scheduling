<?php
require_once 'Model\ClassroomModel.php';

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

    public function showClassroomsList()
    {
        $classrooms = $this->listClassrooms();
        include 'View\Classrooms\view.php'; // Inclua a view
    }

    public function updateClassroom($id_class, $identification, $contitionstatus, $equipaments, $description)
    {
        $this->classroommodel->updateClassroom($id_class, $identification, $contitionstatus, $equipaments, $description);
    }

    public function deleteClassroom($id_class)
    {
        $this->classroommodel->deleteClassroom($id_class);
    }
}
