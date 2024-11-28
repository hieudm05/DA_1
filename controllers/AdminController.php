<?php 
class HomeController
{
    public $modelAdmin;

    public function __construct() {
        $this->modelAdmin = new AdminModels();
    }

    public function home() {
        $listBillStatus = $this->modelAdmin->getAllBill_3();
        $sumBills = $this->modelAdmin->getTotalOrders();
        $sumTotalBill = $this->modelAdmin->sumTotalOrders();
        $sumProducts = $this->modelAdmin->sumProducts();
        $sumComments = $this->modelAdmin->sumComments();

        // printf($sumBills);
        // var_dump($listBillStatus);
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
        $listProducts = $this->modelAdmin->getAllProductsByCategory();
        // var_dump($listProducts);
        require_once '../../views/Admins/SanPham/listSP.php';
    }
    public function postSP() {  
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $namesp = $_POST['namesp'];  
            $price = $_POST['price'];  
            $mota = $_POST['mota'];  
            $iddm = $_POST['iddm'];  
            $quantity = $_POST['id_soluong'];
            
            // Kiểm tra file ảnh  
            if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {  
                $file_save = uploadFile($_FILES['img'], 'uploads');  
                if ($file_save) {   
                    if ($this->modelAdmin->postSP($namesp, $price, $file_save, $mota, $iddm, $quantity)) {  
                        header('Location: router.php?act=listSP');  
                        exit();  
                    } else {  
                        echo "Lỗi khi thêm sản phẩm vào cơ sở dữ liệu.";  
                    }  
                } else {  
                    echo "Lỗi khi lưu tệp ảnh.";  
                }  
            }  
        } else {  
            header('Location: /router.php?act=listSP');  
            exit();  
        }  
    }
    
public function deleteSP() {  
    $id = $_GET['id'];  

    $record = $this->modelAdmin->getSPById($id);  
    
    if ($record) { 
        if ($this->modelAdmin->deleteSP($id)) {  
            header('Location: router.php?act=listSP');  
            exit;  
        } else {  
             echo "Không thể xóa sản phẩm.";  
        }  
    } else {  
        echo "Sản phẩm không tồn tại.";  
    }  
}
public function formSuaSP() {
    $id = $_GET['id']; // Retrieve product ID from GET request
    $product = $this->modelAdmin->getSPById($id); // Fetch the product details by ID
    $listDanhMuc = $this->modelAdmin->getAllDanhMuc(); // Fetch all categories for selection

    // Check if product exists
    if ($product) {
        require_once '../../views/Admins/SanPham/formupdateSP.php';
    } else {
        echo "Sản phẩm không tồn tại.";
    }
}

public function updateSP() {  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
        $id = $_POST['id'];  
        $namesp = $_POST['namesp'];  
        $price = $_POST['price'];  
        $mota = $_POST['mota'];  
        $iddm = $_POST['iddm'];  
        $quantity = $_POST['quantity'];
        $img = ''; // Xử lý ảnh mới  

        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {  
            // Xử lý upload ảnh mới  
            $file_save = uploadFile($_FILES['img'], 'uploads');  
            if ($file_save) {  
                $img = $file_save; // Gán đường dẫn ảnh mới  
            } else {  
                echo "Lỗi khi lưu tệp ảnh.";  
                return;  
            }  
        }  

        // Cập nhật sản phẩm
        $current_img = $_POST['current_img'];
        if ($this->modelAdmin->updateSP($id, $namesp, $price, $img ?: $current_img, $mota, $iddm, $quantity)) {  
            header('Location: router.php?act=listSP');  
            exit;  
        } else {  
            echo "Lỗi khi cập nhật sản phẩm.";  
        }  
    } else {  
        header('Location: router.php?act=listSP');  
        exit();  
    }  
}
 //đơn hàng
    public function listBills() {
        $listDanhMuc = $this->modelAdmin->getAllDanhMuc();
        $listOrders = $this->modelAdmin->getAllBill(); 
        require_once '../../views/Admins/donHang/listDonHang.php'; 
    }
    public function updateStatusBills(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $bill_status = $_POST['bill_status'];
            $id = $_GET['id'];
            // var_dump($id);
            $listOrders = $this->modelAdmin->getAllBill(); 
            $this->modelAdmin->updateOrderStatus($id ,$bill_status);
            header('location: router.php?act=listDonHang');
        }
        require_once '../../views/Admins/donHang/listDonHang.php';
    }
    public function confirmOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bill_status = 1;
            $id = $_GET['id'];

            $this->modelAdmin->updateOrderStatus($id ,$bill_status);
            header('location: router.php');
            
        }
    }
    


///bình luận
public function listComments() {
    $listBinhLuan = $this->modelAdmin->getAllComments();
    require_once '../../views/Admins/BinhLuan/listComments.php';
}


public function deleteComment() {
    $id = $_GET['id'];
    if ($this->modelAdmin->deleteComment($id)) {
        header('Location: router.php?act=listComments');
        exit;
    } else {
        echo "Không thể xóa bình luận.";
    }
}

    
}

