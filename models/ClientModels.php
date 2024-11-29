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

    // đổi mật khẩu
    

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
    // public function getTop10Sp() {
    //         $sql = "SELECT 
    //             p.id AS product_id,
    //             p.namesp AS product_name,
    //             p.price,
    //             p.img,
    //             p.mota,
    //             SUM(c.soluong) AS total_quantity
    //         FROM 
    //             products p
    //         JOIN 
    //             carts c ON p.id = c.idpro
    //         JOIN 
    //             bills b ON c.idbill = b.id
    //         WHERE 
    //             b.bill_status = 3
    //         GROUP BY 
    //             p.id, p.namesp, p.price, p.img, p.mota
    //         ORDER BY 
    //             total_quantity DESC
    //         LIMIT 10";

    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }   

    public function getTop10Sp(){
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
    
    // Kiểm tra xem giỏ hàng có tồn tại sản phẩm
    public function checkCarts($idUser, $idProduct){
        try {
            $sql = 'SELECT * FROM carts WHERE idUser = :idUser AND idpro = :idProduct';
    
            $stmt = $this->conn->prepare($sql);
        
            $stmt->execute(['idUser'=> $idUser, 'idProduct'=> $idProduct]);

            return $stmt->fetch();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    // Lưu sản phẩm trong giỏ hàng vào cart
    public function addCarts($idUser, $idpro, $img, $name, $price, $soluong, $thanhtien, $mota, $remaining_quantity) {
        // SQL để thêm sản phẩm vào giỏ hàng
        $sql = 'INSERT INTO carts (idUser, idpro, img, name, price, soluong, thanhtien, mota, created_at, remaining_quantity) 
                VALUES (:idUser, :idpro, :img, :name, :price, :soluong, :thanhtien, :mota, NOW(), :remaining_quantity)';
        
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
            'mota' => $mota,
            'remaining_quantity' => $remaining_quantity
        ]);
        
        return true;
    }
    // Lấy số lượng trong bảng carts để kiểm tra còn tăng lên chứ
    public function getCartQuantity($idUser, $idpro) {
        try {
            $sql = 'SELECT soluong FROM carts WHERE idUser = :idUser AND idpro = :idpro';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'idUser' => $idUser,
                'idpro' => $idpro
            ]);
            
            $result = $stmt->fetch();
            return $result ? $result['soluong'] : 0; // Nếu không có sản phẩm
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    // Nếu mà có rồi, thì cập nhật số lượng
    public function updateQuantity($idUser, $idpro, $soluong, $thanhtien) {
        try {
            $sql = 'UPDATE carts SET soluong = :soluong, thanhtien = :thanhtien WHERE idUser = :idUser AND idpro = :idpro';
 
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'idUser' => $idUser,
                'idpro' => $idpro,
                'soluong' => $soluong,
                'thanhtien' => $thanhtien
            ]);
            
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    // Lấy số lượng sản phẩm tồn kho để trừ xuống
    public function getRemainingQuantity( $idpro) {
        try {
            $sql = 'SELECT remaining_quantity FROM carts WHERE idpro = :idpro';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'idpro' => $idpro
            ]);
            
            $result = $stmt->fetch();
            return $result['remaining_quantity'];
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    // Cập nhật sản phẩm còn lại trong kho 
    public function updateRemainingQuantity( $idpro,$remaining_quantity) {
        try {
            $sql = 'UPDATE carts SET  remaining_quantity = :remaining_quantity WHERE idpro = :idpro';
 
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'idpro' => $idpro,
                'remaining_quantity' => $remaining_quantity
            ]);
            
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    

    public function listCartByUser($idUser){
        try {
            $sql = 'SELECT * FROM carts WHERE idUser = :idUser ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':idUser' => $idUser
            ]);

            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Xoá hết sản phẩm theo user
    public function deleteAllCarts($id){
        $sql = "DELETE FROM carts WHERE idUser = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    // Xoá cụ thể sản phẩm theo user
    public function deleteCarts($id) {
        try {
            $sql = 'DELETE FROM carts WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
    
            return true; 
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    
    // Thanh toán
    public function addBill($iduser, $bill_name, $bill_address, $bill_sdt, $bill_email, $total, $ngaydathang, $bill_pttt, $quantity) {
        try {
            $sql = 'INSERT INTO bills (iduser, bill_name, bill_address, bill_sdt, bill_email, total, ngaydathang, bill_pttt, quantity) 
                    VALUES (:iduser, :bill_name, :bill_address, :bill_sdt, :bill_email, :total, :ngaydathang, :bill_pttt, :quantity)';
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([
                ':iduser' => $iduser,
                ':bill_name' => $bill_name,
                ':bill_address' => $bill_address,
                ':bill_sdt' => $bill_sdt,
                ':bill_email' => $bill_email,
                ':total' => $total,
                ':ngaydathang' => $ngaydathang,
                'bill_pttt' => $bill_pttt,
                'quantity' => $quantity,
            ]);
            
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
    // Sau khi thanh toán thành công thì xoá sản phẩm trong carts
    public function clearCart($user_id) {
        // Xóa tất cả sản phẩm trong giỏ hàng của người dùng sau khi đặt hàng
        $sql = "DELETE FROM carts WHERE idUser = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    // // Sau khi xoá dữ liệu bảng carts thì dữ liệu bảng bảng carts sẽ được lưu và đây
    // public function orderDetails($order_id, $product_id, $quantity, $price){
    //     $sql = "INSERT INTO order_details (order_id, product_id, quantity, price)
    //     SELECT idbill, idpro, soluong, price FROM carts WHERE idbill = :idbill";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindParam(':idbill', $idbill, PDO::PARAM_INT);
    //     $stmt->execute();

    // }

    // Cập nhật idbill vào bảng carts sau khi thanh toán
        // public function updateCartWithOrderId($userId, $orderId): void {
        //     $sql = "UPDATE carts 
        //             SET idbill = :orderId 
        //             WHERE user_id = :userId AND idbill IS NULL"; // Chỉ cập nhật những sản phẩm chưa có idbill

        //     $stmt = $this->conn->prepare($sql);
        //     $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        //     $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        //     $stmt->execute();
        // }


    // Bill
    public function getAllBillByIdUser($idUser){
        $sql = "SELECT * FROM bills WHERE idUser = :idUser ORDER BY bills.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    
    
    public function getCommentsByProductId($id) {
        $sql = "SELECT c.*, a.username 
                FROM comments c
                JOIN accounts a ON c.idUser = a.id
                WHERE c.idpro = :id AND c.status = 1
                ORDER BY c.time DESC";  // Add `c.status = 1` to check visibility
        
        $stmt = $this->conn->prepare($sql);
        
        try {
            $stmt->execute(['id' => $id]);
            $comments = $stmt->fetchAll();
            return $comments;
        } catch (PDOException $e) {
            throw $e;
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
    

    public function productByCasterri($id) {
        try {
            // Lấy sản phẩm và tên danh mục
            $sql = "SELECT p.*, c.name AS category_name
                FROM products p
                INNER JOIN categories c ON p.iddm = c.id
                WHERE c.id = :id";
    
            $stmt = $this->conn->prepare($sql);
    
            // Gắn giá trị cho tham số :id
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Thực thi câu lệnh
            $stmt->execute();
    
            // Trả về kết quả
            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    //yeuthich
    public function checkFavourite($userId, $productId) {
        try {
            $sql = "SELECT * FROM favorites WHERE user_id = :user_id AND pro_id = :pro_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['
            :user_id' => $userId,
            ':pro_id' => $productId
            ]);
            
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi khi kiểm tra sản phẩm yêu thích: " . $e->getMessage();
            return false; 
        }
    }
    
    public function addToFavourite($userId, $productId, $addedAt) {
        try {
            $sql = "INSERT INTO favorites (user_id, pro_id, added_at) VALUES (:user_id, :pro_id, :added_at)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([
                ':user_id' => $userId,
                ':pro_id' => $productId,
                ':added_at' => $addedAt
            ]);
            
            return $result;
        } catch (Exception $e) {
            echo "Lỗi khi thêm sản phẩm vào yêu thích: " . $e->getMessage();
            return false; 
        }
    }
    
    public function getFavouritesByUser($userId) {
        try {
            $sql = "
                SELECT 
                    f.id AS favorite_id, 
                    f.added_at, 
                    p.id AS product_id, 
                    p.namesp, 
                    p.price, 
                    p.img, 
                    a.username AS user_name, 
                    a.email AS user_email 
                FROM favorites f
                JOIN products p ON f.pro_id = p.id
                JOIN accounts a ON f.user_id = a.id
                WHERE f.user_id = :user_id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':user_id' => $userId]);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi khi lấy danh sách yêu thích của người dùng: " . $e->getMessage();
            return []; 
        }
    }
    
    public function __destruct() {  // Hàm hủy kết nối đối tượng
        $this->conn = null;
    }   

}