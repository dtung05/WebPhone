<?php 
    class DAOGioHang{
    //lấy ra list danh sách trong giỏ hàng theo mã
    function getlistgiohang($ketnoi, $masp,$idkh){
        $check = "SELECT * FROM giohang 
        WHERE masp='$masp' 
        AND mataikhoan='$idkh'";
        return mysqli_query($ketnoi, $check);
    }
    function updategiohang($ketnoi,$masp, $soluong, $tongtien,$idkh){
       $sql = " UPDATE giohang 
        SET soluong='$soluong', tongtien='$tongtien' 
        WHERE masp='$masp' AND mataikhoan='$idkh'";
        if(mysqli_query($ketnoi,$sql)){
            return"Cập nhật thành công số lượng vào giỏ hàng";
        }else{
            return"Lỗi, vui lòng thử lại sau";
        }
    }
    function insertgiohang($ketnoi,$masp,$mataikhoan,$gia,$soluong,$tongtien){
        $sql = "INSERT INTO giohang(masp, mataikhoan, gia, soluong, tongtien)
                VALUES ('$masp', '$mataikhoan', '$gia', '$soluong', '$tongtien')";
        if(mysqli_query($ketnoi,$sql)){
            return"Thêm thành công sản phẩm vào giỏ hàng";
        }else{
            return "Lỗi thêm thất bại, vui lòng thử lại sau";
        }
    }
    function getgiohang($ketnoi,$magiohang){
         $sql = "SELECT id,mataikhoan,sanpham.masp,giohang.gia,giohang.soluong,
                   tongtien,ngaythem,sanpham.tensp,mota
            FROM giohang
            JOIN sanpham ON giohang.masp = sanpham.masp
            WHERE id ='$magiohang'";
            $ketqua = mysqli_query($ketnoi,$sql);
            if($ketqua){
                return mysqli_fetch_assoc($ketqua);
            }else{
                return "Lỗi truy vấn";
            }
    }
    function getgiohangid ($ketnoi, $id){
        $sqlgh = "SELECT sp.masp, sp.tensp, sp.mota, sp.soluong as tonkho, sp.danhmuc_id,gh.id,
                    gh.mataikhoan, gh.gia, gh.soluong AS soluong_gh, gh.tongtien
                      FROM giohang AS gh
                      JOIN sanpham AS sp ON sp.masp = gh.masp
                      WHERE gh.mataikhoan = $id";
        return  mysqli_query($ketnoi, $sqlgh);
    }
}
?>
