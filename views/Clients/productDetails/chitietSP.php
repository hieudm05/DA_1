
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $sanPhamChiTiet["namesp"] ?></li>
        </ol>
    </nav>

    <div class="container mt-5">
        <div class="row">

            <!-- Cột nội dung chính (bên trái) -->
            <div class="col-md-8">
                <div class="row">
                    <!-- Cột hình ảnh -->
                    <div class="col-md-4">
                        <?php $imgPath = './../' . $sanPhamChiTiet["img"] ?>
                        <img src="<?= $imgPath ?>" alt="Quẳng Gánh Lo Đi Và Vui Sống" class="img-fluid" style="width: 100%; height: auto; max-width: 350px; max-height: 400px;">
                    </div>

                    <!-- Cột nội dung -->
                    <div class="col-md-8">
                        <!-- Tiêu đề và thông tin -->
                        <h1 class="product-title"><?= $sanPhamChiTiet["namesp"] ?></h1>
                        <p class="d-flex align-items-center">
                            <span class="rating me-2">5.0 ★★★★★</span>
                            <a href="#" class="text-decoration-none">200 đánh giá</a>
                        </p>
                        <p><span class="badge bg-danger">#31 trong Top xu hướng</span></p>

                        <!-- Thông tin bổ sung -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <p><strong>Mô tả: </strong><?= $sanPhamChiTiet["mota"] ?></p>
                            </div>
                        </div>

                        <!-- Giá và số lượng -->
                        <div class="d-flex align-items-center mb-4">
                            <p class="text-danger fw-bold fs-3 mb-0 me-3"><?= $sanPhamChiTiet["price"] ?>đ</p>
                            <p class="text-muted text-decoration-line-through mb-0 me-3">115,000đ</p>
                            <div class="input-group" style="width: 120px;">
                                <input type="number" class="form-control text-center" value="1" min="1" id="quantity-input">
                            </div>
                        </div>

                        <!-- Nút hành động -->
                        <div class="d-flex mb-4">
                        <form action="?act=addcart" method="post">
                                <input type="hidden" name="id" value="<?= $sanPhamChiTiet['id'] ?>" >
                                <input type="hidden" name="namesp" value="<?= $sanPhamChiTiet['namesp'] ?>" >
                                <input type="hidden" name="img" value="<?= $sanPhamChiTiet['img'] ?>">
                                 <input type="hidden" name="price" value="<?= $sanPhamChiTiet['price'] ?>"> 
                                 <input type="hidden" name="quantity" value="<?= $sanPhamChiTiet['quantity'] ?>"> 
                                 <input type="hidden" name="mota" value="<?= $sanPhamChiTiet['mota'] ?>"> 
                                <button name="addcart" class="btn btn-danger rounded-pill me-2">Thêm vào giỏ hàng</i></button>
                                <!-- Nút giỏ hàng và yêu thích -->
                               </form>
                        <form action="?act=postMuaNgay&id=<?= $id ?>" method="post">
                                <input type="hidden" name="id" value="<?= $sanPhamChiTiet['id'] ?>" >
                                 <input type="hidden" name="price" value="<?= $sanPhamChiTiet['price'] ?>"> 
                                 <input type="hidden" name="soluong" value="1"> 
                            <button class="btn btn-danger rounded-pill me-2">Mua ngay</button>
                        </form>
                        <!-- Nút trái tim thêm vào yêu thích -->
                        <a href="?act=addFavourite&id=<?= $sanPhamChiTiet['id'] ?>" class="btn btn-danger rounded-pill">
                            <i class="bi bi-heart-fill"></i>
                        </a>

                    </div>

                        <div class="mt-4">
                            <p>Đánh giá: <span class="text-warning">★★★★★</span> (200 đánh giá)</p>
                            <div class="comment-section mt-4">
                                <h4 class="fw-bold mb-3">Bình luận</h4>
                                <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                                <?php foreach ($comments as $comment): ?>
                                    <?php if ($comment['status'] == 1): ?>  <!-- Check if the comment is visible -->
                                        <div class="list-group-item list-group-item-action border rounded-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <strong class="text-primary"><?= htmlspecialchars($comment['username']) ?></strong>
                                                <small class="text-muted"><?= htmlspecialchars($comment['time']) ?></small>
                                            </div>
                                            <p class="mt-2"><?= htmlspecialchars($comment['noidung']) ?></p>

                                            <?php if (isset($_SESSION['user'])): ?>
                                                <div class="d-flex justify-content-end">
                                                    <?php if ($_SESSION['user']['id'] == $comment['idUser'] || $_SESSION['user']['role'] == 'admin'): ?>
                                                        <a href="?act=deleteComment&id=<?= $comment['id'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                <?php endif; ?>
                                <?php endforeach; ?>

                            </div>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <form action="?act=formComment&id=<?= $sanPhamChiTiet['id'] ?>" method="POST" class="mt-4">
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Nhập bình luận của bạn</label>
                                            <textarea name="comment" class="form-control" id="comment" rows="4" placeholder="Bình luận của bạn..." required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Gửi bình luận</button>
                                    </form>
                                <?php else: ?>
                                    <p class="mt-3">Bạn cần <a href="?act=login" class="text-decoration-none">đăng nhập</a> để bình luận.</p>
                                <?php endif; ?>
                                <!-- Điều chỉnh chiều cao của phần bình luận -->
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột bên phải: Chỉ có ở Barnes & Noble và Sản phẩm nổi bật -->
            <div class="col-md-4">
                <!-- Nội dung của Barnes & Noble -->
                <div class="info-box p-3 border rounded mb-4">
                    <h5 class="fw-bold mb-3">Chỉ có ở BARNES & NOBLE</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle text-success"></i> Sản phẩm 100% chính hãng</li>
                        <li><i class="bi bi-person-circle text-success"></i> Tư vấn mua sách trong giờ hành chính</li>
                        <li><i class="bi bi-truck text-success"></i> Miễn phí vận chuyển cho đơn từ 250.000đ</li>
                        <li><i class="bi bi-telephone text-success"></i> 19004953</li>
                    </ul>
                </div>

                <!-- Phần sản phẩm nổi bật -->
                <h4 class="fw-bold mb-3">Sản phẩm nổi bật</h4>
                <?php foreach($sanPhamNoiBat as $product) : ?>
                    <?php $imgPath = './../' . $product["img"] ?>
                    <?php $linkSp = "?act=sanphamchitiet&id=" . $product["id"];?>
                    <div class="col-sm-12 mt-2">
                        <div class="d-flex border p-2 position-relative">
                            <div class="badge bg-danger text-light position-absolute" style="top: -10px; left: 10px; z-index: 1;">20%</div>
                            <img src="<?= $imgPath ?>" alt="Sách Nổi Bật" style="height: 100px; object-fit: cover; width: 120px;">
                            <div class="ms-3" style="flex-grow: 1; font-size: 0.85rem;">
                                <a href="<?= $linkSp ?>"><h5 style="font-size: 1rem;"><?= $product['namesp'] ?></h5></a>
                                <p><span class="text-danger"><?= $product['price'] ?>đ</span> <del>109,000đ</del></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Phần sản phẩm liên quan -->
        <div class="row mt-5">
            <h3 class="fw-bold text-center mb-4">Sản phẩm liên quan</h3>
            <div class="offset-md-1 col-md-10">
                <div class="row">
                    <?php foreach ($sanPhamChung as $product):
                    $linkSp = "?act=sanphamchitiet&id=" . $product["id"];
                    $imgPath = '../'.$product['img'];
                    ?>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-2">
                            <div class="card" style="width: 100%; position: relative;">
                                <img src="<?= $imgPath ?>" class="imgHieuUng" alt="<?= $product['namesp'] ?>" style="height: 180px; object-fit: cover;">
                                <div class="card-body" style="font-size: 0.85rem;">
                                    <a href="<?=$linkSp?>" class="text-dark text-decoration-none"><h5 class="card-title" style="font-size: 1rem;"><?= $product['namesp'] ?></h5></a>
                                    <h6><span class="card-text text-danger"><?= $product['price'] ?>đ</span></h6>
                                </div>
                                <div class="product-actions">
                                    <button class="btn-cart"><i class="bi bi-cart-plus"></i></button>
                                    <button class="btn-wishlist"><i class="bi bi-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>
