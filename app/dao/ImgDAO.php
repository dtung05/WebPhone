<?php
    class ImgDAO{
        private $conn;
        public function __construct($conn){
          $this->conn = $conn;
        }
        // lấy ra list hình ảnh theo mã sản phẩm
        public function getImg($idProduct){
            $sql = "select id,masp,url as urlImg
                    from hinhanh 
                    where masp = :masp";
            $data = ['masp' => $idProduct];
            $query = $this->conn->prepare($sql);
            $query->execute($data);
            return $query->fetchAll();
        }
    }