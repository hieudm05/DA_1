<div class="container">  
    <div class="card">  
        <div class="card-header d-flex justify-content-between align-items-center">  
            <h3 class="mb-0">Danh Sách Đơn Hàng</h3>  
        </div>  
        <div class="card-body">   
            <!-- Search Bar -->  
            <div class="mb-3 d-flex align-items-center">  
                <input type="text" id="searchInput" class="form-control me-2" placeholder="Tìm kiếm đơn hàng" aria-label="Search" style="width: 400px;">  
                <button id="searchButton" class="btn btn-primary" style="width: 120px;" type="button">Tìm kiếm</button>  
            </div>  

            <table class="table table-light" id="orderTable">  
                <thead class="thead-dark">  
                    <tr>    
                        <th>Mã Đơn</th>  
                        <th>Khách Hàng</th>   
                        <th>Tên Sản Phẩm</th>  
                        <th>Ngày Đặt Hàng</th>  
                        <th>Số Lượng</th>  
                        <th>Tổng Giá Trị</th>  
                        <th>Phương Thức Thanh Toán</th>  
                        <th>Tình Trạng</th>  
                        <th class="text-end">Cập Nhật Tình Trạng</th>  
                    </tr>  
                </thead>   
                                <tbody>  
                    <?php foreach($listOrders as $order) : ?>  
                        <?php   
                            $updateStatus = "router.php?act=updateOrder&id=" . $order['id'];  
                        ?>  
                        <tr>  
                            <td><?= htmlspecialchars($order['id']) ?></td> 
                            <td class="customer-name"><?= htmlspecialchars($order['bill_name']) ?></td> 
                            <td><?= htmlspecialchars($order['product_name']) ?></td>   
                            <td><?= htmlspecialchars(date('d/m/Y', strtotime($order['timedathang']))) ?></td>  
                            <td><?= htmlspecialchars($order['quantity']) ?></td>  
                            <td><?= htmlspecialchars(number_format($order['total'], 0, ',', '.')) ?> ₫</td>  
                            <td><?= htmlspecialchars($order['bill_pttt'] == 1 ? 'Thanh toán trực tiếp' : 'Chuyển khoản') ?></td>   
                            <td><?= htmlspecialchars(['Đơn hàng mới', 'Đang xử lý', 'Đang giao hàng', 'Đã giao'][$order['bill_status']]) ?></td> 
                            <td class="text-end">  
                                <a href="<?= $updateStatus ?>" class="btn btn-warning btn-sm">Cập Nhật</a>  
                            </td>  
                        </tr>  
                    <?php endforeach; ?>  
                </tbody>  
            </table>  
        </div>  
    </div>  
</div>  

<!-- Include Bootstrap JS and jQuery if needed -->  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
</body>  