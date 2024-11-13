<?php 
class HomeController
{
    public $modelAdmin;

    public function __construct() {
        $this->modelAdmin = new AdminModels();
    }

    public function home() {
        require_once '../../views/Admins/home/home.php';
    }
    // Danh Mục
    public function formAddDm() {
        require_once '../../views/Admins/DanhMuc/formAddDM.php';
    }

    public function listDm() {
        $listDanhMuc = $this->modelAdmin->getAllDanhMuc();
        require_once '../../views/Admins/DanhMuc/listDm.php';
    }
    public function postDm() {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)){
            $name = $_POST['name'];
            if($this->modelAdmin->postDm($name)){
                header('location: router.php?act=listDm');
                exit;
            }
        }
    }
    public function deleteDm() {
            $id = $_GET['id']; 
            $record = $this->modelAdmin->getDmById($id);
            if ($record) { // Kiểm tra xem bản ghi có tồn tại không
                if ($this->modelAdmin->deleteDm($id)) {
                    header('Location: router.php?act=listDm');
                    exit;
                } else {
                    echo "Không thể xóa danh mục.";
                }
            } else {
                echo "Danh mục không tồn tại.";
            }
    }

    public function formSuaDm() {
        $id = $_GET['id'];
        $danhMuc = $this->modelAdmin->getDmById($id);
        require_once '../../views/Admins/DanhMuc/updateDm.php';
    }

    public function updateDm(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];

           if( $this->modelAdmin->updateDm($id,$name)){
                header('Location: router.php?act=listDm');
                exit;
           }
            
        }
    }
    

}
