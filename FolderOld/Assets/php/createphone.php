<?php 
    $masp = $_GET['masp'];
    $DAOdg = new DAODanhGia();
    // Lấy post tạo đánh giá
        if(isset($_POST['guibinhluan'])){
            if(!isset($_SESSION['id'])){ 
                $_SESSION['thongbao'] = "Bạn cần đăng nhập để gửi đánh giá!";
            } else {
                $sosao = $_POST['sosao'];
                $noidung = $_POST['noidung'];
                $mataikhoan = $_SESSION['id']; 
                $_SESSION['thongbao'] = $DAOdg->themdanhgia($ketnoi,$masp,$mataikhoan,$sosao,$noidung);
            }
            header("Location: " . $_SERVER['REQUEST_URI']);// load lại trang để hiện đánh giá vừa thêm
            exit();
        }
  
    $luutru = $DAOdg->laydulieu($ketnoi,$masp);
    $kq = $luutru['danhgia'];// nhận list đánh giá
    $ketqua['TyLe'] = $luutru['TyLe'];
    $ketqua['ThongSo'] = $luutru['ThongSo'];

     if(isset($_GET['iddanhgia'])){
        $_SESSION['thongbao'] = $DAOdg->xoadanhgia($ketnoi,$_GET['iddanhgia']);
        header("Location: sanpham.php?masp=".$_GET['masp']);
        exit();
    }

?>