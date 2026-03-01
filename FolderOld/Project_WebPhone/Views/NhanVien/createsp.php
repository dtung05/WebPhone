<?php
    include "../../Assets/php/conn.php";
    include "../../Controllers/ProductController.php";
    require_once "../../Service/ProductService.php";
    require_once "../../Models/Classs/Product.php";
    require_once "../../Models/Classs/ProductSpec.php";
    require_once "../../Models/DAO/DAOProductSpec.php";
    require_once "../../Models/DAO/DAOSanPham.php";
    require_once "../../Config/Database.php";
    $Database = new Database();
    $conn = $Database->connect();
    if(!$ketnoi){
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    if(isset($_POST['themsp'])){
        $Ct = new ProductController();
        $Ct->addProductController($conn);
    }
    $DAOImg = new DAOimg();
    $DAOVideoDanhGia = new DAOVideoDanhGia();
    $DAOBoNho = new DAOBoNho();
    if(isset($_POST['thongtin'])){
        // lấy thông tin từ POST
        $masp = $_POST['masp'];
        $img = [];
        for($i = 1 ; $i<= 5 ; $i++){
            $img[$i] = $_POST['img'.$i];
        }
        $video = []; $bonho = []; $giathanh = [];
        for($i = 3 ; $i <= 3 ;$i++){
            $video[$i] = $_POST['video'.$i];
            $bonho[$i] = $_POST['bonho'.$i];
            $giathanh[$i] = $_POST['giathanh'.$i];
        }
        // Gọi DAO thêm dữ liệu
        $check =[];
        $check[] = $DAOImg->themimg($ketnoi,$masp,$img);
        $check[] = $DAOVideoDanhGia->themvideo($ketnoi,$masp,$video);
        $check[] = $DAOBoNho->thembonho($ketnoi,$masp ,$bonho,$giathanh);
    }

?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý sản phẩm</title>
<link rel="stylesheet" href="/assets/css/themsp.css">
<link rel="stylesheet" href="/assets/css/admin.css">


</head>
<body >

<?php include  "../includes/header.php"?>
 <hr>
<div style="display:flex">
<div style="width:15%" class="menu">
    <h2 style="color: #333; text-align:center">Chức năng</h2>
<ul>
            <li><a href="createsp.php" style="color: white;background-color: rgba(236, 68, 68, 1); ">Thêm sản phẩm</a></li>
            <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
            <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
            <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
            <li><a href="donhang.php">Quản lý đơn hàng</a></li>
            <li><a href="baocao.php">Báo cáo doanh thu</a></li>
</ul>

</div>

 <div style="flex:1;margin-left:40px" class="dangky">
        <h2 style="text-align:center">Nhập thêm sản phẩm lên web</h2>
        
            <form action="" method="post" style="display:flex;gap:40px">
            <!-- Thông tin sản phẩm -->
            <div style="width:40%">
                <legend >Sản phẩm</legend>
                <label for="masp">Mã sản phẩm</label>
                <input type="text" name="masp" autofocus="masp" required />

                <label for="tensp">Tên sản phẩm</label>
                <input type="text" name="tensp" id="tensp" required/>

                <label for="gia">Giá sản phẩm</label>
                <input type="text" name="gia" id="gia" required/>

                <label for="mota">Ảnh mô tả</label>
                <textarea name="mota" id="mota" required></textarea>
                <div style = "display:flex; gap:25px;margin-top:15px">
                    <div style="flex:1">
                        <label for="soluong">Số lượng</label>
                        <input type="number" name="soluong" id="soluong" required/>
                    </div>
                    <div style="flex:1">
                        <label for="danhmuc_id">Mã danh mục</label>
                        <input type="text" name="danhmuc_id" id="danhmuc_id" required/>
                    </div>
                </div>  
            </div>
            <!-- Thông số sản phẩm -->
            <div style="flex:1;margin-right:20px">
                <legend>Thông số kỹ thuật</legend>
                <label for="manhinh">Màn hình</label>
                <input type="text" name="manhinh" id="manhinh">
                <label for="hedieuhanh">Hệ điều hành</label>
                <input type="text" name="hedieuhanh" id="hedieuhanh">
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                        <label for="camarasau">Camera sau</label>
                        <input type="text" name="camarasau" id="camarasau">
                    </div>
                    <div style="flex: 1;">
                        <label for="camaratruoc">Camera trước</label>
                        <input type="text" name="camaratruoc" id="camaratruoc">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                         <label for="cpu">CPU</label>
                        <input type="text" name="cpu" id="cpu">
                    </div>
                    <div style="flex: 1;">
                        <label for="ram">RAM</label>
                        <input type="text" name="ram" id="ram">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                         <label for="dungluongpin">Dung lượng pin</label>
                        <input type="text" name="dungluongpin" id="dungluongpin">
                    </div>
                    <div style="flex: 1;">
                       <label for="thesim">Thẻ SIM</label>
                        <input type="text" name="thesim" id="thesim">
                    </div>
                </div>
                <div style="display: flex;gap:25px">
                    <div style="flex:1">
                          <label for="thietke">Thiết kế</label>
                            <input type="text" name="thietke" id="thietke">
                    </div>
                    <div style="flex: 1;">
                       <p style="margin:10px 0 0 0; font-size:14px; color:gray;">
                        Kiểm tra lại thông tin trước khi thêm.</p>
                        <button name="themsp"style = "margin-top:0px">Thêm sản phẩm</button>
                    </div>
                </div>
            </div>
        </form>
                <h2>Thông số phụ</h2>
                <div style="width:97%;  gap:40px">
                   
                    <form action="" method="post" style="display:flex; gap:30px"> 
                        <!-- link ảnh url  -->
                        <div style="flex:1">
                            <legend>Hình ảnh sản phẩm </legend><br>
                            <label for="masp">Mã sản phẩm</label>
                            <input type="text" name="masp" id="masp" required placeholder="Nhập vào mã sản phẩm.">
                            <label for="url">Đường dẫn ảnh (URL)</label>
                            <input type="text" name="img1" id="img1" required placeholder="Mã url 1"><br><br>
                            <div style="display:flex;gap:10px">
                                <input type="text" name="img2" id="img2" required placeholder="Mã url 2" style="flex:1">
                                <input type="text" name="img3" id="img3" required placeholder="Mã url 3" style="flex:1">
                            </div><br>
                            <div style="width:100%;display:flex;gap:10px">
                                <input type="text" name="img4" id="img4" required placeholder="Mã url 4">
                                <input type="text" name="img5" id="img5" required placeholder="Mã url 5">
                            </div>
                        </div>
                        <!-- Link video đánh giá + Bộ nhớ  -->
                        <div style="flex:2">
                            <legend>Video đánh giá + Bộ nhớ + Giá tiền</legend><br>
                            <div style="width:100%; display:flex;gap:30px">
                                <!-- Link video đánh giá -->
                                <div style="flex: 1;">
                                    <label for="url">Đường dẫn video (URL)</label>
                                    <input type="text" name="video1" id="video1" required placeholder="Link video 1">
                                    <label for="">Đường dẫn 2</label>
                                    <input type="text" name="video2" id="video2" required placeholder="Link video 2"><br><br>
                                    <input type="text" name="video3" id="video3" required placeholder="Link video 3"><br>
                                </div>
                                <!-- Link bộ nhớ sản phẩm -->
                               <div style="flex:1">
                                  
                                    <div style="display:flex;gap:7%">
                                        <div style="width:44.5%">
                                            <label for="bonho">Bộ nhớ</label>
                                            <input type="text" name="bonho1" id="bonho1" required placeholder="VD: 64GB">
                                        </div>
                                         <div style="width:44%" >
                                            <label for="giathanh">Giá thành</label>
                                            <input type="number" name="giathanh1" id="giathanh1" required placeholder="Giá tiền...">
                                        </div>
                                    </div><label for="">Bộ nhớ</label>
                                    <div style="display:flex;gap:10px">                   
                                            <input type="text" name="bonho2" id="bonho2" required placeholder="VD: 128GB">
                                            <input type="number" name="giathanh2" id="giathanh2" required placeholder="Giá tiền...">
                                    </div><br>
                                    <div style="display:flex;gap:10px">
                                            <input type="text" name="bonho3" id="bonho3" required placeholder="VD: 512GB">                    
                                            <input type="number" name="giathanh3" id="giathanh3" required placeholder="Giá tiền...">
                                    </div>
                               </div>                        
                            </div>
                            <input type="submit" value="Thêm thông tin" name="thongtin">
                        </div>
                    </form> 
                </div>
                 <?php  include "../../Views/Includes/thongbao.php"; ?>
            </div>
    </div>
</div>
<?php include  "../includes/footer.php"?>
</body>
</html>
