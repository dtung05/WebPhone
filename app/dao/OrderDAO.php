<?php
    class OrderDAO{
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        // lấy ra danh sách đơn hàng
        public function getListOrder($idUser){
            $sql = "SELECT dh.idorder, mataikhoan,ngaydat,img,
                    trangthai,diachi,sdt,idOrderDetail,
                    masp,soluong,tensp,giathanh
                    FROM donhang as dh 
                    JOIN   orderdetail as ordt on dh.idOrder = ordt.idOrder 
                    WHERE mataikhoan = :idUser";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':idUser' => $idUser
            ]);
            $query =  $query->fetchAll();
            if(empty($query)){
                return false;
            }
            foreach($query as $row){
                if(!isset($data[$row['idorder']])){
                   $data[$row['idorder']] = [
                        'idorder' => $row['idorder'],
                        'mataikhoan' => $row['mataikhoan'],
                        'ngaydat' => $row['ngaydat'],
                        'trangthai' => $row['trangthai'],
                        'diachi' => $row['diachi'],
                        'sdt' => $row['sdt'],
                   ];
                }
                $data[$row['idorder']]['product'][] = [
                    'idorderdetail' =>  $row['idOrderDetail'],
                    'img' => $row['img'],
                    'masp' => $row['masp'],
                    'soluong' => $row['soluong'],
                    'tensp' => $row['tensp'],
                    'giathanh' => $row['giathanh'],
                ];
               
            }
            return $data;
        }
        // tạo mới đơn hàng
        public function MoreOrder($data){
            $sql = "INSERT INTO donhang (mataikhoan,ngaydat,trangthai,diachi,sdt)
                    values(:mataikhoan,NOW(),'Chờ xác nhận',:diachi, :sdt)";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':mataikhoan' => $data['iduser'],
                ':diachi' => $data['diachi'],
                ':sdt' => $data['sdt']
            ]);
            if($query->Count() != 0 ){
                 return $this->conn->lastInsertID();
            }
            return 0;         
        }
    }