<div class="container mt-3">
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-evenly col-md-6 mt-2">
                <span class="text-danger fw-bold"><i class="bi bi-bag-fill"></i> Giỏ hàng</span>
                <i class="bi bi-arrow-right"></i>
                <span><i class="bi bi-bag-check-fill"></i> Đặt hàng</span>
                <i class="bi bi-arrow-right"></i>
                <span><i class="bi bi-clipboard-check-fill"></i> Hoàn thành</span>
            </div>
        </div>

    <div class="row mt-4">
        <div class="col-md-8">
        <table class="table table-bordered table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $tongCong = 0; 
    $dem=0; 
    foreach($listCarts as $cart): 
        extract($cart);
        $imgPath = './../' . $img; 
        $tongCong += $thanhtien; 
    ?>
        <tr>
            <td>
                <?= $dem +1 ?>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <img src="<?= $imgPath ?>" alt="Sản phẩm" class="img-fluid" style="max-width: 60px; margin-right: 10px;">
                    <div>
                        <strong><?= $name ?></strong><br>
                        <small class="text-muted">Số lượng còn lại: <?= $remaining_quantity ?></small><br>
                        <small class="text-muted">Mã hàng: <?= $id ?></small>
                    </div>
                </div>
            </td>
            <td class="text-danger">
                <?= number_format($price, 0, ',', '.') ?> VND
            </td>
            <td>
                <div class="input-group input-group-sm">
                    <input type="number" class="form-control text-center" value="<?= $soluong ?>" style="max-width: 50px;">
                </div>
            </td>
            <td><?= number_format($thanhtien, 0, ',', '.') ?> VND</td>
            <td class="text-center">
                <form action="?act=deletecart" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>"> 
                    <button type="submit" name="deletecart" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button> 
                </form>
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

            <a href="http://localhost/base_test_DA1/public/"><button class="btn btn-warning">Tiếp tục mua hàng</button></a>
        </div>

        <!-- Phần thông tin thanh toán -->
        <div class="col-md-4 ">
            <div class="p-3 shadow-sm  rounded">
                <h5 class="mb-3">Đơn hàng</h5>
                <div class="d-flex justify-content-between">
                    <span class="text-danger">Tạm tính:</span>
                    <span class=""><?= number_format($tongCong, 0, ',', '.') ?> VND</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Phí vận chuyển:</span>
                    <span class="text-success">Miễn phí</span>
                </div>
                <hr>
              
                <div class="d-flex justify-content-between">
                    <h5>Tổng cộng:</h5>
                    <h5 class="text-danger"><?= number_format($tongCong, 0, ',', '.') ?> VNĐ</h5>
                </div>
               
                <a href="?act=thanhtoan"><button class="btn btn-danger btn-block mt-3">Thanh toán</button></a>
            </div>
        </div>
    </div>
</div>
