<?php 
class DAODonHang{
    function getgiohang($ketnoi,$id){
        $sql = "SELECT dh.id AS dh_id, dh.masp, sp.tensp, sp.mota, dh.gia, dh.soluong, dh.tongtien,
               dh.ngaydat, dh.trangthai, dh.diachi, dh.sdt
        FROM donhang AS dh
        JOIN sanpham AS sp ON dh.masp = sp.masp
        WHERE dh.mataikhoan = $id
        ORDER BY dh.ngaydat DESC";
        return mysqli_query($ketnoi,$sql);
    }


public function getDonHangTheoThang($ketnoi, $thang){
$sql = "SELECT * FROM donhang
WHERE trangthai='hoanthanh' AND MONTH(ngaydat)=$thang";
return mysqli_query($ketnoi, $sql);
}


public function getTongTienTheoThang($ketnoi, $thang){
$sql = "SELECT SUM(tongtien) AS tong
FROM donhang
WHERE trangthai='hoanthanh' AND MONTH(ngaydat)=$thang";
$kq = mysqli_query($ketnoi, $sql);
$row = mysqli_fetch_assoc($kq);
return $row['tong'] ?? 0;
}


public function getTongTheoDanhMuc($ketnoi, $thang, $danhmuc){
$sql = "SELECT SUM(dh.tongtien) AS tong
FROM donhang dh
JOIN sanpham sp ON dh.masp = sp.masp
WHERE dh.trangthai='hoanthanh'
AND MONTH(dh.ngaydat)=$thang
AND sp.danhmuc_id='$danhmuc'";
$kq = mysqli_query($ketnoi, $sql);
$row = mysqli_fetch_assoc($kq);
return $row['tong'] ?? 0;
}


public function getChiTietDonHangTheoThang($ketnoi, $thang){
$sql = "SELECT dh.id, mataikhoan, tensp, dh.gia, dh.soluong, dh.tongtien, dh.ngaydat
FROM donhang dh
JOIN sanpham sp ON sp.masp = dh.masp
WHERE dh.trangthai='hoanthanh' AND MONTH(dh.ngaydat)=$thang";
return mysqli_query($ketnoi, $sql);
}
}
?>