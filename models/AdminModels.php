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
    
    public function getAllProductsByCategory() {
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
                LEFT JOIN products ON categories.id = products.iddm
                ORDER BY categories.name, products.price ASC";
        $stmt = $this->conn->prepare($sql);
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