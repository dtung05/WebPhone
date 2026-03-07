<?php
    class ProductService{
        public function indexService($DAO){
            try{
                $data['sanpham6'] = $DAO->getProductLimit(6);
                $data['sanpham4'] = $DAO->getProductLimit(4);
                $data['sanpham10'] = $DAO->getProductLimit(10);
                return $data;

            }catch(PDOException $err){
                $_SESSION['thongbao'] = $err->getMessage();
                return $err->getMessage();
            }
        }
        public function ProductDetailSrevice($idProduct, $daoImg,$daoMemory,$daoVideo,$daoProduct,$daoComment){
            try{
                $data['product'] = $daoProduct->getProductDetail($idProduct);
               
              
                    $data['memory'] = $daoMemory->getMemory($idProduct);
                    $data['img'] = $daoImg->getImg($idProduct);
                    $data['video'] = $daoVideo->getVideo($idProduct);
                    $data['products'] = $daoProduct->getProductBanrd($data['product']['danhmuc_id'],null,5);
                    $data['comment'] = $daoComment->getComment($idProduct);
                    $data['star'] = $daoComment->getDetailComment($idProduct);
                    if($data['star']['sumComment'] == 0 ){
                        for($i = 0 ; $i < 5 ;$i++){
                            $data['star']['tyle'][$i] = 0;
                        }
                    }else{
                    // tỷ lệ phần trăm trên thanh đánh giá
                    $data['star']['tyle'][0] = round($data['star']['one']/ $data['star']['sumComment'] *100);
                    $data['star']['tyle'][1] = round($data['star']['two']/ $data['star']['sumComment']*100);
                    $data['star']['tyle'][2] = round($data['star']['three']/ $data['star']['sumComment']*100);
                    $data['star']['tyle'][3] = round($data['star']['four']/ $data['star']['sumComment']*100);
                    $data['star']['tyle'][4] = round($data['star']['five']/ $data['star']['sumComment']*100);
                    }
                    
                return $data;
            }catch(PDOException $err){
                $_SESSION['thongbao'] = $err->getMessage();
            }
        }
        // thêm 1 bình luận
        public function addCommentService($comment,$daoComment){
            if(empty($comment['id'])){
                $_SESSION['thongbao'] = "Cần đăng nhập để đánh giá";
            }else{
                try{
                    $check = $daoComment->addComment($comment['idProduct'], $comment['id'],$comment['sosao'],$comment['noidung']);
                    if($check == true){
                        $_SESSION['thongbao'] = "Thêm đánh giá thành công";
                    }else{
                        $_SESSION['thongbao'] = "Lỗi dữ liệu";
                    }
                }catch(PDOException $err){
                    $_SESSION['thongbao'] = $err->getMessage();
                }
            }
        }// xóa 1 bình luận
        public function DeleteCommentSerivce($idComment,$dao){
            try{
                $number = $dao->deleteComment($idComment,$_SESSION['id']);
                if($number == 0 ){
                     $_SESSION['thongbao'] = "not find comment or Insufficient access";
                }else{
                     $_SESSION['thongbao'] = "Xóa thành công";
                }
            }catch(PDOException $err){
                $_SESSION['thongbao'] = $err->getMessage();
            }
          
        }

    }