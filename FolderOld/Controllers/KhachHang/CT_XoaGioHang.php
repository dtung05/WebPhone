<?php
include "../../Assets/php/conn.php";

if (!$ketnoi) {
   $_SESSION['thongbao'] = "Kết nối thất bại.";
   header("location: ../../index.php");
   exit();
}

$mataikhoan = $_SESSION['id'];


if (isset($_GET['masp'])) {
    $masp = mysqli_real_escape_string($ketnoi, $_GET['masp']);

    $sql = "DELETE FROM giohang WHERE mataikhoan = '$mataikhoan' AND masp = '$masp'";
    if (mysqli_query($ketnoi, $sql)) {
        $_SESSION['thongbao'] = "Xóa sản phẩm thành công";
        header("location: ../../Views/KhachHang/giohang.php");
        exit();
    } else {
        $_SESSION['thongbao'] = "Xóa sản phẩm thất bại, thử lại sau";
        header("location: ../../Views/KhachHang/giohang.php");
        exit();
    }
}
?>
