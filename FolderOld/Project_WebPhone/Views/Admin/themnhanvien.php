
<!-- Sửa sau -->
<?php include  "../includes/header.php";
if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}
if(isset($_POST['pushdata'])){
   $hoten = $_POST['hoten'];
   $email = $_POST['email'];
   $taikhoan = $_POST['taikhoan'];
   $matkhau1 = $_POST['matkhau1'];
   $matkhau2 = $_POST['matkhau2'];
   $chucvu = $_POST['chucvu'];
    if(!empty($_POST['hoten']) && !empty($_POST['email']) && 
            !empty($_POST['taikhoan']) && !empty($_POST['matkhau1']) &&
        $_POST['matkhau1'] === $_POST['matkhau2'] ){
        $sql = "insert into taikhoan(hoten,email,taikhoan,matkhau,chucvu)
                Values('$hoten','$email','$taikhoan','$matkhau1','$chucvu')
                ";
    if (mysqli_query($ketnoi, $sql)) {
            echo "<script>
                alert('Thêm tài khoản thành công!');
                window.location.href='quanlytaikhoan.php';
              </script>";
        } else {
            echo "<script>
                alert('Thêm tài khoản bị gặp sự số, vui lòng thử lại sau');
                window.location.href='themnhanvien.php';
              </script>";
        }
    }
}?>


<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thêm tài khoản nhân viên</title>
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="../assets/css/themtaikhoannhanvien.css">
</head>
<body >
<div style="display:flex">
<div style="width:15%" class="menu">
    <h2 style="color: #333; text-align:center">Chức năng</h2>
 <ul>
            <li><a href="quanlytaikhoan.php">Quản lý tài khoản</a></li>
            <li><a href="themnhanvien.php" style="color: white;background-color: rgba(236, 68, 68, 1); " > Thêm tài khoản NV</a></li>
        </ul>
</div>
<div style="flex:1;margin-left:40px" class="dangky">
    <h2 style="margin-left:20px;text-align:center">Tạo tài khoản cho nhân viên</h2>
   <form action="" id="dangky" method="post">
      <legend>Đăng ký tài khoản</legend>

      <br /><br />
      <label for="hoten">Họ và Tên: </label>
      <input type="text" name="hoten" id="hoten" placeholder="Họ và tên" required/><br />
      <label for="email">Email: </label>
      <input type="email" name="email" id="email" placeholder="Email" required/><br />
      <label for="taikhoan">Tên tài khoản: </label>
      <input type="text" name="taikhoan" id="taikhoan" placeholder="Tên tài khoản" required/><br />
      <label for="matkhau">Mật khẩu: </label>
      <input type="password" name="matkhau1" id="matkhau1" placeholder="Mật khẩu" required /><br />
      <label for="xacnhan">Xác nhận: </label>
      <input type="password" name="matkhau2" id="matkhau2" placeholder="Xác nhận lại mật khẩu" required/><br />
      <label for="chucvu" style="display:inline" >Chức vụ: </label>
      <select name="chucvu" id="chucvu">
        <option value="admin">Admin</option>
        <option value="nguoidung">Khách Hàng</option>
        <option value="nhanvien" selected>Nhân viên</option>
      </select>
      <p style="color: #444; font-size:12px">Kiểm tra kỹ lại thông tin trước khi đăng ký</p>
      <button name = "pushdata">Đăng ký</button>
      
    </form>
</div>
</div>     
<?php include  "../includes/footer.php"?>
</body>
</html>
