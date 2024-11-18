<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sửa Thông Tin Tài Khoản</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="text-center text-danger fw-bold mb-4">Thông Tin Tài Khoản</h2>
                        <div class="row">
                            <!-- Avatar -->
                             <?php foreach($listAccountById as $accout) :?>
                            <div class="col-md-3 text-center">
                                <img src="https://via.placeholder.com/100" alt="Avatar" class="rounded-circle border border-danger mb-3" width="100" height="100">
                                <input type="file" class="form-control form-control-sm" id="avatar" value="<?= $accout['avatar'] ?>" aria-label="Chọn ảnh">
                            </div>

                            <!-- Form thông tin -->
                            <div class="col-md-9">
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Tên đăng nhập</label>
                                            <input type="hidden" name="id">
                                            <input type="text" class="form-control" id="username" name="username" value="Tên đăng nhập hiện tại" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Số điện thoại</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ cụ thể của bạn">
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-danger">Lưu Thay Đổi</button>
                                    </div>
                                </form>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
