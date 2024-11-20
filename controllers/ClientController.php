<?php 
class ClientController
{
    public $modelClinets;

    public function __construct() {
        $this->modelClinets = new ClientModels();
    }


    public function home() {
        $listDanhMuc = $this->modelClinets->getAllDanhMuc();
        $datas = $this ->modelClinets->getAllProductsByCategory();
        $top10 = $this -> modelClinets -> getTop10Sp();
        // var_dump($datas);
        require_once '../views/Clients/home.php';
        // require_once '../views/Clients/header.php';
    }
    // Cập nhật tài khoản
    public function updateAcount() {
        if(isset($_SESSION['user']) && is_array($_SESSION['user'])){
             extract($_SESSION['user']);
        }
        require_once '../views/Clients/UpdateTaiKhoan/updateTk.php';
    }
    public function login() {
        require_once '../views/Clients/accounts/login.php';
    }
    public function postLogin() {
        $thongbao = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userOrEmail = $_POST['username']; 
            $pass = $_POST['password'];
            $check = $this->modelClinets->checkAcc($userOrEmail, $pass);
            if (is_array($check)) {
                if($check['active'] === 1){
                    $thongbao ="Tài khoản đã bị khoá";
                    header('Location: http://localhost/base_test_DA1/public/?act=login');
                }else{
                    $_SESSION['user'] = $check;
                    header('Location: http://localhost/base_test_DA1/public/');
                    exit;
                }
            } else {
                $thongbao = 'Tài khoản hoặc mật khẩu không đúng';
            }
        } else {
            echo 'Lỗi';
        }
        require_once '../views/Clients/accounts/login.php';
    }

    public function logOut(){
        session_unset();
        session_destroy();
        header('Location: http://localhost/base_test_DA1/public/');
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

    // List danh mục
    // public function listDm() {
    //     // $listStudent = $this->modelStudent->getAll();
    //     $listDanhMuc = $this->modelClinets->getAllDanhMuc();
    //     // var_dump($listDanhMuc);
    //     require_once '../views/Clients/hde.php';
    // }
}