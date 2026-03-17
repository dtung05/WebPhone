<?php 
    class ProductService{
        public function addProduct($conn,$daoProdcut,$daoDetail,$product,$detailprodcut){
            $conn->beginTransaction();
            try{
                if($product['soluong'] < 1 ){
                     $conn->rollBack();
                    return [
                        'check' => false,
                        'thongbao' => "Số lượng sản phẩm không hợp lệ"
                    ];
                }
                $tmp = $daoProdcut->addProduct($product);
                if(!$tmp){
                    $conn->rollBack();
                   return [
                        'check' => false,
                        'thongbao' => "Thêm sản phẩm thất bại"
                   ];
                }
                $tmp2 = $daoDetail->addDetailProduct($detailprodcut);
                if(!$tmp2){
                    $conn->rollBack();
                    return[
                        'check' =>false,
                        'thongbao' => "Thêm chi tiết sản phẩm thất bại"
                    ];
                }
                $conn->commit();
                return [
                    'check' => true,
                    'thongbao' => "Thêm sản phẩm thành công"
                ];
            }catch(PDOException $e){
                $conn->rollBack();
                return [
                    'check' => false,
                    'thongbao' => "Gặp lỗi database" ];
            }
        }
        public function addDetail(){
            
        }
}   