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
<div class="bg-danger text-white py-2">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <span><i class="bi bi-telephone"></i> 19004953</span>
            <span class="ms-3">📍 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</span>
        </div>
        <div>
            <a href="#" class="text-white ms-2">Facebook</a>
            <a href="#" class="text-white ms-2">Instagram</a>
            <a href="#" class="text-white ms-2">YouTube</a>
        </div>
    </div>
</div>

<!-- Header Main -->
<div class="bg-warning text-dark py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <div class="h4 m-0">
            <a href="#" class="text-decoration-none text-dark">BARNES & NOBLE</a>
        </div>
        <!-- Search Bar -->
        <form class="d-flex">
            <input type="search" class="form-control" placeholder="Tìm kiếm sản phẩm...">
            <button class="btn btn-dark ms-1" type="submit">Tìm kiếm</button>
        </form>
        <!-- Contact Information -->
        <div>
            <span>📞 Tư vấn bán hàng: 19004953</span>
        </div>
        <!-- Cart Icon -->
        <div>
            <a href="#" class="text-dark fs-4">🛒</a>
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
        <div class="col-md-3 bg-light border-end">
            <h5 class="text-uppercase py-3 ps-3">Danh mục</h5>
            <ul class="list-unstyled ps-3">
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Kinh Tế</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Văn Học Trong Nước</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Văn Học Nước Ngoài</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Thường Thức Đời Sống</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Thiếu Nhi</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Phát Triển Bản Thân</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Tiếng Học Ngoại Ngữ</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Chuyên Ngành</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Giáo Khoa - Giáo Trình</span>
                    <i class="bi bi-chevron-right"></i>
                </li>
                <li class="d-flex justify-content-between align-items-center py-2">
                    <span>Sách Mới Phát Hành</span>
                    <i class="bi bi-chevron-right"></i>
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

