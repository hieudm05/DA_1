<?php 
class HomeControllerClient
{
    public $modelStudent;

    public function __construct() {
        $this->modelStudent = new Student();
    }

    public function home() {
        // $listStudent = $this->modelStudent->getAll();

        require_once '../views/Clients/home.php';
    }

}