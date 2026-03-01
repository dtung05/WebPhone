
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý sản phẩm</title>
<link rel="stylesheet" href="/assets/css/admin.css">
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
        background: red;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
    }
    .btn-edit:hover {
        background: darkred;
    }
</style>
</head>
<body>

<?php include  "../includes/header.php";
if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$sql = 'SELECT * FROM sanpham';
$ketqua = mysqli_query($ketnoi,$sql);
?>
<hr>
<div style="display:flex; gap:10px">
    <div style="width:15%" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
                <ul>
            <li><a href="createsp.php" >Thêm sản phẩm</a></li>
            <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
            <li><a href="xoasanpham.php"style="color: white;background-color: rgba(236, 68, 68, 1);">Xóa sản phẩm</a></li>
            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
            <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
            <li><a href="donhang.php">Quản lý đơn hàng</a></li>
            <li><a href="baocao.php">Báo cáo doanh thu</a></li>
</ul>
    </div>

    <div style="flex:1;margin-left:40px" >
        <h2 style="text-align:center">Danh mục sản phẩm</h2>
        <div>
            <form action="" method="get" >
                <input type="text" name = 'masp1' placeholder="Nhập vào mã sản phẩm muốn xóa" style="width:60%;padding:10px; margin-left:20%">
                <button style="padding: 10px;  border-radius: 5px; background:#990b08;color:#f9f9f9">Xóa</button>
            </form>
        </div>
        <hr>
        <div class="row header-row">
            <div style="width:15%">Mã sản phẩm</div>
            <div style="width:25%">Tên sản phẩm</div>
            <div style="width:10%">Giá</div>
            <div style="width:20%">Mô tả</div>
            <div style="width:10%">Số lượng</div>
            <div style="width:10%">Mã danh mục</div>
            <div style="width:10%">Xóa</div>
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
                <a class="btn-edit" href="?masp1=<?php echo $row['masp']; ?>">Xóa</a>
            </div>
        </div>
        <?php } ?>
    </div>

</div>
<?php include  "../includes/footer.php"?>
</body>
</html>
<?php

if (isset($_GET['masp1'])) {
    $masp = $_GET['masp1'];
$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');
    if (!$ketnoi) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    $check = mysqli_query($ketnoi, "SELECT masp FROM sanpham WHERE masp='$masp'");
    if (mysqli_num_rows($check) == 0) {
    echo "<script>alert('Không tìm thấy sản phẩm cần xóa'); window.location.href='xoasanpham.php';</script>";
    exit;
    }
    mysqli_query($ketnoi,"delete from donhang where masp = '$masp'");
    mysqli_query($ketnoi,"delete from giohang where masp = '$masp'");
    $sq = "delete from danhgia where masp = '$masp'";
    mysqli_query($ketnoi,$sq);
    $sql = "delete from videodanhgia where masp = '$masp'";
    mysqli_query($ketnoi,$sql);
    $sql1 = "DELETE FROM thongsokythuat WHERE masp='$masp'";
    mysqli_query($ketnoi, $sql1);
    $sql2 = "DELETE FROM hinhanh WHERE masp='$masp'";
    mysqli_query($ketnoi, $sql2);
    $sql3 = "delete from bonho where masp = '$masp'";
    mysqli_query($ketnoi, $sql3);
    $sql = "DELETE FROM sanpham WHERE masp='$masp'";
    if (mysqli_query($ketnoi, $sql)) {
        echo "<script>alert('Xóa sản phẩm thành công'); window.location.href='xoasanpham.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($ketnoi);
    }
}
?>