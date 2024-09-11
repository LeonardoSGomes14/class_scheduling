<?php
require_once 'Model/SubjectModel.php';

class subjectsController
{
    private $subjectmodel;

    public function __construct($pdo)
    {
        $this->subjectmodel = new subjectModel($pdo);
    }

    public function createSubjects($name, $teacher)
    {
        $this->subjectmodel->createSubject($name, $teacher);
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

    public function updateSubjects($id_subject, $name, $teacher)
    {
        $this->subjectmodel->updateSubject($id_subject, $name, $teacher);
    }

    public function deleteSubjects($id_subject)
    {
        $this->subjectmodel->deleteSubject($id_subject);
    }
}
