<div class="container">  
    <div class="card">  
        <div class="card-header d-flex justify-content-between align-items-center">  
            <h3 class="mb-0">Danh sách sản phẩm</h3>  
            <a href="router.php?act=addSP" class="btn btn-primary btn-sm">Thêm Sản Phẩm Mới</a>  
        </div>  
        <div class="card-body">   
            <!-- Bắt đầu thêm thanh tìm kiếm -->  
            <div class="mb-3 d-flex align-items-center">  
                <input type="text" id="searchInput" class="form-control me-2" placeholder="Tìm kiếm sản phẩm" aria-label="Search" style="width: 400px;">  
                <button id="searchButton" class="btn btn-primary" style="width: 120px;" type="button">Tìm kiếm</button>  
            </div>  
            <!-- Kết thúc thêm thanh tìm kiếm -->  

            <table class="table table-light" id="productTable">  
                <thead class="thead-dark">  
                    <tr>    
                        <th>Hình ảnh</th>  
                        <th>Tên sản phẩm</th>   
                        <th>Giá</th>  
                        <th>Mô tả</th>  
                        <th>Lượt xem</th>  
                        <th class="text-end">Thao tác</th>  
                    </tr>  
                </thead>   
                <tbody>  
                    <?php foreach($listProducts as $sp) : ?>  
                        <?php   
                            $suasp = "router.php?act=suasp&id=" . $sp['id'];  
                            $xoasp = "router.php?act=xoasp&id=" . $sp['id'];  
                            $imgPath = '../../../uploads/'.$sp['img'];  
                            $hinh = (is_file($imgPath) && !empty($sp['img'])) ? '<img src="'.$imgPath.'" style="  background-size:cover;  ">' : 'No photo';  
                        ?>  
                        <tr>  
                            <td><?= $hinh ?></td>  
                            <td class="product-name"><?= htmlspecialchars($sp['namesp']) ?></td>  
                            <td><?= htmlspecialchars($sp['price']) ?></td>  
                            <td><?= htmlspecialchars($sp['mota']) ?></td>  
                            <td><?= htmlspecialchars($sp['luotxem']) ?></td>  
                            <td>  
                                <a href="<?= $suasp ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>  
                                <a href="<?= $xoasp ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa sản phẩm')"><i class="bi bi-trash-fill"></i></a>  
                            </td>  
                        </tr>  
                    <?php endforeach; ?>  
                </tbody>   
            </table>  
        </div>  
    </div>  
</div>  
