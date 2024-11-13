<?php
require_once 'C:\xampp\htdocs\class_scheduling\App\Model\SchedulingModel.php';

class SchedulingController
{
    private $schedulingmodel;

    public function __construct($pdo)
    {
        $this->schedulingmodel = new schedulingModel($pdo);
    }

    public function createScheduling($id_class, $scheduling_time, $end_time, $school_year)
{
    // Cria o agendamento
    $this->schedulingmodel->createScheduling($id_class, $scheduling_time, $end_time, $school_year);
    
    // Chama a função de envio de email
    $teacher_name = $_SESSION['userName'];
    require_once '../sendmail.php';
    enviarAvisoAula($this->schedulingmodel->getPdo(), $school_year, $scheduling_time, $end_time, $teacher_name);
}


    public function listSchedulings()
    {
        return $this->schedulingmodel->listSchedulings();
    }

    public function undoScheduling($id_class, $id_teacher) {
        return $this->schedulingmodel->undoScheduling($id_class, $id_teacher);
    }    

    public function getSchedulingByClassroom($id_class) {
        return $this->schedulingmodel->getSchedulingByClassroom($id_class);
    }

    public function showSchedulingsList()
    {
        $schedulings = $this->listSchedulings();
        include 'View\Classrooms\view.php'; // Inclua a view
    }
}

