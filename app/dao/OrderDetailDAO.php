<?php
class OrderDetailDAO{
    private $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }
    // hàm thêm dữ liệu vào đơn hàng
    public function MoreDetai($data){
        $sql = "INSERT INTO orderdetail(idorder,masp,soluong,tensp,giathanh,img)
                VALUES(:idorder,:masp,:soluong,:tensp,:giathanh,:img)";
        $query =$this->conn->prepare($sql);
        return $query->execute([
            ":idorder"=> $data['idorder'],
            ':masp' => $data['masp'],
            ':soluong' =>$data['soluong'],
            ':tensp' => $data['giathanh'],
            ':img' => $data['img']
        ]);
    }
}