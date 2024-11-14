<?php 
ob_start();
include './home/index.php';
// Require file Common
require_once('../../commons/env.php');
 // Khai báo biến môi trường
require_once '../../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once '../../controllers/AdminController.php';

// Require toàn bộ file Models
require_once '../../models/AdminModels.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {  
    // Trang chủ  
    '/' => (new HomeController())->home(),  
    // Danh Mục  
    'addDm' => (new HomeController())->formAddDm(),  
    'listDm' => (new HomeController())->listDm(),  
    'postDm' => (new HomeController())->postDm(),  
    'xoadm' => (new HomeController())->deleteDm(),  
    'formSuaDm' => (new HomeController())->formSuaDm(),  
    'postSuaDm' => (new HomeController())->updateDm(),  
    // Sản phẩm  
    'addSP' => (new HomeController())->formAddSP(),  
    'listSP' => (new HomeController())->listSP(),  
    'postSP' => (new HomeController())->postSP(),  
}; 
include './home/footer.php';
ob_end_flush();