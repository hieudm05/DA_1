<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Example with Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<!-- Top Bar -->
<!-- Top Header -->
<!-- Header -->
<div style="background-color: #C62E2E;" class="text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <!-- Contact Info -->
                <div class="col-12 col-md d-flex flex-wrap justify-content-center justify-content-md-start text-center text-md-start mb-2 mb-md-0">
                    <span><i class="bi bi-telephone"></i> 19004953</span>
                    <span class="ms-3 text-sm text-md text-lg">📍 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</span>
                </div>
                <!-- Social Links -->
                <div class="col-12 col-md-auto d-flex justify-content-center justify-content-md-end d-none d-md-block">
                    <a href="#" class="text-white ms-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white ms-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white ms-2"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
<header class="sticky-top">
    <!-- Contact Info Bar -->
    

    <!-- Main Header -->
    <div style="background-color: #F2E8C6;" class="text-dark py-2 ">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-12 col-md-4 text-center text-md-start">
                    <div class="h5 m-0">
                        <a href="http://localhost/base_test_DA1/public/" class="text-decoration-none text-dark">BARNES & NOBLE</a>
                    </div>
                </div>
                <!-- Search Bar -->
                <div class="col-8 col-md-4">
                    <form class="d-flex justify-content-center">
                        <input type="search" 
                               class="form-control form-control-sm" 
                               placeholder="Tìm kiếm sản phẩm..." 
                               style="height: 30px; padding: 0.25rem 0.5rem;">
                        <input class="btn btn-dark btn-sm border-0" 
                               type="submit" 
                               style="height: 30px; padding: 0 10px; border: none; background-color:#C62E2E;" 
                               value="Tìm kiếm">
                    </form>
                </div>
                <!-- Contact Info -->
                <div class="col-4 col-md-4 d-flex justify-content-end">
                    <ul class="nav nav d-flex justify-content-between">
                        <li class="nav-item">
                            <span class="d-flex flex-column d-none d-md-block">
                                <div class="small">Tư vấn bán hàng</div>
                                <div class="fw-bold">19004953</div>
                            </span>
                        </li>
                        <li><a class="nav-link text-dark" style="font-size: 18px;" href="#"><i class="bi bi-cart3"></i></a></li>
                        <?php if(isset($_SESSION['user'])){  extract($_SESSION['user']) ?>
                        <li class="nav-item dropdown d-flex align-items-center">
                            <a class="dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#" role="button" style="font-size: 18px;" aria-expanded="false"><img src="<?= $avatar ?>" height="24"  style="border-radius: 50% ;" alt=""></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?act=updateAcount&id=<?=$_SESSION['user']['id'] ?>">Cập nhật tài khoản</a></li>
                                <?php if($role === 1 ) { ?>
                                    <li><a class="dropdown-item" href="http://localhost/base_test_DA1/views/Admins/router.php">Đăng nhập admin</a></li>
                                <?php }else{ ?>
                                    <li><a class="dropdown-item" href="?act=signup">Lấy lại pass</a></li>
                                <?php } ?>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="?act=logout">Đăng xuất</a></li> 
                            </ul>
                        </li>
                        <?php }else{?>
                            <li class="nav-item dropdown d-flex align-items-center">
                            <a class="dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#" role="button" style="font-size: 18px;" aria-expanded="false"><i class="bi bi-person-circle"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?act=login">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="?act=signup">Đăng kí</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li> -->
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light shadow-lg border-bottom border-secondary py-1">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/base_test_DA1/public/">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Sản phẩm 1</a></li>
                        <li><a class="dropdown-item" href="#">Sản phẩm 2</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cửa hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tuyển dụng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>






