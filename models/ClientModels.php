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
    public function getSPById($id) {  
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
    
    public function load_sanpham_cungloai($id, $iddm){
       try {
        $sql= "SELECT * FROM products WHERE iddm = ".$iddm." AND id <> ".$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
       } catch (Exception $e) {
        echo $e->getMessage();
        }
    }
    
    ///comment
    public function addComment($idpro, $idUser, $noidung, $time) {
        try {
            $sql = "INSERT INTO comments (idpro, idUser, noidung, time) 
                    VALUES (:idpro, :idUser, :noidung, :time)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':idpro' => $idpro,
                ':idUser' => $idUser,
                ':noidung' => $noidung,
                ':time' => $time,
            ]);
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Ghi log lỗi
            file_put_contents('error_log.txt', $e->getMessage(), FILE_APPEND);
            return false;
        }
    }
    
    
    
    
    public function getCommentsByProductId($id) {
        $sql = "SELECT c.*, a.username 
                FROM comments c
                JOIN accounts a ON c.idUser = a.id
                WHERE c.idpro = :id
                ORDER BY c.time DESC";
    
        $stmt = $this->conn->prepare($sql);
    
        try {
            $stmt->execute(['id' => $id]);
            $comments = $stmt->fetchAll();
            $logFile = 'log.txt'; // Đường dẫn file log
            file_put_contents($logFile, print_r($comments, true), FILE_APPEND);
    
            return $comments;
        } catch (PDOException $e) {
            // Log lỗi ra file nếu có
            file_put_contents('log.txt', $e->getMessage(), FILE_APPEND);
            throw $e; // Ném lại lỗi để dễ debug
        }
    }
    
    
    
    public function deleteComment($id) {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    public function getCommentById($id) {
        $sql = "SELECT * FROM comments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    
    
    
    
    public function __destruct() {  // Hàm hủy kết nối đối tượng
        $this->conn = null;
    }
}