<?php
    class ProductDetailDAO {
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        public function getDetailProduct($id){
            $sql = " Select *
                    From thongsokythuat
                    where masp = :masp";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':masp' => $id
            ]);
            return $query->fetch();
        }
        // Theem thoong tin san pham
        public function addDetailProduct($detailProduct){
            $sql = "INSERT INTO thongsokythuat(masp, manhinh, hedieuhanh,camarasau,camaratruoc, cpu, ram, dungluongpin,thesim,thietke)
                    VALUES(:masp, :manhinh, :hedieuhanh, :camarasau, :camaratruoc, :cpu, :ram, :dungluongpin , :thesim, :thietke)";
            $query = $this->conn->prepare($sql);
            return $query->execute($detailProduct);
        }
        
    }