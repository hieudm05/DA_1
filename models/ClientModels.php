<?php 

class ClientModels 
{
    public $conn;

    public function __construct() { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }

    // Đăng kí tài khoản
    public function addAccount($username, $email, $password, $sdt){
        $sql = 'INSERT INTO accounts (username, email, password, sdt) VALUES (:username, :email, :password, :sdt)';
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute(['username' => $username, 'email' => $email, 'password' => $password, 'sdt' => $sdt]);
        return true;
    }

    // Cập nhật tài khoản
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
    public function updateAccout($id, $username, $email, $avatar, $address, $sdt){
        try {
            $sql = "UPDATE accounts 
                    SET 
                        username = :username, 
                        email = :email, 
                        avatar = :avatar, 
                        address = :address, 
                        sdt = :sdt
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'username' => $username, 
                'email' => $email, 
                'avatar' => $avatar, 
                'address' => $address, 
                'sdt' => $sdt, 
                'id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    

    // Login
    public function checkAcc($userOrEmail, $pass) {
        $sql = 'SELECT * FROM accounts WHERE (username = :userOrEmail OR email = :userOrEmail) AND password = :pass';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':userOrEmail' => $userOrEmail,
            ':pass' => $pass
        ]);
        return $stmt->fetch();
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

    // Lấy sản phẩm theo từng nhóm danh mục
    public function getAllProductsByCategory() {
        $sql = "SELECT 
                    products.id, 
                    products.namesp, 
                    products.price, 
                    products.img,
                    products.mota,
                    products.quantity,
                    categories.name AS category_name
                FROM categories
                LEFT JOIN products ON categories.id = products.iddm
                ORDER BY categories.name, products.price ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Top sản phẩm bán chạy
    public function getTop10Sp() {
        try {
            // Câu lệnh SQL để lấy 10 sản phẩm có lượt xem cao nhất
            $sql = 'SELECT * FROM products ORDER BY luotxem DESC LIMIT 10';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    // Tìm kiếm theo sản phẩm
    public function getAllSP($search) {
        try {
            $sql = "SELECT * FROM products WHERE namesp LIKE '%$search%'";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    // Giỏ hàng
    public function getProductById($id){
        try {
            $sql = 'SELECT * FROM products WHERE id ='.$id;
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetch();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    // Lưu sản phẩm trong giỏ hàng vào cart
    public function addCarts($idUser, $idpro, $img, $name, $price, $soluong, $thanhtien, $mota) {
        // SQL để thêm sản phẩm vào giỏ hàng
        $sql = 'INSERT INTO carts (idUser, idpro, img, name, price, soluong, thanhtien, mota) 
                VALUES (:idUser, :idpro, :img, :name, :price, :soluong, :thanhtien, :mota)';
        
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);
        
        // Thực thi câu lệnh với các tham số
        $stmt->execute([
            'idUser' => $idUser,
            'idpro' => $idpro,
            'img' => $img,
            'name' => $name,
            'price' => $price,
            'soluong' => $soluong,
            'thanhtien' => $thanhtien,
            'mota' => $mota
        ]);
        
        return true;
    }
    public function listCartByUser(){
        try {
            $sql = 'SELECT * FROM carts ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetch();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    // bill
    function loadall_bill($kyw="", $iduser=0) {
        try {
             // Khởi tạo câu lệnh SQL
        $sql = "SELECT * FROM bills WHERE 1";
    
        // Thêm điều kiện cho iduser nếu iduser > 0
        if ($iduser > 0) {
            $sql .= " AND iduser=" . intval($iduser);
        }
        
        // Thêm điều kiện tìm kiếm từ khóa nếu có
        if ($kyw != "") {
            $sql .= " AND id LIKE '%" . htmlspecialchars($kyw, ENT_QUOTES) . "%'";
        }
        
        // Thêm mệnh đề ORDER BY để sắp xếp theo ID giảm dần
        $sql .= " ORDER BY id DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    

    public function __destruct() {  // Hàm hủy kết nối đối tượng
        $this->conn = null;
    }
}