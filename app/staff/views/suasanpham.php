<?php
$ketnoi = mysqli_connect('localhost','root','','webphone');

if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$sql = 'SELECT * FROM sanpham';
$ketqua = mysqli_query($ketnoi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý sản phẩm</title>
<link rel="stylesheet" href="/Assets/css/admin.css">
<style>
    .row {
        display: flex;
        width: 95%;
        border-bottom: 1px solid #ccc;
        padding: 8px 0;
        align-items: center;
    }
    .row div {
        padding: 0 5px;
        word-break: break-word;
    }
    .row:hover {
        background: #f9f9f9;
    }
    .header-row {
        font-weight: bold;
        background: #eee;
    }
    .btn-edit {
        color: white;
        background: green;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
    }
    .btn-edit:hover {
        background: darkgreen;
    }
</style>
</head>
<body>

<?php include  "../includes/header.php"?>
<hr>
<div style="display:flex">
    <div style="width:15%" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
        <ul>
            <li><a href="createsp.php" >Thêm sản phẩm</a></li>
            <li><a href="suasanpham.php"style="color: white;background-color: rgba(236, 68, 68, 1);">Sửa sản phẩm</a></li>
            <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
            <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
            <li><a href="donhang.php">Quản lý đơn hàng</a></li>
            <li><a href="baocao.php">Báo cáo doanh thu</a></li>
</ul>
    </div>

    <div style="flex:1;margin-left:40px">
        <h2 style="text-align:center">Danh mục sản phẩm</h2>
        <div class="row header-row">
            <div style="width:15%">Mã sản phẩm</div>
            <div style="width:25%">Tên sản phẩm</div>
            <div style="width:10%">Giá</div>
            <div style="width:20%">Mô tả</div>
            <div style="width:10%">Số lượng</div>
            <div style="width:10%">Mã danh mục</div>
            <div style="width:10%">Sửa</div>
        </div>
        <?php while($row = mysqli_fetch_assoc($ketqua)) { ?>
        <div class="row">
            <div style="width:15%"><?php echo $row['masp']; ?></div>
            <div style="width:25%"><?php echo $row['tensp']; ?></div>
            <div style="width:10%"><?php echo number_format($row['gia'],0,',','.'); ?> đ</div>
            <div style="width:20%"><?php echo $row['mota']; ?></div>
            <div style="width:10%"><?php echo $row['soluong']; ?></div>
            <div style="width:10%"><?php echo $row['danhmuc_id']; ?></div>
            <div style="width:10%">
                <a class="btn-edit" href="updatesp.php?masp=<?php echo $row['masp']; ?>">Sửa</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include  "../includes/footer.php"?>
</body>
</html>
