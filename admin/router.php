<?php
include "./views/index.php";

// Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            include "../admin/views/DanhMuc/addDM.php";
            break;
        case 'listdm':
            include "../admin/views/DanhMuc/listDM.php";
            break;
        default:
            include "./views/home.php"; 
            break;
    }
} else {
    include "./views/home.php"; 
}
include '../admin/views/footer.php';


