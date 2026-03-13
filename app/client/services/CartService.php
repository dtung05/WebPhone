<?php 
    class CartService{
        public function getCart($daoCart,$idUser){
            try{
                $data['cart'] = $daoCart->getCart($idUser);
                return $data;
            }catch(PDOException $err ){
                $_SESSION['thongbao']=$err->getMessage();
                header("location: "._WEB_ROOT."/home");
            }
        }
        public function deleCart($daoCart,$idCart,$idUser){
            try{
                $number = $daoCart->deleteCart($idCart,$idUser);
                if($number == 0){
                    $_SESSION['thongbao'] = "Không đủ quyền xóa";
                }else{
                    $_SESSION['thongbao'] = "Xóa sản phẩm thành công";
                }
            }catch(PDOException $err){
                $_SESSION['thongbao'] = $err->getMessage();
            }
        }
        public function insertCart($daoCart,$data,$daoProduct){
            try{
                $row = $daoProduct->getProductId($data['idproduct']);
                if($row['soluong'] > $data['soluong']){
                    $_SESSION['thongbao'] = "Số lượng sản phẩm không hợp lệ";
                    return;
                }$check = $daoCart->checkProductInCart($data['idproduct'],$data['iduser']);
                if(empty($check)){
                    $query = $daoCart->insertCart($data);
                    if($query){
                        $_SESSION['thongbao'] = "Đã thêm sản phẩm vào giỏ hàng";
                    }else{
                        $_SESSION['thongbao'] = "Lỗi xảy ra khi thêm sản phẩm";
                    }
                }else{
                    $soluong = $check['soluong'] + $data['soluong'];

                    $query = $daoCart->updateCart($check['id'],$soluong);
                    if($query){
                        $_SESSION['thongbao'] = "Cập nhật lại số lượng thành công" ;
                    }else{
                        $_SESSION['thongbao'] = "Lỗi xảy ra khi thêm sản phẩm";
                    }
                }
            }catch(PDOException $err){
                $_SESSION['thongbao'] = $err->getMessage();
            }
        }
    }