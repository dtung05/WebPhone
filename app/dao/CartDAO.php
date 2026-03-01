<?php
    class CartDAO{
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        // lấy ra thông tin giỏ hàng theo id
        public function getCart($idUser){
            $sql = "SELECT sanpham.masp,giohang.id,sanpham.soluong as tonkho,
            tensp,mota,giohang.soluong,sanpham.gia as dongia,giohang.gia as thanhtien 
                    FROM giohang
                    JOIN sanpham on sanpham.masp = giohang.masp
                    WHERE mataikhoan = :idUser
                    ORDER BY ngaythem DESC";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':idUser' => $idUser
            ]);
            return $query->fetchAll();
        }
        // xóa sản phẩm khỏi giỏ hàng
        public function deleteCart($idCart,$idUser){
            $sql = "DELETE FROM giohang
                    WHERE mataikhoan = :idUser and id = :idCart";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':idUser' => $idUser,
                ':idCart'=> $idCart
            ]);
            return $query->rowCount();
        }
        // check xem sản phẩm tồn tại trong giỏ hàng chưa và lấy ra thông tin
        public function checkProductInCart($idProduct,$idUser){
            $sql = "SELECT id,mataikhoan,masp,gia,soluong,tongtien,ngaythem
                    FROM giohang
                    WHERE masp = :masp and mataikhoan = :idUser" ;
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':masp' => $idProduct,
                ':idUser' => $idUser
            ]);
            return $query->fetch();
        }
        // update số lượng giỏ hàng
        public function updateCart($idCart,$soluong){
            $sql = "UPDATE giohang
                    SET soluong = :soluong
                    WHERE id = :idCart";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':soluong' => $soluong,
                ':idCart' => $idCart
            ]);
            if($query){
                return true;
            }
            return false;   
        }
        // thêm giỏ hàng mới
        public function insertCart($data){
            $sql = "INSERT INTO giohang(mataikhoan,masp,gia,soluong,tongtien,ngaythem)
                    VALUES(:iduser,:idproduct,:gia,:soluong,:tongtien,:ngaythem)";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':iduser' => $data['iduser'],
                ':idproduct' => $data['idproduct'],
                ':gia' => $data['giathanh'],
                ':soluong' => $data['soluong'],
                ':tongtien' => $data['tongtien'],
                ':ngaythem' => date("Y-m-d")
            ]);
            if($query){
                return true;
            }return false;
        }
    }