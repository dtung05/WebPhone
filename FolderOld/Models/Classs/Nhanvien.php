<?php 
class taikhoan{
    public function gettaikhoan($ketnoi){
        $sql1 = "SELECT * FROM taikhoan WHERE chucvu ='nguoidung'";
        $sql2 = "SELECT * FROM taikhoan WHERE chucvu ='admin'";
        $sql3 = "select * from taikhoan where chucvu = 'nhanvien'";
        $list['ketqua1'] = mysqli_query($ketnoi,$sql1);
        $list['ketqua2'] =  mysqli_query($ketnoi,$sql2);
        $list['ketqua3'] = mysqli_query($ketnoi,$sql3);
        return $list;
    }
    public function xoataikhoan($ketnoi,$id){
        mysqli_query($ketnoi,"delete from donhang where mataikhoan = '$id'");
        mysqli_query($ketnoi,"delete from giohang where mataikhoan = '$id'");
        mysqli_query($ketnoi,"delete from danhgia where mataikhoan = '$id'");
        $sql = "DELETE FROM taikhoan WHERE id = $id";
        return mysqli_query($ketnoi, $sql);
    }
 
}
?>

