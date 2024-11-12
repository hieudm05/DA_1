<?php 

class ClientModels 
{
    public $conn;

    public function __construct() { // Hàm khởi tạo kết nối đối tượng
        $this->conn = connectDB();
    }

    // Lấy toàn bộ dữ liệu
    public function getAll() {
        try {
            $sql = 'SELECT * FROM tbl_sinhvien ORDER BY id DESC';
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute();

            return $stmt->fetchAll();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function __destruct() {  // Hàm hủy kết nối đối tượng
        $this->conn = null;
    }
}