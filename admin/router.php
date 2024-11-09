<?php
include "./views/index.php";

// Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
        default:
            include "./views/home.php";
            break;
    }
} else {
    include "./views/home.php"; 
}

include './views/footer.php';

