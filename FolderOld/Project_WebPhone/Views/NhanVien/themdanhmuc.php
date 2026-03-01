<?php
if(isset($_POST['gui'])){
$madanhmuc = $_POST['madanhmuc'];
$tendanhmuc= $_POST['tendanhmuc'];

$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');

if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$sql = "insert into danhmuc
        values('$madanhmuc','$tendanhmuc')";
if(mysqli_query($ketnoi,$sql)){
    echo "<script>alert('Thêm danh mục thành công'); window.location.href='themdanhmuc.php';</script>";
}else{
    echo "<script> alert('Thêm danh mục thất bại, hãy thử lại');window.location.href='themdanhmuc.php';</script>";
}
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý sản phẩm</title>
<link rel="stylesheet" href="/assets/css/themsp.css">
<link rel="stylesheet" href="/assets/css/admin.css">
<style>
    
</style>
</head>
<body>

<?php include  "../includes/header.php"?>
<hr>
<div style="display:flex;gap:10px;">
    <div style="width:15%;" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
        <ul>
            <li><a href="createsp.php" >Thêm sản phẩm</a></li>
            <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
            <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
            <li><a href="themdanhmuc.php"style="color: white;background-color: rgba(236, 68, 68, 1); ">Thêm danh mục</a></li>
            <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
            <li><a href="donhang.php">Quản lý đơn hàng</a></li>
            <li><a href="baocao.php">Báo cáo doanh thu</a></li>
</ul>
    </div>

    <div style="flex:1;margin-left:30px" class="dangky">
        <h2>Thêm danh mục</h2>
        <form action="" method="post">
            <label for="">Mã danh mục</label>
            <input type="text" name="madanhmuc" placeholder="Nhập vào mã danh mục" required><br>
            <label for="">Tên danh mục</label>
            <input type="text" name="tendanhmuc" placeholder="Nhập vào tên danh mục " required><br>
            <button name= 'gui'>Thêm danh mục</button>
        </form>
    </div>
</div>
<?php include  "../includes/footer.php"?>
</body>
</html>
