<?php
require_once 'C:\xampp\htdocs\class_scheduling\App\Model\SubjectModel.php';

class subjectsController
{
    private $subjectmodel;

    public function __construct($pdo)
    {
        $this->subjectmodel = new subjectModel($pdo);
    }

    public function createSubjects($name)
    {
        $this->subjectmodel->createSubject($name);
    }

    public function listSubjects()
    {
        return $this->subjectmodel->listSubjects();
    }

    public function showSubjectsList()
    {
        $subjectss = $this->listSubjects();
        include 'View\Subjects\view.php'; // Inclua a view
    }

    public function updateSubjects($id_subject, $name)
    {
        $this->subjectmodel->updateSubject($id_subject, $name);
    }

    public function deleteSubjects($id_subject)
    {
        $this->subjectmodel->deleteSubject($id_subject);
    }
}
