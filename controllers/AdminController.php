<?php 
class HomeController
{
    public $modelStudent;

    public function __construct() {
        $this->modelStudent = new Student();
    }

    public function home() {
        // $listStudent = $this->modelStudent->getAll();

        require_once '../../views/Admins/home/home.php';
    }
    public function admin() {
        // $listStudent = $this->modelStudent->getAll();

        // require_once '../views/Admins/home.php';
    }
    public function addDm() {
        // $listStudent = $this->modelStudent->getAll();

        require_once '../../views/Admins/DanhMuc/addDM.php';
    }

}