<?php
include_once 'C:\xampp\htdocs\class_scheduling\App\Model\GroupsModel.php';

class GroupController {
    private $groupmodel;

    public function __construct($pdo) {
        $this->groupmodel = new groupModel($pdo);
    }

    public function createGroup($teacher, $year_school) {
        $this->groupmodel->createGroup($teacher, $year_school);
    }

    public function listGroups()
    {
        return $this->groupmodel->listGroups();
    }

    public function showGroupsList()
    {
        $groups = $this->listGroups();
        include '../../App/View/Groups/view.php'; // Inclua a view
    }

    public function updateGroup($id_group, $teacher, $year_school) {
        $this->groupmodel->updateGroup($id_group, $teacher, $year_school);
    }

    public function selectGroups($teacher) {
        return $this->groupmodel->selectGroups($teacher);
    }

    public function deleteGroup($id_group) {
        $this->groupmodel->deleteGroup($id_group);
    }
}
?>