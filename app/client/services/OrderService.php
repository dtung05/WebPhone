<?php 
    class OrderService{  
         
        // Lấy ra danh sách đơn hàng
        public function getListOrder($daoOrder){
            try{
                $data['order'] = $daoOrder->getListOrder($_SESSION['id']);
                if (!empty($data['order'])){
                    $tongtien = 0; //Khai báo tổng tiền
                    foreach($data['order'] as &$row){
                        $data['order'][$row['idorder']]['tongtien'] = 0;
                        foreach($row['product'] as $row2){
                            $data['order'][$row['idorder']]['tongtien']+= $row2['giathanh']*$row2['soluong'];
                        }
                    }
                }
                $data['tongtien'] = $tongtien;
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

        // Tạo đơn hàng
    public function addOrder($orderPro,$user, $daoPro,$daoOrder,$daoOrderDetail,$conn){
            // Lấy ra mã sản phẩm
            $listId = array_keys($orderPro);
            //Truy vấn lấy ra list danh sách
            $product = $daoPro->getListProductID($listId);
            // gán giá trị vào product
            $thanhtien = 0;
           foreach($product as &$row){
                $masp = $row['masp'];
                $row['soluong'] = $orderPro[$masp]['soluong'];
                $thanhtien += ($row['soluong'] * $row['gia']);
           }
           // Lấy id đơn hàng
           try{
                $conn->beginTransaction();
                $idOrder = $daoOrder->addOrder($user);
                if($idOrder == 0 ){
                     $conn->rollBack();
                    return [
                        'check' => false,
                        'thongbao'=> "Tạo đơn hàng gặp lỗi",
                        'products' =>$product,
                        'giathanh' => $thanhtien
                    ];
                }
                $check = $daoOrderDetail->addDetail($product,$idOrder);
                if(!$check){
                     $conn->rollBack();
                    return[
                        'check'=>false,
                        'thongbao' => "Tạo chi tiết đơn hàng lỗi",
                        'products' =>$product,
                        'giathanh' =>$thanhtien
                    ];
                }
                $conn->commit();
                return [
                    'check'=> true,
                    'thongbao'=> "Đặt hàng thành công"
                ];
         
           }catch(PDOException $e){
                $conn->rollBack();
                return [
                    'check' => false,
                    'thongbao' => "Lỗi hệ thống".$e->getMessage(),
                    'products' =>$product,
                    'giathanh' =>$thanhtien
                ];
           };
        }
    //
    
}