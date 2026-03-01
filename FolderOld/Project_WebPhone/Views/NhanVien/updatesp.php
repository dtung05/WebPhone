<?php
$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');
if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $masp = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $soluong = $_POST['soluong'];
    $danhmuc_id = $_POST['danhmuc_id'];

    $sql_update = "UPDATE sanpham 
                   SET tensp='$tensp', gia='$gia', mota='$mota', soluong='$soluong', danhmuc_id='$danhmuc_id' 
                   WHERE masp='$masp'";

    if (mysqli_query($ketnoi, $sql_update)) {
        echo "<script>alert('Cập nhật thành công!'); window.location='suasanpham.php';</script>";
        exit;
    } else {
        echo "Lỗi: " . mysqli_error($ketnoi) ;
    }
}

if (isset($_GET['masp'])) {
    $masp = $_GET['masp'];
    $sql = "SELECT * FROM sanpham WHERE masp='$masp'";
    $ketqua = mysqli_query($ketnoi, $sql);
    $sanpham = mysqli_fetch_assoc($ketqua);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Sửa sản phẩm</title>
<style>
    form {
        width: 400px;
        margin: 20px auto;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background: #f9f9f9;
    }
    label {
        display: block;
        margin-top: 10px;
    }
    input, textarea {
        width: 100%;
        padding: 6px;
        margin-top: 4px;
    }
    button {
        margin-top: 15px;
        padding: 8px 16px;
        background: green;
        color: white;
        border: none;
        border-radius: 4px;
    }
</style>
</head>
<body>

<h2 style="text-align:center">Sửa sản phẩm</h2>

<?php if (!empty($sanpham)) { ?>
<form method="POST">
    <input type="hidden" name="masp" value="<?php echo $sanpham['masp']; ?>">

    <label>Tên sản phẩm</label>
    <input type="text" name="tensp" value="<?php echo $sanpham['tensp']; ?>">

    <label>Giá</label>
    <input type="number" name="gia" value="<?php echo $sanpham['gia']; ?>">

    <label>Mô tả</label>
    <textarea name="mota"><?php echo $sanpham['mota']; ?></textarea>

    <label>Số lượng</label>
    <input type="number" name="soluong" value="<?php echo $sanpham['soluong']; ?>">

    <label>Mã danh mục</label>
    <input type="text" name="danhmuc_id" value="<?php echo $sanpham['danhmuc_id']; ?>">

    <button type="submit">Lưu thay đổi</button>
</form>
<?php } else { ?>
    <p style="text-align:center; color:red;">Không tìm thấy sản phẩm!</p>
<?php } ?>

</body>
</html>
