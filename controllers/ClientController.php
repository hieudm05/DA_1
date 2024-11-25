<?php 
class ClientController
{
    public $modelClients; 

    public function __construct()
    {
        $this->modelClients = new ClientModels(); 
    }


    public function home() {
        $listDanhMuc = $this->modelClients->getAllDanhMuc();
        $datas = $this ->modelClients->getAllProductsByCategory();
        $top10 = $this -> modelClients -> getTop10Sp();
        // var_dump($listDanhMuc);
        require_once '../views/Clients/home.php';
        // require_once '../views/Clients/footer.php';
    }
    // Cập nhật tài khoản
    public function updateAcount() {
        if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
            extract($_SESSION['user']);
            $imgPath = './../' . $avatar;
            $avt = $imgPath ? $imgPath : './img/userNo.jpg';
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $sdt = $_POST['sdt'];
    
                // Xử lý ảnh đại diện
                $avatar = $avt;
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
                    $file_save = uploadFile($_FILES['avatar'], 'uploads/users');
                    if ($file_save) {
                        $avatar = $file_save; // Gán đường dẫn ảnh mới
                    } else {
                        echo "Lỗi khi lưu tệp ảnh.";
                        return;
                    }
                }
    
                // Cập nhật thông tin
                $current_img = $_POST['current_img'];
                if ($this->modelClients->updateAccout($id, $username, $email, $avatar ?: $current_img, $address, $sdt)) {
                    // Cập nhật thành công
                    // Lấy lại thông tin người dùng mới
                    $_SESSION['user'] = $this->modelClients->getAccountById($id);
                    header('Location: http://localhost/base_test_DA1/public/');
                    exit;
                } else {
                    echo "Lỗi khi cập nhật tài khoản.";
                }
            } else {
                require '../views/Clients/UpdateTaiKhoan/updateTk.php';
                exit;
            }
        }
    
        // Gọi view cập nhật tài khoản
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
            $check = $this->modelClients->checkAcc($userOrEmail, $pass);
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


            if($this->modelClients->addAccount($username, $email, $password, $sdt)){

           
                header('location: http://localhost/base_test_DA1/public/');
            }
        }
    }
    // quên mật khẩu
   
    public function forgot_password(){
        require_once '../views/Clients/accounts/forgot_password.php' ;
    }
    // lẫy mã
    public function verify_code(){
        require_once '../views/Clients/accounts/verify_code.php';
    }
    public function reset_password(){
       
 
            require_once '../views/Clients/accounts/reset_password.php';
        
    }
    public function chitietSP(){
        require_once '../views/Clients/productDetails/chitietSP.php';
    }
   
    

    public function sanphamchitiet() {
        $id = $_GET['id']; 
        $sanPhamChiTiet = $this->modelClients->getSPById($id);
        extract($sanPhamChiTiet); 
        $sanPhamChung = $this->modelClients->load_sanpham_cungloai($id, $iddm); 
        $sanPhamNoiBat = $this->modelClients->getTop10Sp(); 
        $comments = $this->modelClients->getCommentsByProductId($id); 
        
        require_once '../views/Clients/productDetails/chitietSP.php'; 
    }
    

    // List danh mục
    // public function listDm() {
    //     // $listStudent = $this->modelStudent->getAll();
    //     $listDanhMuc = $this->modelClinets->getAllDanhMuc();
    //     // var_dump($listDanhMuc);
    //     require_once '../views/Clients/hde.php';
    // }
   

   
    public function search() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])){
            $search = $_POST['search'];

            $datasSearch = $this->modelClients->getAllSP($search);

      

            // var_dump($datasSearch);
        }else{
            header('location: http://localhost/base_test_DA1/public/');
        }
        require_once '../views/Clients/products/products.php';
    }

    // Giỏ hàng
    public function carts() {
        // Kiểm tra nếu giỏ hàng chưa tồn tại, khởi tạo mảng giỏ hàng
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Kiểm tra nếu người dùng nhấn nút "Thêm vào giỏ hàng"
        if (isset($_POST['addcart']) && $_POST['addcart']) {
            // Lấy dữ liệu từ form và xử lý đầu vào
            $id = htmlspecialchars($_POST['id']);
            $namesp = htmlspecialchars($_POST['namesp']);
            $img = htmlspecialchars($_POST['img']);
            $price = (float) htmlspecialchars($_POST['price']);
            $mota = htmlspecialchars($_POST['mota']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $soluong = 1;
            $tongTien = $soluong * $price;

            // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
            $exists = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $id) {
                    // Nếu sản phẩm đã tồn tại, tăng số lượng
                    $item['soluong'] += 1;
                    $item['tongTien'] = $item['soluong'] * $item['price'];
                    $exists = true;
                    break;
                }
            }

            // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
            if (!$exists) {
                $newProduct = [
                    'id' => $id,
                    'namesp' => $namesp,
                    'img' => $img,
                    'price' => $price,
                    'soluong' => $soluong,
                    'quantity' => $quantity,
                    'tongTien' => $tongTien,
                    'mota' => $mota
                ];
                array_push($_SESSION['cart'], $newProduct);
            }
        }

        // Gọi view giỏ hàng
        require_once '../views/Clients/carts/cart.php';
    }
    public function deleteCarts(){
        if (isset($_GET['id'])) {
            $id = $_GET['id']; // Lấy ID từ URL
            if (isset($_SESSION['cart'][$id])) { 
                unset($_SESSION['cart'][$id]); // Xóa sản phẩm khỏi giỏ hàng
            }
        } else {
            $_SESSION['cart'] = []; // Xóa toàn bộ giỏ hàng
        }
        header('location: ?act=addcart'); // Chuyển hướng về trang giỏ hàng
    }
     

    public function bills(){
        require_once '../views/Clients/carts/thanhtoan.php';
    }
    public function billConfirm(){
      
        require_once '../views/Clients/carts/bill.php';
    }
    //   public function myBills(){
    //     $datas = $this->modelClinets->loadall_bill($_SESSION['user']['id']);
    //     var_dump($datas);
    //     require_once '../views/Clients/carts/thanhtoan.php';
    // }




    //comment
    
    public function formComment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idpro = $_GET['id'] ?? null;
    
            if (!$idpro) {
                echo "Không tìm thấy sản phẩm để bình luận.";
                return;
            }
    
            $noidung = $_POST['comment'] ?? '';
            $time = date('Y-m-d H:i:s'); 
    
            if (isset($_SESSION['user']) && $_SESSION['user']['id']) {
                $idUser = $_SESSION['user']['id']; 
    
                if ($this->modelClients->addComment($idpro, $idUser, $noidung, $time)) {
                    header('Location: ?act=sanphamchitiet&id=' . $idpro); 
                    exit();
                } else {
                    echo "Không thể thêm bình luận. Vui lòng thử lại.";
                }
            } else {
                echo "Bạn cần <a href='?act=login'>đăng nhập</a> để gửi bình luận.";
            }
        }
    }
    
    

    public function deleteComment() {
        $commentId = $_GET['id']; // Get the comment ID
        $comment = $this->modelClients->getCommentById($commentId); // Retrieve the comment from the database
    
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id']; // Get logged-in user ID
    
            // If the user is the one who made the comment or if the user is an admin
            if ($comment['idUser'] == $userId || $_SESSION['user']['role'] == 'admin') {
                $this->modelClients->deleteComment($commentId);
                header('Location: ?act=sanphamchitiet&id=' . $comment['idpro']);
                exit();
            } else {
                echo "Bạn không có quyền xóa bình luận này.";
            }
        } else {
            echo "Bạn cần đăng nhập để xóa bình luận.";
        }
    }
      //   
      public function productByCasterri(){
        
        $id = $_GET['id'] ;
        $data = $this->modelClients->productByCasterri($id) ;
        
        // var_dump($data) ;
        // extract($data) ;
        
        require_once '../views/Clients/productByCasteri/productByCasterri.php';
        
      }
}    

