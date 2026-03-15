<?php
    // require_once "../Models/DAO/DAOSanPham.php";
    // require_once "../Models/DAO/DAOProductSpec.php";
    // require_once "../Models/Classs/Product.php";

    class ProductService{
        public function AddProductService($sanpham,$conn){
            $DAOPr = new DAOSanPham(); // Sản phẩm
            $DAOSp = new DAOProductSpec(); // thông số sản phẩm
            $Pr = new Product($sanpham['masp'],$sanpham['tensp'],
                            $sanpham['gia'], $sanpham['mota']
                            ,$sanpham['soluong'],$sanpham['danhmuc_id']);
            $PrSpec = new ProductSpec($sanpham['masp'],$sanpham['manhinh'],$sanpham['hedieuhanh'],$sanpham['camarasau']
                                ,$sanpham['camaratruoc'],$sanpham['cpu'],$sanpham['ram'],$sanpham['dungluongpin'],
                                $sanpham['thesim'],$sanpham['thietke']);
            try{
                $checkAdd1 = $DAOPr->addProduct($Pr,$conn);
                $checkAdd2 = $DAOSp->addProductSpec($PrSpec,$conn);
                if($checkAdd1 & $checkAdd2){
                    $_SESSION['thongbao'] = "Thêm dữ liệu thành công";
                    header("location: createsp.php");
                    exit();

                }else if(!$checkAdd1){
                    $_SESSION['thongbao'] = "Thêm sản phẩm thất bại";
                    header("location: createsp.php");
                    exit();
                }
            }catch(PDOException $err){
                $_SESSION['thongbao'] = "Lỗi: ".$err->getMessage();
                header("location: createsp.php");
                exit();
            }
        }
    }
?>