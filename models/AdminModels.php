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
    public function postSP($namesp, $price, $img, $mota, $iddm, $id_soluong) {  
        try {  
            if (empty($id_soluong) || !is_numeric($id_soluong)) {  
                echo "Error: id_soluong must be a valid number.";  
                return false;  
            }  
    
            $sql = 'INSERT INTO products (namesp, price, img, mota, iddm, id_soluong) VALUES (:namesp, :price, :img, :mota, :iddm, :id_soluong)';  
            $stmt = $this->conn->prepare($sql);  
            $stmt->execute([  
                'namesp' => $namesp,  
                'price' => $price,  
                'img' => $img,  
                'mota' => $mota,  
                'iddm' => $iddm,  
                'id_soluong' => $id_soluong  
            ]);  
    
            $productId = $this->conn->lastInsertId();  
    
            $sqlQuantity = 'INSERT INTO quantitys_pro (product_id, quantity) VALUES (:product_id, :quantity)';  
            $stmtQuantity = $this->conn->prepare($sqlQuantity);  
            $stmtQuantity->execute([  
                'product_id' => $productId,  
                'quantity' => $id_soluong  
            ]);  
    
            return true;  
        } catch (PDOException $e) {  
            error_log("Database error: " . $e->getMessage());  
            echo "lỗi khi chương trình chạy.vui lòng thử lại";  
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

    public function updateSP($id, $namesp, $price, $img, $mota, $iddm, $id_soluong) {  
        try {  
            $sql = "UPDATE products SET namesp = :namesp, price = :price, img = :img, mota = :mota, iddm = :iddm, id_soluong = :id_soluong WHERE id = :id";  
            $stmt = $this->conn->prepare($sql);  
            $stmt->execute([  
                'namesp' => $namesp,  
                'price' => $price,  
                'img' => $img,  
                'mota' => $mota,  
                'iddm' => $iddm,
                'id_soluong' => $id_soluong,
                'id' => $id  
            ]);  
            return true;  
        } catch (Exception $e) {  
            echo 'Error: ' . $e->getMessage();  
            return false;  
        }  
    }  
  ////join slSp với SP
  public function getAllProductsByQuantity() {
    $sql = "SELECT 
                products.id, 
                products.namesp, 
                products.price, 
                products.img, 
                quantitys_pro.quantity
            FROM products
            LEFT JOIN quantitys_pro ON products.id = quantitys_pro.product_id
            ORDER BY products.price ASC";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

     //đơn hàng
     public function getAllBill() {
        try {
            $sql = 'SELECT * FROM bills ORDER BY id DESC';
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    /////////////////////////////////////////
    public function __destruct() {  // Hàm hủy kết nối đối tượng
        $this->conn = null;
    }
}