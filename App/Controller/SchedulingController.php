<?php
require_once 'C:\xampp\htdocs\class_scheduling\App\Model\SchedulingModel.php';

class SchedulingController
{
    private $schedulingmodel;

    public function __construct($pdo)
    {
        $this->schedulingmodel = new schedulingModel($pdo);
    }

    public function createScheduling($identification, $contitionstatus, $equipaments, $description)
    {
        $this->schedulingmodel->createScheduling($identification, $contitionstatus, $equipaments, $description);
    }

    public function listSchedulings()
    {
        return $this->schedulingmodel->listSchedulings();
    }

    public function showSchedulingsList()
    {
        $schedulings = $this->listSchedulings();
        include 'View\Classrooms\view.php'; // Inclua a view
    }

    public function deleteScheduling($id_scheduling)
    {
        $this->schedulingmodel->deleteScheduling($id_scheduling);
    }
}
