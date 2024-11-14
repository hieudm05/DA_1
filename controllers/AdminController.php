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
            $namesp = isset($_POST['namesp']) ? $_POST['namesp'] : null;  
            $price = isset($_POST['price']) ? $_POST['price'] : null;  
            $mota = isset($_POST['mota']) ? $_POST['mota'] : null;    
            $idDm = isset($_POST['idDm']) ? $_POST['idDm'] : null;  
        
            // Check variable values  
            var_dump($namesp, $price, $mota, $idDm);  
            
            // Check for file upload  
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {  
                $uploadDir = 'uploads/';  
                // Ensure the uploads directory exists  
                if (!is_dir($uploadDir)) {  
                    mkdir($uploadDir, 0777, true);  
                }  
        
                $uploadFile = $uploadDir . basename($_FILES['img']['name']);  
                
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {  
                    $img = $uploadFile;  
                    if ($namesp && $price && $mota && $idDm) {  
                        if ($this->modelAdmin->postSP($namesp, $price, $img, $mota, $idDm)) {  
                            header('Location: router.php?act=listSP');  
                            exit;  
                        } else {  
                            // Show the error when inserting  
                            echo "Có lỗi khi thêm sản phẩm.";  
                        }  
                    } else {  
                        echo "Vui lòng điền đầy đủ thông tin sản phẩm.";  
                    }  
                } else {  
                    echo "Có lỗi khi upload file.";  
                }  
            } else {  
                echo "Vui lòng chọn một hình ảnh.";  
            }  
        }
    }
}