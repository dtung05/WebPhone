<?php
    class Product extends Controller{
       
        
        public function index(){
            if(isset($_SESSION['product']) && isset($_SESSION['detailproduct'])){
                $data['product'] =$_SESSION['product'];
                $data['detailproduct'] = $_SESSION['detailproduct'] ;
            }
            $data['content'] = 'staff/addProduct';
            $data['style'] = 'addProduct';
            $this->callView('layouts/LayoutStaff',$data);
        }

        public function addProduct(){
            $product = [
                'masp' => $_POST['masp'] ?? '',
                'tensp' => $_POST['tensp'] ?? '',
                'gia' => $_POST['gia'] ?? '',
                'mota' => $_POST['mota'] ?? '',
                'soluong' => $_POST['soluong'] ?? '',
                'danhmuc_id' => $_POST['danhmuc_id'] ?? ''
            ];
            $masp = $product['masp'];
            $detailproduct = [
                'masp' => $masp,
                'manhinh' => $_POST['manhinh'] ?? '',
                'hedieuhanh' => $_POST['hedieuhanh'] ?? '',
                'camarasau' => $_POST['camarasau'] ?? '',
                'camaratruoc' => $_POST['camaratruoc'] ?? '',
                'cpu' => $_POST['cpu'] ?? '',
                'ram' => $_POST['ram'] ?? '',
                'dungluongpin' => $_POST['dungluongpin'] ?? '',
                'thesim' => $_POST['thesim'] ?? '',
                'thietke' => $_POST['thietke'] ?? ''
            ];
            $conn = $this->getConn();
            $service = $this->callService('ProductService');
            $daoProduct = $this->callDAO('ProductDAO');
            $daoDetail = $this->callDAO('ProductDetailDAO');
            $ketqua = $service->addProduct($conn, $daoProduct,$daoDetail,$product,$detailproduct);
            $_SESSION['thongbao'] = $ketqua['thongbao'];
            if(!$ketqua['check']){
                $_SESSION['product'] = $product;
                $_SESSION['detailproduct'] = $detailproduct;
            }else{
                unset($_SESSION['product']);
                unset($_SESSION['detailproduct']);
            }
            header("location: "._WEB_ROOT."/Product/index");
            exit;
        }
        public function addDetailProduct(){
            $thongtin = [
                'imgs' => $_POST['img'] ?? [],
                'videos' => $_POST['video'] ?? [],
                'memorys' => $_POST['memory'] ?? []
            ];
        }
    }