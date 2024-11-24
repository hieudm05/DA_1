<div class="container mt-3">
    <div class="row">
        <h4 class="mb-3">Hoàn tất đơn hàng</h4>
        
        <!-- Phần thông tin giao hàng -->
        <div class="col-md-8">
            <div class="p-3 shadow-sm rounded">
                <h5 class="mb-3">Thông tin giao hàng</h5>
                <form>
                    <div class="mb-3">
                        <label for="full-name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="full-name" placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="phone-number" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone-number" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ giao hàng</label>
                        <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ giao hàng">
                    </div>
                    <div class="mb-3">
                        <label for="delivery-method" class="form-label">Phương thức giao hàng</label>
                        <select class="form-control" id="delivery-method">
                            <option value="standard">Giao hàng tiêu chuẩn (3-5 ngày)</option>
                            <option value="express">Giao hàng nhanh (1-2 ngày)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment-method" class="form-label">Phương thức thanh toán</label>
                        <select class="form-control" id="payment-method">
                            <option value="cod">Thanh toán khi nhận hàng</option>
                            <option value="online">Thanh toán trực tuyến</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Phần tóm tắt đơn hàng -->
        <div class="col-md-4">
            <div class="p-3 shadow-sm rounded">
                <h5 class="mb-3">Tóm tắt đơn hàng</h5>
                <div class="d-flex justify-content-between">
                    <span>Tạm tính:</span>
                    <span class="text-danger">4,040,000₫</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Phí vận chuyển:</span>
                    <span class="text-success">Miễn phí</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h5>Tổng cộng:</h5>
                    <h5 class="text-danger">4,040,000₫</h5>
                </div>
                <button class="btn btn-danger btn-block mt-3">Xác nhận đơn hàng</button>
            </div>
        </div>
    </div>
</div>
