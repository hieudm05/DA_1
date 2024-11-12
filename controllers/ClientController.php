<?php 
class ClientController
{
    public $modelClinets;

    public function __construct() {
        $this->modelClinets = new ClientModels();
    }


    public function home() {
        // $listStudent = $this->modelStudent->getAll();

        require_once '../views/Clients/home.php';
    }

}