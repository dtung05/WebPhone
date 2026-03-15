<?php
    // require_once "../../Config/Database.php";
    // require_once "../Classs/Product.php";

    class DAOSanPham{
        // private $conn;
        // public function __construct(){
        //     $Database = new Database();
        //     $this->conn = $Database->connect();
        // }

        
        // Thên sản phẩm lên cơ sở dữ liệu
        public function addProduct(Product $sp,$conn){
            $sql = "INSERT INTO sanpham(masp,tensp,gia,mota,soluong, danhmuc_id)
                    Values (:masp, :tensp, :gia, :mota, :soluong,:danhmuc_id)";
            try{
                $query = $conn->prepare($sql);
                $check = $query -> execute([
                            ':masp'=>$sp->getMasp(),
                            ':tensp'=>$sp->getTensp(),
                            ':gia'=> $sp->getGia(),
                            ':mota'=>$sp->getMota(),
                            ':soluong'=>$sp->getSoluong(),
                            ':danhmuc_id'=>$sp->getDanhmucId()
                            ]);
                return $check;
                }
            catch (PDOException $err){
                throw $err;
            }
            
        }


        // lấy ra sản phẩm để quảng cáo
        public function quangcao($ketnoi, $soluong){
            $ketqua = mysqli_query($ketnoi,"select * from sanpham LIMIT $soluong");
            $list = [] ;
            while($row = mysqli_fetch_assoc($ketqua)){
                $list[] = $row;
            }
            return $list;
        }
        // lấy sản phẩm theo danh mục
        public function danhmuc($ketnoi,$madanhmuc,$sapxep){
            $sql = "select *
                    from danhmuc as dm
                    join sanpham as sp on dm.danhmuc_id = sp.danhmuc_id
                    where dm.danhmuc_id = '$madanhmuc'
                    order by gia $sapxep";
            return mysqli_query($ketnoi,$sql);
        }
        //Lấy toàn bộ thông tin của 1 sản phẩm
        public function getsanpham($ketnoi,$masp){
            $sql_sp = "SELECT * FROM sanpham WHERE masp='$masp'";
            $result_sp = mysqli_query($ketnoi, $sql_sp);
            $list['sanpham'] = mysqli_fetch_assoc($result_sp);
            $sql_img = "SELECT * FROM hinhanh WHERE masp='$masp'";
            $list['img'] = mysqli_query($ketnoi, $sql_img);
            $sql_ts = "SELECT * FROM thongsokythuat WHERE masp='$masp'";
            $ketqua = mysqli_query($ketnoi, $sql_ts);
            $list['bangthongso'] = mysqli_fetch_assoc($ketqua);
            $sql_bn = "SELECT * FROM bonho WHERE masp='$masp'";
            $list['bonho'] = mysqli_query($ketnoi, $sql_bn);
            $sql_vd = "SELECT * FROM videodanhgia WHERE masp='$masp'";
            $list['videodanhgia'] = mysqli_query($ketnoi, $sql_vd);
            $danhmuc = $list['sanpham']['danhmuc_id'];
            $sql_lq = "SELECT * FROM sanpham
               WHERE masp != '{$list['sanpham']['masp']}' 
               AND danhmuc_id = '$danhmuc'
               ORDER BY RAND()
               LIMIT 4";
            $list['splq'] = mysqli_query($ketnoi,$sql_lq);
            return $list;
        }
        // lấy ra thông tin của 1 sản phẩm
        public function get1sanpham($ketnoi,$masp){
            $sql = "select * from sanpham where masp = '$masp'";
            $ketqua =  mysqli_query($ketnoi,$sql);
            return mysqli_fetch_assoc($ketqua);
        }
        public function findsanpham($ketnoi,$find){
            $sql = "select * from sanpham where tensp like '%$find%'";
            return mysqli_query($ketnoi,$sql);
        }
    }
    
    class DAOimg{
        function themimg($ketnoi,$masp,$img){
            $error = "";
            for($i = 1 ; $i <= 5 ; $i++){
                $tmp = $img[$i];
                $sql = "insert into hinhanh(masp,url)
                    values('$masp','$tmp')";
                $query = mysqli_query($ketnoi, $sql);
                if(!$query){
                    $error = $error . " ".$i;
                }
            }
            if(empty($error)){
                return"Thêm ảnh thành công";
            }
            return "Dòng".$error."gặp lỗi";
        }
    }

    class DAOVideoDanhGia{
        function themvideo($ketnoi,$masp, $url){
            $error =[];
            for($i = 1 ; $i <= 3 ; $i++){
                $sql = "insert into videodanhgia(masp,url)
                values('$masp','$url[$i]')";
                $query = mysqli_query($ketnoi,$sql);
                if(!$query){
                    $error[] = " ".$i;
                }
            }
            if(empty($error)){
                return"Thêm video đánh giá thành công";
            }
            return "Lỗi thêm video dòng".implode(",",$error);   
        }
    }

    class DAOBoNho{
        function thembonho($ketnoi, $masp,$bonho,$giathanh){
            $error=[];
            for($i = 1 ; $i <= 3 ; $i++){
                $sql = "insert into bonho(masp,bonho,gia)
                values('$masp','$bonho[$i]','$giathanh[$i]')";
                $query = mysqli_query($ketnoi,$sql);
                if(!$query){
                    $error[] = " ".$i;
                }
            }
            if(empty($error)){
                return "Thêm thông tin bộ nhớ thành công";
            }
            return "Lỗi bộ nhớ dòng".implode(",",$error);
        }
    }
?>