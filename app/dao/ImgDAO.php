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
        public function addImg ($img){
            $insert = implode(',',array_fill(0,count($img)/2, "(?,?)"));
            $sql = "INSERT INTO hinhanh(masp,url)
                    VALUES $insert";
            $query = $this->conn->prepare($sql);
            return $query->execute($img);
        }
    }