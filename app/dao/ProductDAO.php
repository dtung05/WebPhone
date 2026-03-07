<?php
    class ProductDAO{
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        // lấy ra thông tin của sản phẩm dựa theo số lượng đưa vào
        public function getProductLimit($size){
            $sql = "Select masp,tensp,gia,mota,soluong,danhmuc_id
                    from sanpham
                    order by gia asc
                    limit :size";
            try{
                $query = $this->conn->prepare($sql);
                $query->bindValue(':size',(int)$size,PDO::PARAM_INT);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $err){
                throw $err;
            }
        }
        // lấy ra thông tin sản phẩm theo hãng
        public function getProductBanrd($danhmuc_id,$order = null, $limit = null){
            $sql = "SELECT masp,tensp,gia,mota,soluong,danhmuc_id
                    FROM   sanpham
                    WHERE danhmuc_id = :danhmuc_id";
                    
            if( ($order == 'ASC' || $order == 'DESC') ){
                $sql = $sql." ORDER BY gia $order";

            }if(!empty($limit) ){
                $limit = (int) $limit;
                $sql = $sql." LIMIT $limit";
            }
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':danhmuc_id' => $danhmuc_id
            ]);
            return $query->fetchAll();
        }
        // lấy ra toàn bộ thông tin của 1 sản phẩm
        public function getProductDetail($idProduct){
            $sql = "
                SELECT masp,tensp,gia,mota,soluong,tendanhmuc,manhinh , hedieuhanh,
                camarasau,camaratruoc,cpu,ram,dungluongpin,thesim,thietke,danhmuc_id
                FROM product
                where masp = :masp;";
            $data = ['masp' =>  $idProduct];
            $query = $this->conn->prepare($sql);
            $query->execute($data);
            return $query->fetch();
        }
        // lấy ra thông tin demo của 1 sản phẩm theo id
        public function getProductId($idProduct){
            $sql = "SELECT masp,tensp,gia,mota,soluong,danhmuc_id
                    FROM sanpham
                    WHERE masp = :masp or tensp like :masp";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':masp' => $idProduct,
                ':tensp' => "%$idProduct%"
            ]);
            return $query->fetch();
        }
    }