<?php
if (isset($_POST['sua'])) {
    $madanhmuc = $_POST['madanhmuc'];
    $tendanhmuc = $_POST['tendanhmuc'];
$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');
    if (!$ketnoi) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    $check = mysqli_query($ketnoi, "SELECT * FROM danhmuc WHERE danhmuc_id='$madanhmuc'");
    if (mysqli_num_rows($check) > 0) {

        $sql = "UPDATE danhmuc SET ten_danh_muc='$tendanhmuc' WHERE danhmuc_id='$madanhmuc'";
        if (mysqli_query($ketnoi, $sql)) {
            echo "<script>alert('Sửa danh mục thành công'); window.location.href='suadanhmuc.php';</script>";
        } else {
            echo "<script>alert('Có lỗi khi sửa danh mục'); window.location.href='suadanhmuc.php';</script>";
        }
    } else {
        echo "<script>alert('Không tìm thấy mã danh mục'); window.location.href='suadanhmuc.php';</script>";
    }
}

if (isset($_POST['xoa'])) {
    $madanhmuc = $_POST['madanhmuc'];

$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');
    if (!$ketnoi) {
        die ("Kết nối thất bại: " . mysqli_connect_error());
        }
    $check = mysqli_query($ketnoi, "SELECT * FROM danhmuc WHERE danhmuc_id='$madanhmuc'");
    if (mysqli_num_rows($check) > 0) {
        $sql = "DELETE FROM danhmuc WHERE danhmuc_id='$madanhmuc'";
        if (mysqli_query($ketnoi, $sql)) {
            echo "<script>alert('Xóa danh mục thành công'); window.location.href='suadanhmuc.php';</script>";
        } else {
            echo "<script>alert('Có lỗi khi xóa danh mục'); window.location.href='suadanhmuc.php';</script>";
        }
    } else {
        echo "<script>alert('Không tìm thấy mã danh mục cần xóa'); window.location.href='suadanhmuc.php';</script>";
    }


}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Sửa danh mục</title>
<link rel="stylesheet" href="/assets/css/themsp.css">
<link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>
<?php include  "../includes/header.php"?>
<hr>
<div style="display:flex;gap:10px;">
    <div style="width:15%;" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
        <ul>
            <li><a href="createsp.php">Thêm sản phẩm</a></li>
            <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
            <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
            <li><a href="suadanhmuc.php" style="color: white;background-color: rgba(236, 68, 68, 1); ">Sửa danh mục</a></li>
            <li><a href="donhang.php">Quản lý đơn hàng</a></li>
            <li><a href="baocao.php">Báo cáo doanh thu</a></li>
</ul>
    </div>

    <div style="flex:1;margin-left:30px" class="dangky">
        <h2>Sửa danh mục</h2>
        <form action="" method="post">
            <label for="">Mã danh mục</label>
            <input type="text" name="madanhmuc" placeholder="Nhập vào mã danh mục" required><br>
            <label for="">Tên danh mục mới</label>
            <input type="text" name="tendanhmuc" placeholder="Nhập vào tên mới" required><br>
            <button name='sua'>Sửa danh mục</button>
        </form>
        <h2>Xóa danh mục theo mã</h2>
        <form action="" method="post">
            <label for="">Mã danh mục</label>
            <input type="text" name="madanhmuc" placeholder="Nhập vào mã danh mục muốn xóa" required><br>
            <button name='xoa'>Xóa</button>
        </form>
    </div>
</div><?php include  "../includes/footer.php"?>
</body>
</html>
