<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-sm-5">
        <?php foreach($listBill as $bill) : extract($bill) ?>
        <div class="card">
            <div class="card-body">
                <p><strong>Mã Đơn Hàng:</strong> <?= $id ?></p>
                <p><strong>Tên sản phẩm:</strong> <?= $bill_name ?></p>
                <p><strong>Email:</strong> <?= $bill_email ?></p>
                <p><strong>Số Điện Thoại:</strong> <?= $bill_sdt ?></p>
                <p><strong>Địa Chỉ:</strong> <?= $bill_address ?></p>
                <p><strong>Ngày Đặt Hàng:</strong> <?= $ngaydathang ?></p>
                <p><strong>Phương Thức Thanh Toán:</strong> 
                    <?= $bill_pttt == 1 ? 'Thanh toán khi nhận hàng' : 'Thanh toán trực tuyến'; ?>
                </p>
                <p><strong>Trạng thái:</strong> 
                    <?= $bill_status == 0 ? 'Đơn hàng mới' : 'Thanh toán trực tuyến'; ?>
                </p>
                <p><strong>Tổng Tiền:</strong> <?php echo number_format($total, 0, ',', '.') . " VND"; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
