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
            $order['thanhtien'] = $order['soluong'] * $order['gia'];
            $data['thanhtien'] = array_pop($order);
            $data['order'] = [$order];
           
            $data['style'] = "ordermore";
            $data['content'] = 'client/ordermore';
            $this->callView('layouts/LayoutClient',$data);       
        }

        // Mở giao diện đặt hàng trong giỏ hàng
        public function openOrderInCart(){
            $ListMasp = $_POST['idProduct'];
            $SoLuong = $_POST['products'];
            
            $ProductOrder = []; // lấy ra mã sản phẩm kèm với số lượng
            foreach ($ListMasp as $row){
                $ProductOrder[] = [
                    'masp' => $row,
                    'soluong' => $SoLuong[$row]['soluong']
                ];
            }
            $daoPro = $this->callDAO('ProductDAO');
            $service = $this->callService('OrderService');
            $data['order'] =$service->openOrder($daoPro,$ListMasp,$ProductOrder);
            $data['thanhtien'] = array_pop($data['order']);
            $data['style'] = "ordermore";
            $data['content'] = 'client/ordermore';
            $this->callView('layouts/LayoutClient',$data); 
        }
        // Xử lý tạo đơn hàng
        public function addOrder(){
            $orderPro = $_POST['product'];
            $user = $_POST['user'];
            $user['id'] = $_SESSION['id'];
           // Gọi các class DAO và service
           $conn = $this->getConn();
           $daoPro = $this->callDAO('ProductDAO');
           $daoOrder = $this->callDAO('OrderDAO');
           $daoOrderDetail = $this->callDAO('OrderDetailDAO');
           $service = $this->callService('OrderService');
           $ketqua = $service->addOrder($orderPro,$user,$daoPro,$daoOrder,$daoOrderDetail,$conn);
           $_SESSION['thongbao'] = $ketqua['thongbao'];
           if($ketqua['check'] == true ){
                header("location: " . _WEB_ROOT. "/Order/getListOrder");
           }else{
                $data['order'] = $ketqua['products'];
                $data['thanhtien'] = $ketqua['giathanh'];
                $data['style'] = "ordermore";
                $data['content'] = 'client/ordermore';
                $this->callView('layouts/LayoutClient',$data); 
           }

        }
    }