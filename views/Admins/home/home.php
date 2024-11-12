
                <!-- Phần hiển thị của mỗi trang đây nhé -->
                <div class="container mt-1">
                <div class="row text-center mb-4">
                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-danger" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Đơn hàng</h6>
                                <h3 class="mb-0">9</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-success" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Tổng doanh thu</h6>
                                <h3 class="mb-0">9</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-primary" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Sản phẩm</h6>
                                <h3 class="mb-0">9</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="border p-3 bg-light d-flex justify-content-between">
                            <span class="border p-3 bg-warning" style="flex: 0 0 20%;"></span>
                            <div style="flex: 0 0 80%;">
                                <h6 class="mb-1">Phản hồi</h6>
                                <h3 class="mb-0">9</h3>
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
                                    <th>Khách hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ngày đặt</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Cập nhật trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">Bạn không có đơn hàng nào cần xác
                                        nhận</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="text-decoration-none">Xem tất cả đơn hàng →</a>
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
