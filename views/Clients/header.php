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
<div style="background-color: #C62E2E;" class=" text-white py-2">
    <div class="container">
        <div class="row align-items-center">
            <!-- Contact Info -->
            <div class="col-12 col-md d-flex flex-wrap justify-content-center justify-content-md-start text-center text-md-start mb-2 mb-md-0">
                <span><i class="bi bi-telephone"></i> 19004953</span>
                <span class="ms-3">📍 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</span>
            </div>
            <!-- Social Links -->
            <div class="col-12 col-md-auto d-flex justify-content-center justify-content-md-end">
                <a href="#" class="text-white ms-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white ms-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white ms-2"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<div style="background-color: #F2E8C6;" class="text-dark py-2">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-12 col-md-4 text-center text-md-start">
                <div class="h5 m-0">
                    <a href="#" class="text-decoration-none text-dark">BARNES & NOBLE</a>
                </div>
            </div>
            
            <!-- Search Bar -->
            <div class="col-12 col-md-4">
                <form class="d-flex justify-content-center">
                    <input type="search" 
                           class="form-control form-control-sm" 
                           placeholder="Tìm kiếm sản phẩm..." 
                           style="height: 30px; padding: 0.25rem 0.5rem;">
                    <input class="btn btn-dark btn-sm ms-1" 
                           type="submit" 
                           style="height: 30px; padding: 0 10px; background-color:#C62E2E;" 
                           value="Tìm kiếm">
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="col-12 col-md-4 d-flex justify-content-end ">
                <ul class="nav nav d-flex justify-content-between ">
                    <!-- Tư vấn bán hàng -->
                    <li class="nav-item ">
                        <span class="d-flex flex-column text-md-end text-center">
                            <div class="small">Tư vấn bán hàng</div>
                            <div class="fw-bold">19004953</div>
                        </span>
                    </li>
                    <li><a class="nav-link" href="#"><i class="bi bi-cart"></i></a></li>
                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
</div>




<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
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




<div class="container my-4">
    <div class="row">
        <!-- Sidebar Menu -->
        <div class="col-md-3 bg-light border-end d-none d-md-block">
            <h5 class="text-uppercase py-3 ps-3">Danh mục</h5>
            <ul class="list-unstyled ps-3">
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Kinh Tế</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Văn Học Trong Nước</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Văn Học Nước Ngoài</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Thường Thức Đời Sống</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Thiếu Nhi</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Phát Triển Bản Thân</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Tiếng Học Ngoại Ngữ</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Chuyên Ngành</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Giáo Khoa - Giáo Trình</span>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Mới Phát Hành</span>
                </li>
            </ul>
        </div>


        <!-- Banner Section  -->
        <div class="col-md-9">
            
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/anh1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/anh2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./img/anh3.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>   


      

        
        <div class="container my-5">
    <div class="row">
        <!-- Phần bên trái (col-md-3) -->
        <div class="col-md-3">
            <h4 class="text-center mb-4">Sách Mới Bán Chạy</h4>
            
           
            <div class="card mb-3">
                <img src="./img/cheNguTamLy" class="card-img-top" alt="Sách Mới Bán Chạy">
                <div class="card-body">
                    <h5 class="card-title">Chế ngự tâm lý</h5>
                    <p><pan class="card-text text-danger">179,000đ</pan> <del>199,000đ</del></p>
                </div>
            </div>

            <div class="card mb-3">
                <img src="./img/DeconCSM" class="card-img-top" alt="Sách Mới Bán Chạy">
                <div class="card-body">
                    <h5 class="card-title">Để con chăm sóc mẹ</h5>
                    <p><pan class="card-text text-danger">133,200đ</pan> <del>148,000đ</del></p>
                </div>
            </div>

            <div class="card mb-3">
                <img src="./img/DeConCSC" class="card-img-top" alt="Sách Mới Bán Chạy">
                <div class="card-body">
                    <h5 class="card-title">Để con chăm sóc cha</h5>
                    <p><pan class="card-text text-danger">133,200đ</pan> <del>148,000đ</del></p>
                </div>
            </div>

            <div class="card mb-3">
                <img src="./img/Bo3PhepThuat" class="card-img-top" alt="Sách Mới Bán Chạy">
                <div class="card-body">
                    <h5 class="card-title">Bộ ba phép thuật</h5>
                    <p><pan class="card-text text-danger">207,000đ</pan> <del>230,000đ</del></p>
                </div>
            </div>
            
            <!-- Thêm các sách bán chạy khác tương tự -->
        </div>

