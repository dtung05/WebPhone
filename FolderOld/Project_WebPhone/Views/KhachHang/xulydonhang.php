<?php
    include "../../Assets/php/conn.php";
    include "../../Models/DAO/DAOGioHang.php";
    include "../../Models/DAO/DAOSanPham.php";
    $DAOGH = new DAOGioHang();
    $DAOSP = new DAOSanPham();
    // Thêm sản phẩm vào trong giỏ + xử lý đặt hàng
/*
control trong file này chứa các tác vụ check logic, gọi DAO, nhận post,
phục vụ việc thêm sản phẩm vào giỏ hàng 
*/    
    require_once "../../Controllers/KhachHang/CT_xulygiohang.php";
?>  

<html>
    <head>

    </head>
    <body>
        <?php include "../includes/header.php";?>
        <div style="width:70%; margin-left:15%; font-family: Arial, sans-serif; 
            border: 1px solid #ccc; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.2); 
            padding: 20px; 
            border-radius: 8px; ">
    <h2 style="text-align:center; margin-bottom:20px; color:#c62828;">
        Xác nhận đơn hàng của bạn
    </h2>

    <form action="" method="post" style="display: flex;" class="donhang">
        <img src="<?php echo $row['mota'];?>" alt="">
        <div class="cotthongtin">           
            <label>Tên sản phẩm: </label>
            <input type="text" name="tensp" value="<?php echo $row['tensp']?>" readonly><br>

            <label>Giá sản phẩm: </label>
            <input type="text" value="<?php echo $gia?>" readonly><br>

            <label>Số lượng: </label>
            <input type="text" value="<?php echo $soluong?>" readonly><br>
           
                <label>Tổng tiền: </label>
                <input type="text" value="<?php echo $tongtien?>đ" readonly><br>
            <label>Địa chỉ </label>
            <textarea name="diachi" placeholder="Nhập vào địa chỉ nhận hàng" required></textarea><br>

            <label>Số điện thoại</label>
            <input type="number" name="sdt" placeholder="Số điện thoại người dùng" required><br><br>

             <input type="hidden" name="mataikhoan" value="<?php echo $_SESSION['id'];?>">
             <input type="hidden" name="masp" value="<?php echo $masp;?>">
             <input type="hidden" name="gia" value="<?php echo $gia;?>">
             <input type="hidden" name="soluong" value="<?php echo $soluong;?>">
             <input type="hidden" name="tongtien" value="<?php echo $tongtien;?>">
        

            <p style="text-align:left; font-size:14px; color:#333; margin-bottom:20px;">
                Vui lòng kiểm tra thông tin sản phẩm và điền địa chỉ, số điện thoại trước khi xác nhận.
            </p>

            <div style="gap:40px;display:flex;">
                <button type="submit" name="xacnhan">Xác nhận</button>  
                <a href="giohang.php" class="nutthea"> Quay về</a>
            </div>
        </div>
    </form>
</div>
    </body>
    <?php include "../Includes/footer.php";?>
</html>