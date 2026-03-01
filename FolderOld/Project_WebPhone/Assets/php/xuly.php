<?php
session_start();


if(isset($_POST['pushdata'])){
  $ketnoi = mysqli_connect('localhost','root','','webphone');
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $taikhoan = $_POST['taikhoan'];
    $matkhau1 = $_POST['matkhau1'];
    $matkhau2 = $_POST['matkhau2'];

    if(!empty($hoten) && !empty($email) && !empty($taikhoan) && !empty($matkhau1) && $matkhau1 === $matkhau2){
        $sql = "INSERT INTO taikhoan(hoten,email,taikhoan,matkhau)
                VALUES('$hoten','$email','$taikhoan','$matkhau1')";
        if (mysqli_query($ketnoi, $sql)) {
            echo "<script> window.location='../../index.php';</script>";
            exit;
        } else {
            echo "<script>alert('❌ Lỗi: ".mysqli_error($ketnoi)." window.location='../../index.php';');</script>";
        }
    } else {
        echo "<script>alert('❌ Nhập đúng và đủ thông tin!');</script>";
    }

}




if(isset($_POST['dangxuat'])){
    session_destroy(); 
    echo "<script> window.location='../../index.php';</script>";
    exit;
}
?>
