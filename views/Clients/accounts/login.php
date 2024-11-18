<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h3 class="text-center text-danger mb-4">Đăng nhập</h3>
    <form>
      <div class="mb-3">
        <label for="username" class="form-label">Nhập tên tài khoản hoặc Email</label>
        <input type="text" class="form-control" id="username" placeholder="">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" id="password" placeholder="">
      </div>
      <div class="d-flex justify-content-between">
        <a href="#" class="text-decoration-none text-body-tertiary">Quên mật khẩu?</a>
      </div>
      <button type="submit" class="btn btn-danger w-100 mt-3">Đăng nhập</button>
    </form>
    <div class="d-flex align-items-center my-3">
      <hr class="flex-grow-1">
      <span class="mx-2">hoặc</span>
      <hr class="flex-grow-1">
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-secondary w-50">Google</button>
      <button class="btn btn-outline-secondary w-50">Facebook</button>
    </div>
    <p class="text-center mt-3">
      Bạn chưa có tài khoản? <a href="?act=signup" class="text-decoration-none text-danger">Đăng ký</a>
    </p>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
