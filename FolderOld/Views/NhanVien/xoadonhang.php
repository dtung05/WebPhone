<?php
$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');
if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM donhang WHERE id = $id";

    if(mysqli_query($ketnoi, $sql)){
        echo "<script>window.location.href='donhang.php';</script>";
    } else {
        echo "<script>alert(' Lỗi khi xóa đơn: ".mysqli_error($ketnoi)."'); window.location.href='donhang.php';</script>";
    }
} else {
    echo "<script>alert(' Không có ID đơn hàng!'); window.location.href='donhang.php';</script>";
}
?>