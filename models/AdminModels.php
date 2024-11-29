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
            // Truy vấn kết hợp giữa bảng bills và bảng accounts
            $sql = 'SELECT bills.*, accounts.username AS user_name FROM bills 
                    JOIN accounts ON bills.idUser = accounts.id 
                    ORDER BY bills.id DESC';
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getAllBill_3() {
        try {
            $sql = 'SELECT bills.*, accounts.username AS user_name FROM bills 
                    JOIN accounts ON bills.idUser = accounts.id 
                    WHERE bills.bill_status = 0
                    ORDER BY bills.id DESC ' ;
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
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
            $sql = "SELECT SUM(bills.total) AS total FROM bills";
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