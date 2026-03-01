<?php
$ketnoi = mysqli_connect('localhost','root','','webphone');
include "../Class_Dao/Nhanvien.php";
$dao = new taikhoan();

if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $ketqua = $dao->xoataikhoan($ketnoi,$id);
    ;
    if($ketqua){
        echo "<script>
                alert('Xóa tài khoản thành công!');
                window.location.href='quanlytaikhoan.php';
              </script>";
    } else {
        echo "<script>
                alert('Xóa thất bại: " . mysqli_error($ketnoi) . "');
                window.location.href='quanlytaikhoan.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Không tìm thấy ID tài khoản để xóa!');
            window.location.href='quanlytaikhoan.php';
          </script>";
}
?>
