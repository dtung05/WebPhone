<?php 
    class OrderService{
        public function getListOrder($daoOrder){
            try{
                $data['order'] = $daoOrder->getListOrder($_SESSION['id']);
                foreach($data['order'] as $row){
                    $data['order'][$row['idorder']]['tongtien'] = 0;
                    foreach($row['product'] as $row2){
                        $data['order'][$row['idorder']]['tongtien'] += $row2['giathanh'];
                    }
                }
                return $data;
            }catch(PDOException $err){
                $_SESSION['thongbao'] = $err->getMessage();
            }
        }
        
        // thêm giữ liệu vào giỏ hàng
        public function openOrder($daoPro,$ListId,$products){
                $product = $daoPro->getListProductId($ListId);
                $tmp = 0;
                $tongtien = 0;
                foreach ( $products as $row){
                    $product[$tmp]['soluong'] = $row['soluong'];
                    $tongtien += $product[$tmp]['gia'] * $row['soluong'];
                    $tmp++;
                }
                $product['thanhtien'] = $tongtien;
        return $product;
        }
    }