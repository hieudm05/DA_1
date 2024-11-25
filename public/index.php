<?php 
session_start();
ob_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Khởi tạo giỏ hàng nếu chưa có
}
include '../views/Clients/header.php';


// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
// require_once '../controllers/AdminController.php';
require_once '../controllers/ClientController.php';

// Require toàn bộ file Models
require_once '../models/ClientModels.php';
// require_once '../models/AdminModels.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new ClientController())->home(),
    // Tài khoản
    'updateAcount' => (new ClientController()) -> updateAcount(),
    'login' => (new ClientController()) -> login(),
    'postLogin' => (new ClientController()) -> postLogin(),
    'signup' => (new ClientController()) -> signUp(),
    'logout' => (new ClientController()) -> logOut(),

    // quên mật khẩu
    'forgot_password' => (new ClientController()) -> forgot_password(),
   
    'verify_code' => (new ClientController()) -> verify_code(),
    
    'reset_password' => (new ClientController()) -> reset_password(),
    
    // Xử lí tài khoản
    'postAddAcount' => (new ClientController()) -> addAccount(),
    

    //
    'chitietSP' => (new ClientController()) -> chitietSP(),


    // Tìm kiếm
    'search' => (new ClientController()) ->search(),
    // Giỏ hàng
    'addcart' => (new ClientController()) ->carts(),
    'deleteCart' => (new ClientController()) ->deleteCarts(),

    // Bill
    'thanhtoan' => (new ClientController()) ->bills(),
    'billconfirm' => (new ClientController()) ->billConfirm(),

    // Sản phẩm chi tiết
    'sanphamchitiet' => (new ClientController()) -> sanphamchitiet(),
    // Comment
    'formComment' => (new ClientController()) -> formComment(),
    'deleteComment' => (new ClientController()) -> deleteComment(),
    // sản phẩm theo danh mục
    'danhmuc'=> (new ClientController())-> productByCasterri(),
};

include '../views/Clients/footer.php';
ob_end_flush();

