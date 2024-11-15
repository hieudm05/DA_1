<div class="container">  
    <div class="card">  
        <div class="card-header d-flex justify-content-between align-items-center">  
            <h3 class="mb-0">Cập nhật sản phẩm</h3>  
            <a href="router.php?act=listSP" class="btn btn-primary btn-sm">Danh sách sản phẩm</a>  
        </div>  
        <div class="card-body">  
            <div class="col-sm-8">  
                <form action="router.php?act=updateSP" method="POST" enctype="multipart/form-data">  
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />  

                    <div class="form-group">  
                        <label for="danhmuc">Danh mục</label>  
                        <select name="iddm" id="danhmuc" class="form-control">  
                            <?php foreach ($listDanhMuc as $danhMuc): ?>  
                                <option value="<?= $danhMuc['id'] ?>" <?= ($danhMuc['id'] == $product['iddm']) ? 'selected' : '' ?>><?= htmlspecialchars($danhMuc['name']) ?></option>  
                            <?php endforeach; ?>  
                        </select>  
                    </div>  

                    <div class="form-group">  
                        <label for="namesp">Tên sản phẩm</label>  
                        <input id="namesp" class="form-control" type="text" name="namesp" value="<?php echo htmlspecialchars($product['namesp']); ?>" required>  
                    </div>  

                    <div class="form-group">  
                        <label for="price">Giá</label>  
                        <input id="price" class="form-control" type="number" name="price" min="0" value="<?php echo htmlspecialchars($product['price']); ?>" required>  
                    </div>  

                    <div class="form-group">  
                        <label for="current_img">Hình ảnh hiện tại</label><br>  
                        <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="Current Image" style="max-width: 200px;"/>  
                        <input type="hidden" name="current_img" value="<?php echo htmlspecialchars($product['img']); ?>" />  
                    </div>  

                    <div class="form-group">  
                        <label for="img">Cập nhật Hình Ảnh (nếu muốn thay đổi)</label>  
                        <input id="img" class="form-control" type="file" name="img" accept="image/*">  
                    </div>  

                    <div class="form-group">  
                        <label for="mota">Mô tả</label>  
                        <textarea id="mota" class="form-control" name="mota" rows="10" required><?php echo htmlspecialchars($product['mota']); ?></textarea>  
                    </div>  

                    <input type="submit" class="btn btn-primary" value="Cập nhật">  
                    <a href="router.php?act=listSP" class="btn btn-outline-secondary">Hủy</a>  
                </form>  
            </div>  
        </div>  
    </div>  
</div>  

<!-- Include Bootstrap JS and jQuery if needed -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>  
</html>