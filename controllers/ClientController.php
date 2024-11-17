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
    // Cập nhật tài khoản
    public function updateAcount() {
        $id = $_GET['id'];
        $listAccountById = $this->modelClinets->getAccountById($id);
        require_once '../views/Clients/UpdateTaiKhoan/updateTk.php';
    }
    public function login() {
        require_once '../views/Clients/accounts/login.php';
    }
    public function signUp() {
        require_once '../views/Clients/accounts/signUp.php';
    }
    // Đăng kí tài khoản
    public function addAccount(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $password = $_POST['password'];

            if($this->modelClinets->addAccount($username, $email, $password, $sdt)){
                header('location: http://localhost/base_test_DA1/public/');
            }
        }
    }

    

}