<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="col-sm-8">
        <h2 class="text-center mb-4">Quản lý đơn hàng</h2>
        <?php foreach ($listBill as $bill) : extract($bill); ?>
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p><strong>Mã đơn hàng:</strong> <?= $id ?></p>
                        <p><strong>Trạng thái:</strong> 
                        <?php
                            if ($bill_status == 0) {
                                echo '🟡 Đơn hàng mới';
                            } elseif ($bill_status == 1) {
                                echo '🔵 Đang xử lý';
                            } elseif ($bill_status == 2) {
                                echo '🟢 Đã giao hàng';
                            } elseif ($bill_status == 3) {
                                echo '✅ Đã giao';
                            } else {
                                echo '❌ Không xác định';
                            }
                        ?>
                        </p>
                    </div>
                    <!-- Nút mở Modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal<?= $id ?>">
                        Xem chi tiết
                    </button>
                </div>
            </div>

            <!-- Modal cho từng đơn hàng -->
            <div class="modal fade" id="orderModal<?= $id ?>" tabindex="-1" aria-labelledby="orderModalLabel<?= $id ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderModalLabel<?= $id ?>">Chi tiết đơn hàng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                            <?php
                                if ($bill_status == 0) {
                                    echo 'Đơn hàng mới';
                                } elseif ($bill_status == 1) {
                                    echo 'Đang xử lý';
                                } elseif ($bill_status == 2) {
                                    echo 'Đã giao hàng';
                                } elseif ($bill_status == 3) {
                                    echo 'Đã giao';
                                } else {
                                    echo 'Không xác định';
                                }
                            ?>
                            </p>
                            <p><strong>Tổng Tiền:</strong> <?= number_format($total, 0, ',', '.') . " VND"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
