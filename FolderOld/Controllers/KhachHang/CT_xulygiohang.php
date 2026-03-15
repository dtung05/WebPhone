<?php 
// controll này có tác dụng thêm sản phẩm vào giỏ
if (isset($_POST['giohang'])) {
    $gia      = $_POST['bonho']; 
    $soluong  = (int)$_POST['soluong']; // ép kiểu về int
    $masp     = mysqli_real_escape_string($ketnoi, $_POST['masp']);   
    $idkh     = $_SESSION['id'] ?? null;
    if (!$idkh) { // check điều kiện bắt buộc phải đăng nhập mới có thể thêm sản phẩm vào giỏ hàng
        $_SESSION['thongbao'] = "Bạn cần đăng nhập để mua sắm.";
        header("location: ../../index.php");
        exit;
    }
    // lấy ra số lượng sản phẩm thực trong database để check nếu không hợp 
    //lệ in thông báo và kết thúc
    $sanpham = $DAOSP->get1sanpham($ketnoi,$masp);
    $soluongsp = $sanpham['soluong'];
    if($soluong <= 0 || $soluong > $soluongsp){
        $_SESSION['thongbao'] = "Số lượng sản phẩm không hợp lệ.";
        header("location: sanpham.php?masp=$masp");
        exit;
    }
    $tongtien = $gia * $soluong; // tính tổng tiền cho lần thêm vào giỏ
    // nếu trong giỏ tồn tại sản phẩm thì tăng số lượng
    $result = $DAOGH->getlistgiohang($ketnoi,$masp,$idkh);
    if(mysqli_num_rows($result) > 0 ) {
        $row = mysqli_fetch_assoc($result);
        $new_soluong = $row['soluong'] + $soluong;
        if($new_soluong > $soluongsp){ // check số lượng sau khi thêm
            $_SESSION['thongbao'] = "Số lượng trong giỏ vượt quá số lượng trong kho hàng.";
            header("location: sanpham.php?masp=$masp");
            exit();
        }
        $new_tongtien = $row['gia'] * $new_soluong;
        $_SESSION['thongbao'] = $DAOGH->updategiohang($ketnoi,$masp,$new_soluong,$new_tongtien,$idkh);
        header("location: sanpham.php?masp=$masp");
        exit();
    } else {// nếu trong giỏ không có thì thêm trực tiếp sản phẩm vào
        $_SESSION['thongbao'] = $DAOGH->insertgiohang($ketnoi,$masp,$idkh,$gia,$soluong,$tongtien);
        header("location: sanpham.php?masp=$masp");
        exit();
    }
}
// Đoạn mã lấy thông tin đơn hàng
// Xử lý đặt hàng trong giỏ hàng
if(isset($_POST['dathang'])){ // lấy ra thông tin đơn hàng
    $magiohang = $_POST['magiohang'];
    $row = $DAOGH->getgiohang($ketnoi,$magiohang);
    $masp = $row['masp'];
    $gia = $row['gia'];
    $soluong = $row['soluong'];
    $tongtien = $row['tongtien'];
}
//Xử lý đặt hàng trong trang sản phẩm
if(isset($_POST['dathang1'])){ 
    if (!isset($_SESSION['id'])) {
        $_SESSION['thongbao'] = "Cần đăng nhập để mua hàng";
        echo "<script> window.location.href='../../index.php'; </script>";
        exit;
    }  
    $manguoidung = $_SESSION['id'];
    $masp = $_POST['masp'];
    $gia = $_POST['bonho']; 
    $soluong = $_POST['soluong'];
    $tongtien = (int)$gia * (int)$soluong;
    $row = $DAOSP->get1sanpham($ketnoi,$masp);
    if($soluong > $row['soluong']){
        $_SESSION['thongbao'] = "Số lượng mua không hợp lệ.";
        header( "location: sanpham.php?masp=$masp");
        exit();
    }
}
if(isset($_POST['xacnhan'])){
    $masp        = $_POST['masp'];
    $mataikhoan  = $_POST['mataikhoan'];
    $gia         = $_POST['gia'];
    $soluong     = $_POST['soluong'];
    $tongtien    = $_POST['tongtien'];
    $diachi      = $_POST['diachi'];
    $sdt         = $_POST['sdt'];

    $capnhat = " update sanpham set soluong = soluong - $soluong where masp = '$masp'";

    $sql = "INSERT INTO donhang (mataikhoan, masp, gia, soluong, tongtien, diachi, sdt, ngaydat, trangthai)
            VALUES ('$mataikhoan','$masp','$gia','$soluong','$tongtien',
                    '$diachi','$sdt',NOW(),'choxacnhan')";

    if(mysqli_query($ketnoi, $sql)){
        $_SESSION['thongbao'] = "Đặt hàng thành công";
        mysqli_query($ketnoi,$capnhat);
        // mysqli_query($ketnoi, "DELETE FROM giohang WHERE id='$magiohang'");
        echo "<script>window.location.href='donhang.php';</script>";
    } else {
        echo "<script>alert('❌ Lỗi khi đặt hàng: ".mysqli_error($ketnoi)."');</script>";
    }
}
?>