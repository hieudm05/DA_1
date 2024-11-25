<div class="container mt-3">
    <div class="row">
    <h4 class="mb-3">Giỏ hàng</h4>
        <!-- Phần thông tin giỏ hàng -->
        <div class="col-md-9">
            <table class="table  shadow-sm">
                <thead class="thead-light">
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php $tongCong = 0; $dem=0; foreach($_SESSION['cart'] as $cart) : 
                        extract($cart);
                        $imgPath = './../' . $img; 
                        $tongCong += $tongTien; 
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="item-checkbox">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="<?= $imgPath ?>" alt="Sản phẩm" class="img-fluid" style="max-width: 60px; margin-right: 10px;">
                                <div>
                                    <strong><?= $namesp ?></strong><br>
                                    <small class="text-muted">Số lượng còn lại: <?= $quantity ?></small><br>
                                    <small class="text-muted">Mã hàng: <?= $id ?></small>
                                </div>
                            </div>
                        </td>
                        <td class="text-danger"><?= number_format($price, 0, ',', '.') ?> VND</td>
                        <td>
                            <div class="input-group input-group-sm">
                                <input type="number" class="form-control text-center" value="<?= $soluong ?>" style="max-width: 50px;">
                            </div>
                        </td>
                        <td><?= number_format($tongTien, 0, ',', '.') ?> VND</td>
                        <td class="text-center">
                            <a href="?act=deleteCart&id=<?= $dem ?>"><button class="btn btn-link text-danger"><i class="bi bi-trash"></i></button></a>
                        </td>
                    </tr>
                    <?php $dem+=1; ?>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="5" class="text-right"><strong>Tổng cộng:</strong></td>
                        <td class="text-danger"><?= number_format($tongCong, 0, ',', '.') ?> VND</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Phần thông tin thanh toán -->
        <div class="col-md-3 ">
            <div class="p-3 shadow-sm  rounded">
                <h5 class="mb-3">Thông tin thanh toán</h5>
                <div class="d-flex justify-content-between">
                    <span>Tạm tính:</span>
                    <span class="text-danger">4,040,000₫</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Phí vận chuyển:</span>
                    <span class="text-success">Miễn phí</span>
                </div>
                <hr>
                <!-- Thêm ô nhập Voucher -->
                <div class="input-group">
                        <input type="text" class="form-control" id="voucher-code" placeholder="Nhập mã voucher">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="button"><i class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h5>Tổng cộng:</h5>
                    <h5 class="text-danger"><?= number_format($tongCong, 0, ',', '.') ?> VNĐ</h5>
                </div>
                <a href="?act=thanhtoan"><button class="btn btn-danger btn-block mt-3">Tiến hành thanh toán</button></a>
            </div>
        </div>
    </div>
</div>
