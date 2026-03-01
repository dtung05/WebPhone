<?php

include "../includes/header.php";

if(!isset($_SESSION['id'])){
    echo "<p>Bạn cần đăng nhập để xem đơn hàng</p>";
    exit;
}

$mataikhoan = $_SESSION['id'];
$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');
if(!$ketnoi) die("Kết nối thất bại: ".mysqli_connect_error());

$sql = "SELECT dh.id, sp.tensp, sp.mota, dh.gia, dh.soluong, dh.tongtien,
               dh.ngaydat, dh.trangthai, dh.diachi, dh.sdt
        FROM donhang AS dh
        JOIN sanpham AS sp ON dh.masp = sp.masp
        WHERE dh.mataikhoan = $mataikhoan
        ORDER BY dh.ngaydat DESC";
$result = mysqli_query($ketnoi, $sql);
?>

<main style="width:70%; margin-left:15%; font-family: Arial, sans-serif;">
    <div style="display:flex; justify-content: space-between; margin-bottom:20px;">
        <a href="/">Trang chủ</a>
        <h3>Đơn hàng của bạn</h3>
        <a href="/pages/giohang.php">Giỏ hàng</a>
    </div>

<?php
if(mysqli_num_rows($result) > 0){
    echo '<div class="donhang-header" style="display:flex; font-weight:bold; padding:10px 0;">
            <div style="flex:2">Sản phẩm</div>
            <div style="flex:1">Đơn giá</div>
            <div style="flex:1">Số lượng</div>
            <div style="flex:1">Tổng tiền</div>
            <div style="flex:1">Ngày đặt</div>
            <div style="flex:1">Trạng thái</div>
          </div>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="donhang-item" style="display:flex; padding:10px 0; border-top:1px solid #ccc;">
                <div style="flex:2; display:flex; align-items:center;">
                    <img src="'.$row['mota'].'" alt="'.$row['tensp'].'" style="width:60px; height:auto; margin-right:10px;">
                    <p>'.$row['tensp'].'</p>
                </div>
                <div style="flex:1; display:flex; align-items:center;">'.number_format($row['gia'],0,',','.').'đ</div>
                <div style="flex:1; display:flex; align-items:center;">'.$row['soluong'].'</div>
                <div style="flex:1; display:flex; align-items:center;">'.number_format($row['tongtien'],0,',','.').'đ</div>
                <div style="flex:1; display:flex; align-items:center;">'.$row['ngaydat'].'</div>
                <div style="flex:1; display:flex; align-items:center;">'.$row['trangthai'].'</div>
              </div>';
    }
}else{
    echo '<p>Hiện tại bạn chưa có đơn hàng nào.</p>
          <a href="/index.php" style="display:inline-block; padding:10px 20px; background:#c82333; color:#fff; border-radius:5px; text-decoration:none;">Về trang chủ</a>';
}
?>
</main>

<?php include "../includes/footer.php"; ?>
