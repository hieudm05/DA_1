
                <!-- Phần hiển thị của mỗi trang đây nhé -->
                <div class="container mt-1">
                <div class="row text-center mb-4">
                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-danger" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Đơn hàng</h6>
                                <h5 class="mb-0"><?= $sumBills ?></h5>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-success" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Tổng doanh thu</h6>
                                <h5 class="mb-0"><?= number_format($sumTotalBill, 0, '.', ',') ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-primary" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Sản phẩm</h6>
                                <h5 class="mb-0"><?= number_format($sumProducts, 0, '.', ',') ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-warning" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Phản hồi</h6>
                                <h5 class="mb-0"><?= number_format($sumComments, 0, '.', ',') ?></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Section -->
                <div class="card mb-4">
                    <div class="card-header">
                        Đơn hàng cần xác nhận
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Khách hàng</th>
                                    <th class="text-center">Tên sản phẩm</th>
                                    <th class="text-center">Ngày đặt</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($listBillStatus)) :?>
                                <?php foreach($listBillStatus as $list): extract($list)?>
                                <?php  $confirmOrder = "router.php?act=confirmOrder&id=" . $id; ?>
                                <tr>
                                   
                                    <td class="text-center"> 
                                        <?= $user_name ?>
                                    </td>
                                    <td class="text-center"> 
                                        <?= $bill_name ?>
                                    </td>
                                    <td class="text-center"> 
                                        <?= $ngaydathang ?>
                                    </td>
                                    <td class="text-center"> 
                                        <?= $quantity ?>
                                    </td>
                                    <form action="<?= $confirmOrder ?>" method="POST">
                                        <!-- <div class="mb-3">
                                            <select class="form-control-sm" name="bill_status" id="statusSelect" required>
                                                <option value="0" <?= $bill_status == 0 ? 'selected' : '' ?>>Chờ xác nhận</option>
                                                <option value="1" <?= $bill_status == 1 ? 'selected' : '' ?>>Xác nhận</option>
                                            </select>
                                        </div> -->
                                        <td class="text-center"> 
                                            <span class="badge text-bg-primary"> <?= $bill_status == 0 ? 'Chờ xác nhận' : ''  ?></span>
                                        </td>

                                        <td class="text-center">
                                        <button type="submit" class="btn btn-primary "><i class="bi bi-check-lg"></i></button>
                                        </form>
                                        <button type="submit" class="btn btn-danger "><i class="bi bi-eye-fill"></i></button>
                                        </td>
                                    
                                </tr>
                                <?php endforeach;?>
                                <?php else :?>
                                    <tr>
                                    <td colspan="6" class="text-center">Bạn không có đơn hàng nào cần xác
                                        nhận
                                    </td>
                                </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <a href="?act=listDonHang" class="text-decoration-none">Xem tất cả đơn hàng →</a>
                    </div>
                </div>

                <!-- Revenue and New Customers Section -->
                <div class="row">
                    <!-- Revenue Chart -->
                    <div class="col-md-7 mb-4">
                        <div class="card">
                            <?php include 'bieudotuan.php' ?>
                        </div>
                    </div>

                    <!-- New Customers -->
                    <div class="col-md-5 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Khách hàng mới</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <strong>Nguyễn Thị Ngọc Hà</strong><br>
                                        <small>Truy cập 25 phút trước</small>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Xem chi tiết</button>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Nguyễn Thị Ngọc Hà</strong><br>
                                        <small>Truy cập 25 phút trước</small>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Xem chi tiết</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
