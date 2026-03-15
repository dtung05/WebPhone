<?php
$ketnoi = mysqli_connect('localhost','didongvi_nguoidung','nguoidung','didongvi_webphone');

if(!$ketnoi){
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$madh = intval($_GET['id']);
$sql = "select donhang.id, mataikhoan, donhang.masp, donhang.gia, donhang.soluong, tongtien, ngaydat, trangthai, diachi, sdt,
               sanpham.tensp, taikhoan.hoten
        from donhang
        join taikhoan ON donhang.mataikhoan = taikhoan.id
        join sanpham ON sanpham.masp = donhang.masp
        where donhang.id = $madh";

$ketqua = mysqli_query($ketnoi, $sql);

if(mysqli_num_rows($ketqua) < 1){ 
    echo "<script>alert('Không tìm thấy đơn hàng với mã: $madh'); window.location.href='donhang.php';</script>";
    exit;
}
$row = mysqli_fetch_assoc($ketqua);
include "../includes/header.php";
?>

<style>

.suadh {
    max-width: 600px;      
    margin: 20px auto;    
    padding: 15px;           
    border: 1px solid #ccc; 
    border-radius: 8px;      
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
}

.suadh label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
    font-size: 14px;
}


.suadh input[type="text"],
.suadh input[type="number"],
.suadh select {
    width: 100%;
    padding: 10px 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}


.suadh input[readonly] {
    background-color: #e9e9e9;
    color: #555;
}



.suadh .nutnhom {
    display: flex;
    gap: 10px;     
    margin-top: 10px;
}


.suadh .nutnhom button {
    padding: 10px 20px;
    background-color: #be0707ff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.2s;
}

.suadh .nutnhom button:hover {
    background-color: #660505ff;
}


.suadh .nutnhom a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6c757d;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: 0.2s;
}

.suadh .nutnhom a:hover {
    background-color: #456b88ff;
}

</style>

<div class="suadh">
    <h2 style="text-align:center;">Sửa đơn hàng có mã id: <?php echo $row['id']; ?></h2>
    <form action="" method="post" style="max-width:600px;margin:auto;">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Họ tên khách:</label>
        <input type="text" value="<?php echo $row['hoten']; ?>" readonly style="width:100%;margin-bottom:10px;">
        <label>Tên sản phẩm:</label>
        <input type="text" value="<?php echo $row['tensp']; ?>" readonly style="width:100%;margin-bottom:10px;">
        <label>Địa chỉ:</label>
        <input type="text" name="diachi" value="<?php echo $row['diachi']; ?>" style="width:100%;margin-bottom:10px;" required>
        <label>Số điện thoại:</label>
        <input type="text" name="sdt" value="<?php echo $row['sdt']; ?>" style="width:100%;margin-bottom:10px;" required>
        <label>Số lượng:</label>
        <input type="number" value="<?php echo $row['soluong']; ?>" readonly style="width:100%;margin-bottom:10px;">
        <label>Tổng tiền:</label>
        <input type="text" value="<?php echo number_format($row['tongtien'],0,',','.').'₫'; ?>" readonly style="width:100%;margin-bottom:10px;">
        <label>Trạng thái:</label>
        <select name="trangthai" style="width:100%;margin-bottom:20px;" required>
            <option value="choxacnhan" <?php if($row['trangthai']=='choxacnhan') echo 'selected'; ?>>Chờ xác nhận</option>
            <option value="danggiao" <?php if($row['trangthai']=='danggiao') echo 'selected'; ?>>Đang giao</option>
            <option value="hoanthanh" <?php if($row['trangthai']=='hoanthanh') echo 'selected'; ?>>Hoàn tất</option>
            <option value="huy" <?php if($row['trangthai']=='huy') echo 'selected'; ?>>Hủy</option>
        </select>
        <div class="nutnhom">
        <button type="submit" name="push">Cập nhật</button>
        <a href="donhang.php">Quay lại</a>
        </div>
    </form>
</div>
<?php
include "../includes/footer.php";
if(isset($_POST['push'])){ 


if(isset($_POST['id'], $_POST['diachi'], $_POST['sdt'], $_POST['trangthai'])){
    $id = $_POST['id'];
    $diachi =$_POST['diachi'];
    $sdt =  $_POST['sdt'];
    $trangthai = $_POST['trangthai'];
    $sql = "update donhang 
            set diachi = '$diachi', sdt = '$sdt', trangthai = '$trangthai' 
            where id = $id";

    if(mysqli_query($ketnoi, $sql)){
        echo "<script> window.location.href='donhang.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật: ".mysqli_error($ketnoi)."'); history.back();</script>";
    }
} else {
    echo "<script>alert('Dữ liệu không hợp lệ!'); history.back();</script>";
}
}
?>
