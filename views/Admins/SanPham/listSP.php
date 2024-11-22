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
                        <th>Danh mục</th> <!-- Thêm cột danh mục -->
                        <th>Hình ảnh</th>  
                        <th>Tên sản phẩm</th>   
                        <th>Số lượng</th> <!-- Thêm cột số lượng -->  
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
                            

                            $imgPath = '../../'.$sp['img'];
                            $hinh = "";
                            if (!empty($imgPath) && file_exists($imgPath)) {
                                $hinh = '<img src="' . $imgPath . '" style="width:100px; height:100px; object-fit:cover;">';
                            } else {
                                $hinh = 'No photo';
                            }
                        ?>  
                        <tr>  
                            <td><?=$sp['category_name']  ?></td>
                            <td><?= $hinh ?></td>  
                            <td class="product-name"><?= $sp['namesp'] ?></td>  
                            <td><?= $sp['quantity'] ?></td>  
                            <td><?= $sp['price'] ?></td>  
                            <td><?= $sp['mota']?></td>  
                            <td><?= $sp['luotxem'] ?></td>  
                            <td class="text-end">  
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
