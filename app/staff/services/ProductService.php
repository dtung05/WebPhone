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
        public function addDetail($conn , $imgDAO, $videoDAO, $memoryDAO,$productDao, $data){
            $masp = $data['masp'];
            // lấy ra mảng dữ liệu
            $img = [];
            foreach($data['imgs'] as $row){
                $img[] = $masp;
                $img[] = $row;
            }
            $video = [];
            foreach($data['videos'] as $row){
                $video[] = $masp;
                $video[] = $row;
            }
            $memory = [];
            foreach($data['memorys'] as $row){
                $memory[] = $masp;
                $memory[] = $row['bonho'];
                $memory[] = $row['giathanh'];
            }
            // check tồn tại
            if(empty($productDao->getProductId($masp))){
                return [
                    'check' => false,
                    'thongbao' => "Mã sản phẩm không tồn tại"
                ];
            }
            // check dữ liệu trùng
            if(!empty( $imgDAO->getImg($masp))){
                return [
                    'check' => false,
                    'thongbao' => "Dữ liệu sản phẩm đã tồn tại"
                ];
            }
            // Thêm dữ liệu và check
            try{
                $conn->beginTransaction();
               
                $check2 = $videoDAO->addVideo($video);
                $check3 = $imgDAO->addImg($img);
                if(!$memoryDAO->addMemory($memory) ){
                   throw new Exception("Lỗi thêm bộ nhớ");
                }if(!$check2){
                    throw new Exception("Lỗi thêm video");
                }if(!$check3){
                    throw new Exception("Lỗi thêm hình ảnh");
                 }
                    $conn->commit();
                return [
                    'check' => true,
                    'thongbao' => "Thêm dữ liệu thành công"
                ];
            }catch(Exception $e){
                if($conn->inTransaction){
                    $conn->rollBack();
                }
                 return [
                       
                        'check' => false,
                        'thongbao' => $e->getMessage()
                    ];
            }
        }
}   