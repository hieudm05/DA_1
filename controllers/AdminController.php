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
    // Tài khoản
     public function listTaiKhoan() {
        $listTaiKhoan = $this->modelAdmin->getAllAcounts();
        require_once '../../views/Admins/TaiKhoan/listTaiKhoan.php';
    }
    public function accoutAtive() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $active = $_POST['active'];

           if( $this->modelAdmin->updateAccoutAtive($id,$active)){
                header('Location: router.php?act=listTaiKhoan');
                exit;
           }
        }
    }
    public function accoutRole() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $role = $_POST['role'];

           if( $this->modelAdmin->updateAccoutRole($id, $role)){
                header('Location: router.php?act=listTaiKhoan');
                exit;
           }
            
        }
    }

    ///SanPham
    public function formAddSP() {
        $listDanhMuc = $this->modelAdmin->getAllDanhMuc();
        require_once '../../views/Admins/SanPham/formAddSP.php';
        
    }
    public function listSP() {
        $listDanhMuc = $this->modelAdmin->getAllDanhMuc();
        $listProducts = $this->modelAdmin->getAllSP();
        require_once '../../views/Admins/SanPham/listSP.php';
    }
   public function postSP() {  
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $namesp = $_POST['namesp'];
        $price = $_POST['price'];
        $mota = $_POST['mota'];
        $iddm = $_POST['iddm'];
        
        // Kiểm tra nếu tệp ảnh tồn tại và không có lỗi khi tải lên
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // Gọi hàm uploadFile để lưu tệp vào thư mục uploads
            $file_save = uploadFile($_FILES['img'], '../uploads');
            
            if ($file_save) {  // Kiểm tra xem tệp đã được lưu thành công
                if ($this->modelAdmin->postSP($namesp, $price, $file_save, $mota, $iddm)) {
                    header('Location: router.php?act=listSP');
                    exit(); // Dừng script sau khi chuyển hướng
                } else {
                    echo "Lỗi khi thêm sản phẩm vào cơ sở dữ liệu.";
                }
            } else {
                echo "Lỗi khi lưu tệp ảnh.";
            }
        } else {
            echo "Lỗi khi tải lên tệp ảnh.";
        }
    } else {
        header('Location: /router.php?act=listSP');
        exit();
    }
}

}

