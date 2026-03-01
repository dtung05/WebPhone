<?php 
    class Product extends Controller{
        // xử lý chi tiết sản phẩm
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
                $data['content'] = 'client/product';
                $this->callView('layouts/LayoutClient',$data);
            }
        }
        //Xử lý tìm sản phẩm theo brand
        public function ProductBrand($brand){
            if ( $brand == 'xiaomi' || $brand == 'iphone'){ 
                $dao = $this->callDAO('ProductDAO');
                if(!empty($_POST['sapxep'])){
                    $order = $_POST['sapxep'];
                }else{
                    $order = null;
                }
                $data['order'] = $order;
                $data['products'] = $dao->getProductBanrd($brand,$order,null);
                $data['style'] = 'productbrand';
                $data['content'] = 'client/productbrand';
                $data['brand'] = $brand;
                $this->callView('layouts/LayoutClient',$data);
                
            }
            else{
                $_SESSION['thongbao'] = "Lỗi truy cập";
                header("location: "._WEB_ROOT."/home");
            }
        }
        // hàm thêm đánh giá sản phẩm
        public function addComment(){
            $comment['id'] = $_SESSION['id'];
            $comment['idProduct'] = $_POST['masp'];
            $comment['sosao'] = $_POST['sosao'];
            $comment['noidung'] = $_POST['noidung'];
            $service = $this->callService('ProductService');
            $daoComment = $this->callDAO('CommentDAO');
            $service->addCommentService($comment,$daoComment);
            // xử lý xong thì chuyển lại trang
            header("Location: ". _WEB_ROOT . "/Product/ProductDetail/".$comment['idProduct']);
        }
        // Hàm xóa đánh giá
        public function DeleteComment($idComment,$idProduct){
           $service = $this->callService('ProductService');
           $dao = $this->callDAO('CommentDAO');
           $service->DeleteCommentSerivce($idComment,$dao);
           header("location: "._WEB_ROOT."/Product/ProductDetail/".$idProduct);
        }


    }