<div class="container">
    <h2>Danh sách tài khoản</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listTaiKhoan as $acount) :?>
            <tr>
                <td><img src="<?= $acount['avatar'] ?>" height="50" alt=""></td>
                <td><?= $acount['username'] ?></td>
                <td><?= $acount['password'] ?></td>
                <td><?= $acount['email'] ?></td>
                <td><?= $acount['sdt'] ?></td>
                <td><?= $acount['address'] ?></td>
                <td>
                    <select name="<?= htmlspecialchars($acount['role']) ?>" class="form-select form-select-sm" aria-label="Small select example">
                        <option value="0" <?= $acount['role'] == 0 ? 'selected' : '' ?>>Khách</option>
                        <option value="1" <?= $acount['role'] == 1 ? 'selected' : '' ?>>Admin</option>
                    </select>
                </td>
                <td>
                    <!-- Nút bật/tắt trạng thái "Ẩn"/"Hiện" dùng Bootstrap -->
                    <form action="router.php?act=update_account_status" method="POST">
                        <input type="hidden" name="id" value="<?= $acount['id'] ?>">
                        <input type="hidden" name="active" value="<?= $acount['active'] == 1 ? 0 : 1 ?>">
                        <button type="submit" class="btn <?= $acount['active'] == 1 ? 'btn-danger' : 'btn-success' ?> btn-sm">
                            <?= $acount['active'] == 1 ? 'Ẩn' : 'Hiện' ?>
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
