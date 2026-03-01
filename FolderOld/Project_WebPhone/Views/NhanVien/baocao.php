<?php 
include "../../Assets/php/conn.php";
include_once "../../Models/DAO/DAODonHang.php";
if( isset($_POST['gui'])){
        $thang = $_POST['thang'];
        $dao = new DAODonHang();
$thang = $_POST['thang'];


$thangtruoc = ($thang > 1) ? $thang - 1 : 12;


/* Tổng tiền */
$tongthanghientai = $dao->getTongTienTheoThang($ketnoi, $thang);
$tongthangtruoc = $dao->getTongTienTheoThang($ketnoi, $thangtruoc);


/* Chênh lệch % */
if($tongthangtruoc > 0){
$chenhlech = ($tongthanghientai - $tongthangtruoc) / $tongthangtruoc * 100;
}else if($tongthanghientai == 0 && $tongthangtruoc == 0){
$chenhlech = 0;
}else{
$chenhlech = 100;
}


/* Doanh thu theo danh mục */
$iphone = $dao->getTongTheoDanhMuc($ketnoi, $thang, 'iphone');
$xiaomi = $dao->getTongTheoDanhMuc($ketnoi, $thang, 'xiaomi');


if($tongthanghientai > 0){
$iphonee = $iphone / $tongthanghientai * 100;
$xiaomii = 100 - $iphonee;
}else{
$iphonee = 0;
$xiaomii = 0;
}


/* Danh sách đơn hàng */
$donhang = $dao->getChiTietDonHangTheoThang($ketnoi, $thang);
$numberdonhang = mysqli_num_rows($donhang);
}
?>


<html>
    <head>
        <title>
            Báo cáo doanh thu
        </title>
        <link rel="stylesheet" href="/Assets/css/admin.css">
        <style>
legend{
    border-radius: 5px 5px 0 0;
    border:1px solid black;
    padding: 10px;
    font-size: 20px;
    font-weight: 550;
    margin-bottom: 10px;
    background-color: #f1ececff;
    
}
select{
    padding:5px 10px;
}
option{
    padding:10px 10px
}
button{
    padding: 5px 10px;
}
.ma {
  width: 10%;
  display:flex;
  justify-content:center;
  align-items:center;
}
.soluong {
  width: 15%;
  display:flex;
  justify-content:center;
  align-items:center;
}
.ten {
  flex:1;
  display:flex;
  justify-content:center;
  align-items:center;
}
hr{
    margin-top: 0px;
    color: #a7a5a5ff;
}

         
        </style>
    </head>
    <body>
        

<?php include "../Includes/header.php";{ 
    
    ?>
    <main>
        <hr>
<div style="display:flex">
    <div style="width:15%" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
        <ul>
                <li><a href="createsp.php" >Thêm sản phẩm</a></li>
                <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
                <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
                <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
                <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
                <li><a href="donhang.php">Quản lý đơn hàng</a></li>
                <li><a href="baocao.php"style="color: white;background-color: rgba(236, 68, 68, 1); ">Báo cáo doanh thu</a></li>
        </ul>
    </div>
    <div style="flex:1;margin-left:40px" class="dangky">
        <h2 style="text-align:center">Doanh thu bán hàng</h2>
        <div style="display:flex; gap:15px;padding:0px 10px 10px 0px">
        <!-- Cột 1 -->
        <div style= "width:20%;border:1px solid;border-radius: 5px;">
        <form action="#" method="post">
            <legend>Tổng quan báo cáo: </legend>
            <div style="margin-left: 10px;">
            <select name="thang" id="thang">
                <option value="1">Tháng 1</option>
                <option value="2">Tháng 2</option>
                <option value="3">Tháng 3</option>
                <option value="4">Tháng 4</option>
                <option value="5">Tháng 5</option>
                <option value="6">Tháng 6</option>
                <option value="7">Tháng 7</option>
                <option value="8">Tháng 8</option>
                <option value="9">Tháng 9</option>
                <option value="10">Tháng 10</option>
                <option value="11">Tháng 11</option>
                <option value="12">Tháng 12</option>
            </select>
            <button name="gui">kiểm tra</button>
        </form>
            <div><?php if (isset($_POST['gui'])){?>
                <h3>Doanh thu của tháng <?php echo $_POST['thang']; ?></h3>
                <h4 style="display:inline"> Tổng doanh thu:</h4>
                <p style="display:inline"> <?php echo number_format($tongthanghientai, 0, ',', '.') . 'đ'; ?></p> <br><br>
                <h4 style="display:inline" >So với tháng trước: </h4> <p style="display:inline"><?php echo (int)$chenhlech?>%</p>
                <div style = "display:flex;gap:10px;margin-top:0px">
                    <div style="flex:1;">
                        <h4>Iphone</h4> <p> <?php echo number_format($iphone, 0, ',', '.') . 'đ';?></p>
                        <p><?php echo $iphonee?>%</p>
                    </div>
                    <div style="flex:1">
                        <h4>Xiaomi </h4> <p> <?php echo number_format($xiaomi, 0, ',', '.') . 'đ'; ?></p>
                        <p><?php echo $xiaomii?>%</p>
                    </div>
                </div>
                <?php } ?>
            </div>
            </div>
        </div>
        <!-- Cột 2 -->
         <?php if (isset($_POST['gui'])){?>
         <div style="flex:1;border:1px solid black;">
            <h3 style="margin-top :0px;font-size:20px;border:1px solid black;width:98%;padding:10px;background-color: #f1ececff;margin-bottom:0px">Chi tiết doanh thu </h3>
            
            <?php if($numberdonhang == 0 ){?>
                <h4 style="margin-left:5px;text-align:center">Không có đơn hàng nào trong tháng này</h4>
            <?php }else { ?>
                <!-- dh.id, mataikhoan,tensp,dh.soluong,dh.tongtien,dh.ngaydat -->
                <div style="display:flex;background-color: #f1ececff;margin-top:0px;height:70px">
                    <div class="ma" style="margin-left:10px">
                        <h4>Mã đơn hàng</h4>
                    </div>
                    <div class="ma">
                        <h4>Mã khách hàng</h4>
                    </div>
                    <div class="ten">
                        <h4>Tên sản phẩm</h4>
                    </div>
                    <div class="soluong">
                        <h4>Số lượng</h4>
                    </div>
                    <div class="soluong">
                        <h4>Tổng tiền</h4>
                    </div>
                    <div class="ma">
                        <h4>Ngày đặt</h4>
                    </div>
                </div>
                <hr>
                <?php while($rowbg = mysqli_fetch_assoc($donhang)){?>
                    <div style="display:flex;height: 45px;">
                        <div class="ma"  style="text-align:left;">
                            <p><?php echo $rowbg['id']?></p>
                        </div>
                        <div class="ma" >
                            <p><?php echo $rowbg['mataikhoan']?></p>
                        </div>
                        <div style="flex:1;display:flex;justify-content:left;align-items:center;">
                            <p><?php echo $rowbg['tensp']?></p>
                        </div>
                        <div class="soluong" >
                            <p><?php echo $rowbg['soluong']?></p>
                        </div>
                        <div class="soluong">
                            <p><?php echo $rowbg['tongtien']?></p>
                        </div>
                        <div class="ma">
                            <p><?php echo $rowbg['ngaydat']?></p>
                        </div>
                    </div>
                    <hr>
                <?php }?>
            <?php } ?>
            <?php } ?>
         </div>
         </div>
    </div>
</div>

    </main>
   <?php 
   
   
   include "../includes/footer.php";}
?> 
  </body>
</html>
