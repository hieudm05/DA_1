<?php 

class AdminModels 
{
    public $conn;

    public function __construct() { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }

    // Danh mục
    public function getAllDanhMuc() {
        try {
            $sql = 'SELECT * FROM categories ORDER BY id DESC';
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    public function postDm($name) {
        try {
            $sql = 'INSERT INTO categories(name) VALUES(:name)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['name'=>$name]);
            return true;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getDmById( $id){
        try {
            $sql = 'SELECT * FROM categories WHERE id = '.$id;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();

        }catch(Exception $e){
            echo 'err'.$e->getMessage();
        }
    }

    public function deleteDm($id){
        try {
            $sql = 'DELETE FROM categories WHERE id = :id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;

        }catch(Exception $e){
            echo 'err'.$e->getMessage();
        }
    }
    public function updateDm($id, $name) {
        try {
            $sql = "UPDATE categories SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['name'=>$name, 'id'=>$id]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Tài khoản
    public function getAllAcounts(){
        try {
            $sql = 'SELECT * FROM accounts ORDER BY id DESC';
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function getAccountById($id){
        try {
            $sql = 'SELECT * FROM accounts WHERE id ='.$id;
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetch();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public function updateAccoutAtive($id,$active){
        try {
            $sql = "UPDATE accounts SET active = :active WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['active'=>$active, 'id'=>$id]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public function updateAccoutRole($id,$role){
        try {
            $sql = "UPDATE accounts SET role = :role WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['role' => $role, 'id'=>$id]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    // Sản phẩm
    public function getAllSP() {
        try {
            $sql = 'SELECT * FROM products ORDER BY id DESC';
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    public function postSP($namesp, $price, $img, $mota, $iddm, $quantity) {
        try {
            // Thực hiện câu lệnh INSERT để thêm sản phẩm mới
            $sql = "INSERT INTO products (namesp, price, img, mota, iddm, quantity) 
                    VALUES (:namesp, :price, :img, :mota, :iddm, :quantity)";
            
            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);
            
            // Các giá trị cần truyền vào câu lệnh
            $stmt->execute([
                'namesp' => $namesp,
                'price' => $price,
                'img' => $img,
                'mota' => $mota,
                'iddm' => $iddm,
                'quantity' => $quantity,
            ]);
            
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    
    
    
   
    public function getSPById($id) {  
        try {  
            $sql = 'SELECT * FROM products WHERE id = :id';  
            $stmt = $this->conn->prepare($sql);  
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Bind the ID as an integer to prevent SQL injection  
            $stmt->execute();  
            
            $product = $stmt->fetch();
            
            // Check if a product was found
            if ($product) {
                return $product;
            } else {
                echo "Product not found.";
                return false;
            }
        } catch(Exception $e) {  
            echo 'Error: ' . $e->getMessage();  
            return false;  
        }  
    }
    
    public function getAllProductsByCategory($categoryId = null, $searchTerm = null) {  
        $sql = "SELECT   
                    products.id,   
                    products.namesp,   
                    products.price,   
                    products.img,  
                    products.mota,  
                    products.luotxem,  
                    products.quantity,  
                    categories.name AS category_name  
                FROM categories  
                LEFT JOIN products ON categories.id = products.iddm";  
        
        $conditions = [];  
        
        if ($categoryId) {  
            $conditions[] = "products.iddm = :categoryId";  
        }  
        if ($searchTerm) {  
            $conditions[] = "products.namesp LIKE :searchTerm";  
        }  
    
        if (count($conditions) > 0) {  
            $sql .= " WHERE " . implode(' AND ', $conditions);  
        }  
    
        $sql .= " ORDER BY categories.name, products.price ASC";  
    
        $stmt = $this->conn->prepare($sql);  
    
        if ($categoryId) {  
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);  
        }  
        if ($searchTerm) {  
            $searchTerm = '%' . $searchTerm . '%'; 
            $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);  
        }  
    
        $stmt->execute();  
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    public function deleteSP($id) {  
        try {  
            $sql = 'DELETE FROM products WHERE id = :id';  
            $stmt = $this->conn->prepare($sql);  
            $stmt->execute(['id' => $id]);  
            return true;  
        } catch(Exception $e) {  
            echo 'Error: ' . $e->getMessage();  
            return false;  
        }  
    }  

    public function updateSP($id, $namesp, $price, $img, $mota, $iddm, $quantity) {  
        try {  
            $sql = "UPDATE products SET namesp = :namesp, price = :price, img = :img, mota = :mota, iddm = :iddm, quantity = :quantity WHERE id = :id";  
            $stmt = $this->conn->prepare($sql);  
            $stmt->execute([  
                'namesp' => $namesp,  
                'price' => $price,  
                'img' => $img,  
                'mota' => $mota,  
                'iddm' => $iddm,
                'quantity' => $quantity,
                'id' => $id  
            ]);  
            return true;  
        } catch (Exception $e) {  
            echo 'Error: ' . $e->getMessage();  
            return false;  
        }  
    }  

     //đơn hàng
     public function getAllBill() {
        try {
            $sql = 'SELECT 
                        bills.id AS bill_id,
                        bills.*, 
                        accounts.username AS user_name, 
                        GROUP_CONCAT(p.namesp ORDER BY p.namesp ASC) AS product_names,
                        GROUP_CONCAT(bi.quantity ORDER BY p.namesp ASC) AS product_quantities, 
                        GROUP_CONCAT(bi.price ORDER BY p.namesp ASC) AS product_prices, 
                        GROUP_CONCAT(p.img ORDER BY p.namesp ASC) AS product_images 
                    FROM 
                        bills
                    JOIN 
                        accounts ON bills.idUser = accounts.id
                    LEFT JOIN 
                        bill_items bi ON bills.id = bi.bill_id
                    LEFT JOIN 
                        products p ON bi.product_id = p.id
                    GROUP BY 
                        bills.id
                    ORDER BY 
                        bills.id DESC;
                    ';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    public function getAllBill_3() {
        try {
            $sql = 'SELECT 
                        bills.*, 
                        accounts.username AS user_name, 
                        GROUP_CONCAT(p.namesp ORDER BY p.namesp ASC) AS product_names, 
                        GROUP_CONCAT(bi.quantity ORDER BY p.namesp ASC) AS product_quantities, 
                        GROUP_CONCAT(bi.price ORDER BY p.namesp ASC) AS product_prices, 
                        GROUP_CONCAT(p.img ORDER BY p.namesp ASC) AS product_images
                    FROM bills 
                    JOIN accounts ON bills.idUser = accounts.id 
                    LEFT JOIN bill_items bi ON bills.id = bi.bill_id 
                    LEFT JOIN products p ON bi.product_id = p.id 
                    WHERE bills.bill_status IN (0,4)
                    GROUP BY bills.id 
                    ORDER BY bills.id DESC';
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public function getBillById($billId) {
        $sql = 'SELECT 
        bills.id AS bill_id,
        bills.*, 
        accounts.username AS user_name,
        GROUP_CONCAT(p.img ORDER BY p.img ASC) AS img,
        GROUP_CONCAT(p.namesp ORDER BY p.namesp ASC) AS product_names,
        GROUP_CONCAT(bi.quantity ORDER BY p.namesp ASC) AS product_quantities,
        GROUP_CONCAT(bi.total ORDER BY p.namesp ASC) AS pro_total,
        GROUP_CONCAT(bi.price ORDER BY p.namesp ASC) AS product_prices,
        GROUP_CONCAT(p.img ORDER BY p.namesp ASC) AS product_images
    FROM 
        bills
    JOIN 
        accounts ON bills.idUser = accounts.id
    LEFT JOIN 
        bill_items bi ON bills.id = bi.bill_id
    LEFT JOIN 
        products p ON bi.product_id = p.id
    WHERE 
        bills.id = :billId
    GROUP BY 
        bills.id
    ORDER BY 
       CASE 
            WHEN bills.bill_status = 4 THEN 0 -- Trạng thái 4 giữ nguyên vị trí
            ELSE 1 -- Các trạng thái khác sắp xếp bình thường
            END,
            bills.bill_status ASC, -- Sắp xếp trạng thái tăng dần
            bills.id DESC';        

                    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':billId', $billId, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // Lấy lí do huỷ hàng
    public function getLyDoHuyHang($idBill) {
        try {
            // Kiểm tra kết nối
            if (!$this->conn) {
                throw new Exception('Kết nối cơ sở dữ liệu không hợp lệ.');
            }
    
            // Truy vấn SQL
            $sql = 'SELECT reasons FROM cancellation_reasons WHERE idBill = :idBill';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['idBill' => $idBill]);
    
            // Lấy kết quả
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$result) {
                // Không tìm thấy lý do
                return 'Không tìm thấy lý do hủy đơn hàng ';
            }
    
            return $result['reasons']; // Trả về cột lý do hủy
        } catch (Exception $e) {
            // Ghi log lỗi và trả về thông báo thân thiện hơn
            error_log('Lỗi khi lấy lý do hủy đơn hàng: ' . $e->getMessage());
            return 'Có lỗi xảy ra khi lấy lý do hủy đơn hàng.';
        }
    }
    

    public function getTotalOrders(){
        try {
            $sql = "SELECT COUNT(*) AS total_orders FROM bills";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
              // Lấy kết quả trả về
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total_orders'];
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    // Tổng doanh thu
    public function sumTotalOrders(){
        try {
            $sql = "SELECT SUM(bills.total) AS total FROM bills WHERE bills.bill_status = 3 ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
              // Lấy kết quả trả về
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'] ? $row['total'] : 0 ;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    // Tổng số sản phẩm
    public function sumProducts(){
        try {
            $sql = "SELECT COUNT(*) AS total FROM products";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
              // Lấy kết quả trả về
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'] ? $row['total'] : 0 ;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    // Tổng bình luận
    public function sumComments(){
        try {
            $sql = "SELECT COUNT(*) AS total FROM comments";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
              // Lấy kết quả trả về
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'] ? $row['total'] : 0 ;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getDailyRevenue() {
        $sql = "SELECT 
                DAYOFWEEK(STR_TO_DATE(ngaydathang, '%Y-%m-%d')) AS day_of_week, 
                SUM(total) AS total_revenue 
                FROM bills 
                WHERE bill_status = 3 
                GROUP BY day_of_week 
                ORDER BY day_of_week";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $listRevenue = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Lấy ngày hôm nay (0 đến 6, từ Chủ Nhật đến Thứ Bảy)
        $currentDay = date('w'); // day of the week (0 for Sunday, 6 for Saturday)
        
        // Khởi tạo mảng doanh thu cho các ngày trong tuần (0 đến 6)
        $revenues = array_fill(0, 7, 0); // Mảng chứa doanh thu cho 7 ngày trong tuần
        
        // Gán doanh thu cho đúng ngày trong tuần
        foreach ($listRevenue as $data) {
            if ($data['day_of_week'] !== NULL) {
                $revenues[$data['day_of_week'] - 1] = $data['total_revenue']; // Gán doanh thu vào mảng
            }
        }
        
        // Thêm giá trị cho ngày hôm nay vào mảng nếu chưa có
        if ($revenues[$currentDay] == 0) {
            // Nếu hôm nay chưa có doanh thu, gán giá trị 0 hoặc tính toán doanh thu cho ngày hôm nay
            // Ví dụ: gán $revenues[$currentDay] = 0; hoặc gán doanh thu tính toán
        }
    
        return $revenues; // Trả về mảng doanh thu
    }
    
    


    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($orderId, $status) {
        // SQL query để cập nhật trạng thái đơn hàng
        $sql = "UPDATE bills SET bill_status = :status WHERE id = :orderId";
        
        // Chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($sql);
        
        // Gắn giá trị vào các tham số
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }


    // Lấy trạng thái đơn hàng
    public function getBillStatus($orderId) {
        $sql = "SELECT bill_status FROM bills WHERE id = :orderId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() ?: 0;
    }
    
    
    
    

    //binh luan
    public function getAllComments() {
        try {
            $sql = 'SELECT comments.*, products.namesp AS product_name 
                    FROM comments 
                    LEFT JOIN products ON comments.idpro = products.id 
                    ORDER BY comments.time DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    


    public function getCommentsByProduct($idpro) {
        try {
            $sql = 'SELECT * FROM comments WHERE idpro = :idpro ORDER BY time DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['idpro' => $idpro]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    

    public function deleteComment($id) {
        try {
            $sql = 'DELETE FROM comments WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public function getCommentById($id) {
        try {
            $sql = 'SELECT * FROM comments WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    public function updateCommentStatus($id, $status) {
        try {
            $sql = 'UPDATE comments SET status = :status WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['status' => $status, 'id' => $id]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    

    public function __destruct() {  // Hàm hủy kết nối đối tượng
        $this->conn = null;
    }
}