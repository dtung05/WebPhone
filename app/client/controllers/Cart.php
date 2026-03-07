<?php
    class Cart extends Controller{
        // giao diện trang xem giỏ hàng
        public function index(){
            if(empty($_SESSION['id'])){
                $_SESSION['thongbao'] = "Cần đăng nhập để xem giỏ hàng";
                header("location: " . _WEB_ROOT. "/home");
            }
            else{
                 $daoCart = $this->callDAO('CartDAO');
                $serviceCart = $this->callService('CartService');
                $data = $serviceCart->getCart($daoCart,$_SESSION['id']);
                $data['style'] = 'cart';
                $data['content'] = 'client/cart';
                $this->callView('layouts/LayoutClient',$data);
            }
           
        }
        // xóa sản phẩm trong giỏ
        public function deleteCart($idCart){
            $service = $this->callService('CartService');
            $daoCart = $this->callDAO("CartDAO");
            $service->deleCart($daoCart,$idCart,$_SESSION['id']);
            header("location:" . _WEB_ROOT ."/Cart");
        }
        // thêm sản phẩm vào giỏ hàng
        public function moreCart(){
            $idProduct = $_POST['masp'];
            if(empty($_SESSION['id'])){
                $_SESSION['thongbao'] = "Cần đăng nhập để dùng chức năng này";
            }else{
                 $data['idproduct'] = $_POST['masp'];
                $data['soluong'] = $_POST['soluong'];
                $data['giathanh'] = $_POST['bonho'];
                $data['tongtien'] = $data['giathanh'] * $data['soluong'];
                $data['iduser'] = $_SESSION['id'];

                $daoProduct = $this->callDAO('ProductDAO');
                $daoCart = $this->callDAO('CartDAO');
                $service = $this->callService('CartService');
                $service->insertCart($daoCart,$data,$daoProduct);
            }
           
            header("location: "._WEB_ROOT."/product/productdetail/$idProduct");
        }
    }