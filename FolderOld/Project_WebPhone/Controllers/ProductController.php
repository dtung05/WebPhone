<?php 

    class ProductController {
        public function addProductController($conn){
            $sanpham = [];
            $sanpham['masp'] = $_POST['masp'];
            $sanpham['tensp'] = $_POST['tensp'];
            $sanpham['gia'] = $_POST['gia'];
            $sanpham['mota'] = $_POST['mota'];
            $sanpham['soluong'] = $_POST['soluong'];
            $sanpham['danhmuc_id'] = $_POST['danhmuc_id'];

            $sanpham['manhinh'] = $_POST['manhinh'];
            $sanpham['hedieuhanh'] = $_POST['hedieuhanh'];
            $sanpham['camarasau'] = $_POST['camarasau'];
            $sanpham['camaratruoc'] = $_POST['camaratruoc'];
            $sanpham['cpu'] = $_POST['cpu'];
            $sanpham['ram'] = $_POST['ram'];
            $sanpham['dungluongpin'] = $_POST['dungluongpin'];
            $sanpham['thesim'] = $_POST['thesim'];
            $sanpham['thietke'] = $_POST['thietke'];
            $Product = new ProductService();
            $Product->AddProductService($sanpham,$conn);
            
        }
    }
?>