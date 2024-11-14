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

            <table class="table table-light">  
                <thead class="thead-dark">  
                    <tr>  
                        <th>Mã sản phẩm</th>  
                        <th>Tên sản phẩm</th>  
                        <th>Hình ảnh</th>  
                        <th>Giá</th>  
                        <th>Mô tả</th>  
                        <th>Lượt xem</th>  
                        <th>Flashsale (%)</th>  
                        <th class="text-end">Thao tác</th>  
                    </tr>  
                </thead>  
                <tbody id="productTableBody">  
                    <?php if (!isset($listProducts) || !is_array($listProducts) || count($listProducts) === 0): ?>  
                        <tr><td colspan="8">Không có sản phẩm nào để hiển thị.</td></tr>  
                    <?php else: ?>  
                        <?php foreach ($listProducts as $key => $products): ?>  
                            <?php  
                            $editProducts = "router.php?act=formEditProduct&id=" . $products['id'];  
                            $deleteProducts = "router.php?act=deleteProduct&id=" . $products['id'];  
                            $price = number_format($products['price'], 0, ',', '.');   
                            $flashSalePercentage = isset($products['flashsale']) ? $products['flashsale'] : 0; // Check if flashsale exists  
                            $flashSalePrice = $flashSalePercentage ? $products['price'] * (1 - $flashSalePercentage / 100) : $products['price'];  
                            $flashSalePriceFormatted = number_format($flashSalePrice, 0, ',', '.');  
                            ?>  
                            <tr id="product-<?= $products['id'] ?>" data-name="<?= strtolower($products['namesp']) ?>">  
                                <td><?= $products['id'] ?></td>  
                                <td><?= $products['namesp'] ?></td>  
                                <td><img src="<?= $products['img'] ?>" alt="<?= $products['namesp'] ?>" width="100"></td>  
                                <td class="price-column">  
                                    <div id="price-<?= $products['id'] ?>">  
                                        <span class="text-decoration-line-through"><?= $price ?> VNĐ</span><br>  
                                        <span class="current-price" style="color: red; font-weight: bold;"><?= $flashSalePriceFormatted ?> VNĐ</span>  
                                    </div>  
                                </td>  
                                <td><?= $products['mota'] ?></td>  
                                <td><?= $products['luotxem'] ?></td>  
                                <td>  
                                    <input type="number" name="flashsale" min="0" max="100" placeholder="Giảm giá (%)" class="form-control me-2 flashsale-input" style="width: 100px;" required data-product-id="<?= $products['id'] ?>">  
                                    <button class="btn btn-info btn-sm apply-flashsale" data-product-id="<?= $products['id'] ?>">Áp Dụng</button>  
                                </td>  
                                <td class="text-end">  
                                    <a href="<?= $editProducts ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>  
                                    <a href="<?= $deleteProducts ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa sản phẩm?')">  
                                        <i class="bi bi-trash-fill"></i>  
                                    </a>  
                                </td>  
                            </tr>  
                        <?php endforeach; ?>  
                    <?php endif; ?>  
                </tbody>  
            </table>  
        </div>  
    </div>  
</div>  

<script>  
    document.getElementById('searchButton').addEventListener('click', function() {  
        const searchInput = document.getElementById('searchInput').value.toLowerCase();  
        const rows = document.querySelectorAll('#productTableBody tr');  

        rows.forEach(row => {  
            const productName = row.getAttribute('data-name');  

            if (productName.includes(searchInput)) {  
                row.style.display = ''; // Hiển thị hàng  
            } else {  
                row.style.display = 'none'; // Ẩn hàng  
            }  
        });  
    });  

    document.querySelectorAll('.apply-flashsale').forEach(button => {  
        button.addEventListener('click', function() {  
            const productId = this.getAttribute('data-product-id');  
            const flashsaleInput = document.querySelector(`input[name="flashsale"][data-product-id="${productId}"]`);  
            const flashsaleValue = parseInt(flashsaleInput.value);  

            // Validate flashsale input  
            if (isNaN(flashsaleValue) || flashsaleValue < 0 || flashsaleValue > 100) {  
                alert('Vui lòng nhập giá trị giảm giá hợp lệ (0 - 100).');  
                return;  
            }  

            // Get the original price from the PHP variable (using productId to access it)  
            const originalPrice = parseFloat(<?= json_encode(array_column($listProducts, 'price')) ?>[productId - 1]);  
            const newPrice = originalPrice * (1 - flashsaleValue / 100);  
            const newPriceFormatted = newPrice.toLocaleString('de-DE', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' VNĐ';  

            // Update the price on the page  
            const priceColumn = document.querySelector(`#price-${productId}`);  
            priceColumn.innerHTML = `  
                <span class="text-decoration-line-through">${originalPrice.toLocaleString('de-DE', { minimumFractionDigits: 0, maximumFractionDigits: 0 })} VNĐ</span><br>  
                <span class="current-price" style="color: red; font-weight: bold;">${newPriceFormatted}</span>  
            `;  
        });  
    });  
</script>