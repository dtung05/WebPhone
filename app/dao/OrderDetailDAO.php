<?php
class OrderDetailDAO{
    private $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }

    // hàm thêm dữ liệu vào đơn hàng
    public function addDetail($product,$idorder){
         $values =  implode(',',array_fill(0,count($product),'(?,?,?,?,?,?)'));
       
        $sql = "INSERT INTO orderdetail(idorder,masp,soluong,tensp,giathanh,img)
                VALUES $values";
        $query =$this->conn->prepare($sql);
        $data = [];
        
        // Đổi sang mảng 1 chiều
        foreach($product as $p){
            $data[] = $idorder;
            $data[] = $p['masp'];
            $data[] = $p['soluong'];
            $data[] = $p['tensp'];
            $data[] = $p['gia'];
            $data[] = $p['url'];
        }

        return $query->execute($data);
    }
}