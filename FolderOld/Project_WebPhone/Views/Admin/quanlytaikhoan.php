
<?php 
    include  "../includes/header.php";
    include "../Class_Dao/Nhanvien.php";
    $dao = new taikhoan();
    $check = false;
    $list = $dao->gettaikhoan($ketnoi);
    $ketqua1 = $list['ketqua1'];
    $ketqua2 = $list['ketqua2'];
    $ketqua3 = $list['ketqua3'];
?>


<html>
<head>
    <title>Trang chủ nhân viên</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/quanlynhanvien.css">
</head>
<body>


<div style="display:flex">
    <!-- MENU -->
    <div style="width:15%" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
        <ul>
            <li><a href="quanlytaikhoan.php" style="color: white;background-color: rgba(236, 68, 68, 1); ">Quản lý tài khoản</a></li>
            <li><a href="themnhanvien.php"> Thêm tài khoản NV</a></li>
        </ul>
    </div>


    <div style="flex:1;margin-left:40px;" >
        <h2 style="text-align:center">Quản lý tài khoản</h2>
        <h3 style="text-align:left">Danh mục tài khoản của người dùng</h3>
        <div class="row header-row">
            <div style="width:10%">Mã id</div>
            <div style="width:15%">Họ và Tên</div>
            <div style="width:25%">Gmail</div>
            <div style="width:15%">Tài khoản</div>
            <div style="width:15%">Mật khẩu</div>
            <div style="width:10%">Chức vụ</div>
            <div style="width:10%">Xóa</div>
        </div>
        <?php while($row = mysqli_fetch_assoc($ketqua1)) { ?>
        <div class="row">
            <div style="width:10%"><?php echo $row['id']; ?></div>
            <div style="width:15%"><?php echo $row['hoten']; ?></div>
            <div style="width:25%"><?php echo $row['email']; ?></div>
            <div style="width:15%"><?php echo $row['taikhoan']; ?></div>
            <div style="width:15%"><?php echo $row['matkhau']; ?></div>
            <div style="width:10%"> Người dùng</div>
            <div style="width:10%">
                <a class="btn-delete" href="xoataikhoan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');">Xóa</a>
            </div>
        </div>
        <?php } ?>

        <h3 style="margin-top:40px;text-align:left">Danh mục tài khoản của Admin</h3>
        <div class="row header-row">
            <div style="width:10%">Mã id</div>
            <div style="width:15%">Họ và Tên</div>
            <div style="width:25%">Gmail</div>
            <div style="width:15%">Tài khoản</div>
            <div style="width:15%">Mật khẩu</div>
            <div style="width:10%">Chức vụ</div>
            <div style="width:10%">Xóa</div>
        </div>

        <?php while($row = mysqli_fetch_assoc($ketqua2)) { ?>
        <div class="row">
            <div style="width:10%"><?php echo $row['id']; ?></div>
            <div style="width:15%"><?php echo $row['hoten']; ?></div>
            <div style="width:25%"><?php echo $row['email']; ?></div>
            <div style="width:15%"><?php echo $row['taikhoan']; ?></div>
            <div style="width:15%"><?php echo $row['matkhau']; ?></div>
            <div style="width:10%">admin</div>
            <div style="width:10%">
                <a class="btn-delete" href="xoataikhoan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');">Xóa</a>
            </div>
        </div>
        <?php } ?>
        <h3 style="margin-top:40px;text-align:left">Danh mục tài khoản của nhân viên</h3>
        <div class="row header-row">
            <div style="width:10%">Mã id</div>
            <div style="width:15%">Họ và Tên</div>
            <div style="width:25%">Gmail</div>
            <div style="width:15%">Tài khoản</div>
            <div style="width:15%">Mật khẩu</div>
            <div style="width:10%">Chức vụ</div>
            <div style="width:10%">Xóa</div>
        </div>

        <?php while($row = mysqli_fetch_assoc($ketqua3)) { ?>
        <div class="row">
            <div style="width:10%"><?php echo $row['id']; ?></div>
            <div style="width:15%"><?php echo $row['hoten']; ?></div>
            <div style="width:25%"><?php echo $row['email']; ?></div>
            <div style="width:15%"><?php echo $row['taikhoan']; ?></div>
            <div style="width:15%"><?php echo $row['matkhau']; ?></div>
            <div style="width:10%">Nhân viên</div>
            <div style="width:10%">
                <a class="btn-delete" href="xoataikhoan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');">Xóa</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<br>
<?php include  "../includes/footer.php"?>
</body>
</html>
