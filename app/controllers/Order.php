<?php
    class Order extends Controller{
        public function getListOrder(){
            $dao = $this->callDAO('OrderDAO');
            $service = $this->callService('OrderService');
            $data = $service->getListOrder($dao);
            $data['style'] = 'order';
            $data['content'] = 'client/order';
            $this->callView('Layouts/LayoutClient',$data);
        }
        // chức năng đặt hàng trong trang sản phẩm
        public function openOrder(){
            $order['masp'] = $_POST['masp'];
            if(empty($_SESSION['id'])){
                $_SESSION['thongbao'] = 'Cần đăng nhập để đặt hàng';
                header("location:". _WEB_ROOT."/product/productdetail/".$order['masp']);
                exit;
            }
            $order['tensp'] = $_POST['tensp'];
            $order['gia'] = $_POST['bonho'];
            $order['soluong'] = $_POST['soluong'];
            $order['url'] = $_POST['url'];
            App::inarr($order);
            $data['content'] = 'client/ordermore';
            $this->callView('layouts/LayoutClient',$data);
            // // gọi các class vào xử lý
            // $orderDao = $this->callDAO('OrderDAO');
            // $orderdetailDao = $this->callDAO('OrderDetailDAO');
            // $service = $this->callService('OrderService');
            // $service->OrderProduct($orderDao,$orderdetailDao,$Order,$OrderDetai);
            
        }
    }