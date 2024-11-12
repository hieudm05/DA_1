<?php 

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
    '/' => (new HomeControllerClient())->home(),
};