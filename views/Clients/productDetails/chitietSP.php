<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Quẳng Gánh Lo Đi Và Vui Sống</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        .product-title {  
            font-size: 2rem;  
            font-weight: bold;  
            color: #000;  
        }  
        .rating {  
            color: #ffc107;  
        }  
        .info-box {  
            background: #fff;  
            border: 1px solid #ddd;  
            border-radius: 10px;  
            padding: 20px;  
        }  
        .btn-read {  
            background-color: #dc3545;  
            color: #fff;  
        }  
        .btn-read:hover {  
            background-color: #c82333;  
        }  
        .highlight {  
            background-color: #f8d7da;  
            color: #dc3545;  
            border-radius: 5px;  
            padding: 5px 10px;  
        } 
        button.rounded-pill {
            border-radius: 10px !important;
        }

        #quantity-input {
            font-size: 1rem;
            height: 38px;
        }
 
    </style>  
</head>  
<body>  
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quẳng Gánh Lo Đi Và Vui Sống</li>
        </ol>
    </nav>

    <!-- Sản phẩm chính -->
    <div class="container mt-5">
    <div class="row align-items-start">
        <!-- Cột 1: Hình lớn -->
        <div class="col-md-4">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp" 
                 alt="Quẳng Gánh Lo Đi Và Vui Sống" class="img-fluid mb-3" style="width: 350px; height: 400px;">
        </div>

        <!-- Cột 2: Thông tin sản phẩm -->
        <div class="col-md-5">
            <h1 class="product-title">Quẳng Gánh Lo Đi Và Vui Sống</h1>
            <p class="d-flex align-items-center">
                <span class="rating me-2">5.0 ★★★★★</span>
                <a href="#" class="text-decoration-none">200 đánh giá</a>
            </p>
            <p><span class="badge bg-danger">#31 trong Top xu hướng</span></p>

            <div class="row mb-4">
                <div class="col-md-6">
                    <p><strong>Tác giả:</strong> Thai Ha</p>
                    <p><strong>Nhà xuất bản:</strong> Đang cập nhật</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Thể loại:</strong> Phát triển cá nhân</p>
                    <p><strong>Gói cước:</strong> Mua lẻ, nhiều</p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <p class="text-danger fw-bold fs-3 mb-0 me-3">92,000đ</p>
                <p class="text-muted text-decoration-line-through mb-0 me-3">115,000đ</p>
                <div class="input-group" style="width: 120px;">
                    <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity()">-</button>
                    <input type="text" class="form-control text-center" value="1" min="1" id="quantity-input">
                    <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity()">+</button>
                </div>
            </div>

            <div class="d-flex">
                <button class="btn btn-warning rounded-pill me-3">Thêm vào giỏ hàng</button>
                <button class="btn btn-danger rounded-pill">Mua ngay</button>
            </div>

            <!-- Giới thiệu sách thẳng hàng với tiêu đề -->
            <div class="mt-5">
                <h2 class="fw-bold">Giới thiệu sách</h2>
                <p>
                    <strong>Quẳng Gánh Lo Đi Và Vui Sống</strong> là một cuốn sách kinh điển về nghệ thuật sống, 
                    giúp bạn xử lý stress, sống nhẹ nhàng hơn, và vượt qua lo âu. Dale Carnegie chia sẻ những cách 
                    thực tế để giải quyết lo lắng, sống tích cực và đạt được hạnh phúc mỗi ngày.
                </p>
                <h4 class="mt-4">Độc giả nói về "Quẳng gánh lo đi và vui sống"?</h4>
                <p>Đánh giá: <span class="text-warning">★★★★★</span> (200 đánh giá)</p>
                <h5>Bình luận</h5>
                <p>Bạn cần <a href="#" class="text-primary">đăng nhập</a> để bình luận.</p>
            </div>
        </div>

        <!-- Cột 3: Thông tin thêm và Sản phẩm nổi bật -->
        <div class="col-md-3">
    <!-- Phần chỉ có ở BARNES & NOBLE -->
    <div class="info-box p-3 border rounded mb-4">
        <h5 class="fw-bold mb-3">Chỉ có ở BARNES & NOBLE</h5>
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle text-success"></i> Sản phẩm 100% chính hãng</li>
            <li><i class="bi bi-person-circle text-success"></i> Tư vấn mua sách trong giờ hành chính</li>
            <li><i class="bi bi-truck text-success"></i> Miễn phí vận chuyển cho đơn từ 250.000đ</li>
            <li><i class="bi bi-telephone text-success"></i> 19004953</li>
        </ul>
    </div>
    <div style="height: 200px"></div>
    <!-- Phần sản phẩm nổi bật -->
    <h4 class="fw-bold mb-3">Sản phẩm nổi bật</h4>
    <ul class="list-unstyled">
        <!-- Sản phẩm 1 -->
        <li class="mb-4 p-3 border rounded d-flex align-items-center">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp" 
                 alt="Quẳng Gánh Lo Đi Và Vui Sống" class="me-3 rounded" style="width: 50px; height: 60px;">
            <div>
                <span class="fw-bold">Quẳng Gánh Lo Đi Và Vui Sống</span><br>
                <span class="text-danger fw-bold">92,000đ</span>
                <span class="text-muted text-decoration-line-through mb-0 me-3">115,000đ</span>
            </div>
        </li>
        <!-- Sản phẩm 2 -->
        <li class="mb-4 p-3 border rounded d-flex align-items-center">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp" 
                 alt="Đắc Nhân Tâm" class="me-3 rounded" style="width: 50px; height: 60px;">
            <div>
                <span class="fw-bold">Đắc Nhân Tâm</span><br>
                <span class="text-danger fw-bold">110,000đ</span>
                <span class="text-muted text-decoration-line-through mb-0 me-3">115,000đ</span>
            </div>
        </li>

        <!-- Sản phẩm 3 -->
        <li class="mb-4 p-3 border rounded d-flex align-items-center">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp" 
                 alt="Sống Đời Bình An" class="me-3 rounded" style="width: 50px; height: 60px;">
            <div>
                <span class="fw-bold">Sống Đời Bình An</span><br>
                <span class="text-danger fw-bold">80,000đ</span>
                <span class="text-muted text-decoration-line-through mb-0 me-3">115,000đ</span>
            </div>
        </li>

        <!-- Sản phẩm 4 -->
        <li class="mb-4 p-3 border rounded d-flex align-items-center">
            <img src="https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp" 
                 alt="Nghệ Thuật Sống" class="me-3 rounded" style="width: 50px; height: 60px;">
            <div>
                <span class="fw-bold">Nghệ Thuật Sống</span><br>
                <span class="text-danger fw-bold">95,000đ</span>
                <span class="text-muted text-decoration-line-through mb-0 me-3">115,000đ</span>
            </div>
        </li>
    </ul>
</div>

    </div>

    <!-- Phần sản phẩm liên quan -->
    <div class="row mt-5">
        <h3 class="fw-bold text-center mb-4">Sản phẩm liên quan</h3>
        <div class="offset-md-1 col-md-10">
            <div class="row">
                <?php
                // Mô phỏng sản phẩm liên quan
                $relatedProducts = [
                    ["name" => "Quẳng Gánh Lo Đi Và Vui Sống", "price" => "92,000đ", "image" => "https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp"],
                    ["name" => "Đắc Nhân Tâm", "price" => "110,000đ", "image" => "https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp"],
                    ["name" => "Sống Đời Bình An", "price" => "80,000đ", "image" => "https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp"],
                    ["name" => "Nghệ Thuật Sống", "price" => "95,000đ", "image" => "https://salt.tikicdn.com/cache/750x750/ts/product/b3/d2/72/559ea8bdba50f9d46e59ffda4086436a.jpg.webp"]
                ];

                foreach ($relatedProducts as $product) {
                    echo '
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 text-center">
                            <img src="' . $product["image"] . '" class="card-img-top" alt="' . $product["name"] . '" style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">' . $product["name"] . '</h5>
                                <p class="text-danger">' . $product["price"] . '</p>
                                <a href="#" class="btn btn-danger">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</div>

   
