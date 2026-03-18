<?php
    class Product extends Controller{
       
        
        public function index(){
            if(isset($_SESSION['product']) && isset($_SESSION['detailproduct'])){
                $data['product'] =$_SESSION['product'];
                $data['detailproduct'] = $_SESSION['detailproduct'] ;
                 unset($_SESSION['product']);
                unset($_SESSION['detailproduct']);
            }
            if(isset($_SESSION['memory']) && isset($_SESSION['img']) && $_SESSION['video']){
                $data['masp'] = $_SESSION['masp'];
                $data['video'] = $_SESSION['video'];
                $data['memory'] = $_SESSION['memory'];
                $data['img'] = $_SESSION['img'];
                unset($_SESSION['masp']);
                unset($_SESSION['video']);
                unset($_SESSION['img']);
                unset($_SESSION['memory']);
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
            }
            header("location: "._WEB_ROOT."/Product/index");
            exit;
        }
        public function addDetailProduct(){
            $thongtin = 
            [   'masp' => $_POST['masp'] ?? " ",
                'imgs' => $_POST['img'] ?? [],
                'videos' => $_POST['video'] ?? [],
                'memorys' => $_POST['memory'] ?? []
            ];
            $conn = $this->getConn();
            $productDao = $this->callDAO('ProductDAO');
            $imgDao = $this->callDAO('ImgDAO');
            $videoDAO = $this->callDAO('VideoDAO');
            $memoryDAO = $this->callDAO('MemoryDAO');
            $service = $this->callService('ProductService');
            $ketqua = $service->addDetail($conn, $imgDao,$videoDAO,$memoryDAO,$productDao,$thongtin);
            if($ketqua['check'] == false){
                $_SESSION['masp'] = $thongtin['masp'];
                $_SESSION['memory'] = $thongtin['memorys'];
                $_SESSION['img'] = $thongtin['imgs'];
                $_SESSION['video'] = $thongtin['videos'];
            }
          
            $_SESSION['thongbao'] = $ketqua['thongbao'];
            header("location: "._WEB_ROOT."/Product/index");
            exit;
        }
        // Trang quản lý sản phẩm
        public function ManageProduct(){
            $productDao = $this->callDAO("ProductDAO");
            $data['style'] = 'manageproduct';
            $data['products'] = $productDao->getProductLimit(15);
            $data['content'] = 'staff/manageProduct';
            $this->callView('layouts/LayoutStaff' , $data);
        }
         public function ProductDetail($idProduct){
           $service = $this->callService('ProductService');
           $daoImg = $this->callDAO('ImgDAO');
           $daoMemory = $this->callDAO('MemoryDAO');
           $daoVideo = $this->callDAO('VideoDAO');
           $daoProduct = $this->callDAO('ProductDAO');
           $daoComment = $this->callDAO('CommentDAO');
           $data = $service->ProductDetailSrevice($idProduct, $daoImg,$daoMemory,$daoVideo,$daoProduct,$daoComment);
            if(!isset($data)){
                $_SESSION['thongbao'] = 'Mã sản phẩm không hợp lệ';
                header("location: "._WEB_ROOT.'/home');
                exit;
            }else{
                $data['style'] = 'productdetail';
                $data['script'] = 'quangcaosp';
               $data['content'] = 'staff/ProductDetail';
                $this->callView('layouts/LayoutStaff',$data);
            }
        }
    }