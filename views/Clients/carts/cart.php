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
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sản phẩm 1 -->
                    <tr>
                        <td>
                            <input type="checkbox" class="item-checkbox">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="view/img/product1.webp" alt="Sản phẩm" class="img-fluid" style="max-width: 60px; margin-right: 10px;">
                                <div>
                                    <strong>Salvatore Ferragamo Signorina Libera</strong><br>
                                    <small class="text-muted">Eau de Parfum 100ml</small><br>
                                    <small class="text-muted">Mã hàng: 110100204068</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-danger">2,150,000₫</td>
                        <td>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary">-</button>
                                </div>
                                <input type="text" class="form-control text-center" value="1" style="max-width: 30px;">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary">+</button>
                                </div>
                            </div>
                        </td>
                        <td>2,150,000₫</td>
                        <td class="text-center">
                            <button class="btn btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <!-- Sản phẩm 2 -->
                    <tr>
                        <td>
                            <input type="checkbox" class="item-checkbox">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="view/img/product2.webp" alt="Sản phẩm" class="img-fluid" style="max-width: 60px; margin-right: 10px;">
                                <div>
                                    <strong>Gucci Bloom Nettare di Fiori</strong><br>
                                    <small class="text-muted">Eau de Parfum 50ml</small><br>
                                    <small class="text-muted">Mã hàng: 110200304092</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-danger">1,890,000₫</td>
                        <td>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary">-</button>
                                </div>
                                <input type="text" class="form-control text-center" value="1" style="max-width: 30px;">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary">+</button>
                                </div>
                            </div>
                        </td>
                        <td>1,890,000₫</td>
                        <td class="text-center">
                            <button class="btn btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </td>
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
                    <h5 class="text-danger">4,040,000₫</h5>
                </div>
                <a href="?act=thanhtoan"><button class="btn btn-danger btn-block mt-3">Tiến hành thanh toán</button></a>
            </div>
        </div>
    </div>
</div>
