<?php 
    include "../includes/header.php";
    echo "<hr>";
     $ketnoi = mysqli_connect('localhost','root','','webphone');
     $sql = "select donhang.id,mataikhoan,donhang.masp,donhang.gia,donhang.soluong,tongtien,ngaydat,trangthai,diachi,sdt,sanpham.tensp,taikhoan.hoten
     from donhang
     join taikhoan on donhang.mataikhoan = taikhoan.id
     join sanpham on sanpham.masp = donhang.masp";
     $ketqua = mysqli_query($ketnoi, $sql);
     $sql1 = "select donhang.id,mataikhoan,donhang.masp,donhang.gia,donhang.soluong,tongtien,ngaydat,trangthai,diachi,sdt,sanpham.tensp,taikhoan.hoten
     from donhang
     join taikhoan on donhang.mataikhoan = taikhoan.id
     join sanpham on sanpham.masp = donhang.masp
     where trangthai = 'choxacnhan'";
     $ketqua1 = mysqli_query($ketnoi, $sql1);
    $sql2 = "select donhang.id,mataikhoan,donhang.masp,donhang.gia,donhang.soluong,tongtien,ngaydat,trangthai,diachi,sdt,sanpham.tensp,taikhoan.hoten
    from donhang
     join taikhoan on donhang.mataikhoan = taikhoan.id
     join sanpham on sanpham.masp = donhang.masp
     where trangthai = 'danggiao'";
     $ketqua2 = mysqli_query($ketnoi, $sql2);
    $sql3 = "select donhang.id,mataikhoan,donhang.masp,donhang.gia,donhang.soluong,tongtien,ngaydat,trangthai,diachi,sdt,sanpham.tensp,taikhoan.hoten
     from donhang
     join taikhoan on donhang.mataikhoan = taikhoan.id
     join sanpham on sanpham.masp = donhang.masp
     where trangthai = 'hoanthanh'";
     $ketqua3 = mysqli_query($ketnoi, $sql3);
    if(mysqli_num_rows($ketqua) < 1){ 
?>
<html>
    <head>
        <title>
            Xử lý đơn hàng
        </title>
        <link rel="stylesheet" href="../assets/css/admin.css">
        
    </head>
    <body style="font-family: Arial, sans-serif;">
        
        
        <div style="display:flex">
    <div style="width:15%" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
        <ul>
            <li><a href="createsp.php" >Thêm sản phẩm</a></li>
            <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
            <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
            <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
            <li><a href="donhang.php"style="color: white;background-color: rgba(236, 68, 68, 1); ">Quản lý đơn hàng</a></li>
            <li><a href="baocao.php">Báo cáo doanh thu</a></li>
</ul>
    </div>
    <div style="flex:1;margin-left:20px" >
        <div style="text-align: center; margin-top: 17px; font-family: Arial, sans-serif;color: #555;">
        <div style="font-size: 60px; color: #ccc; margin-bottom: 20px;">&#128179;</div>
        <h2 style="font-size:24px; margin-bottom:10px;">Hiện tại chưa có đơn hàng nào</h2>
        <p style="font-size:16px; color:#888;">
            Khi có đơn hàng mới, bạn sẽ thấy danh sách ở đây.
        </p>
        <img src="https://cdn2.cellphones.com.vn/x,webp/media/cart/Cart-empty-v2.png" alt="Đơn hàng trống" style="width:150px; margin-top:20px;">
    </div>
    </div>
        </div>
 <?php }else{ ?>

    <div style="display:flex">
    <div style="width:15%" class="menu">
        <h2 style="color: #333; text-align:center">Chức năng</h2>
    <ul>
            <li><a href="createsp.php" >Thêm sản phẩm</a></li>
            <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
            <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
            <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
            <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
            <li><a href="donhang.php"style="color: white;background-color: rgba(236, 68, 68, 1); ">Quản lý đơn hàng</a></li>
            <li><a href="baocao.php">Báo cáo doanh thu</a></li>
</ul>
    </div>
    <div style="flex:1;margin-left:40px" >
       <h2 style="text-align: center;">Quản lý và Cập nhật đơn hàng</h2>
       <h3 style="font-size:20px ; color:blue">Đơn hàng chờ xác nhận</h3>
       <div class="donhang-container">
    <!-- Header -->
    <div class="donhang-header">
        <div class="name">Họ tên khách</div>
        <div class="namesp">Tên sản phẩm</div>
        <div class="diachi">Địa chỉ</div>
        <div class="sdt">Số điện thoại</div>
        <div class="soluong">Số lượng</div>
        <div class="tongtien">Tổng tiền</div>
        <div class="trangthai">Trạng thái</div>
        <div class="sua">Sửa</div>
        <div class="huydo">Xóa đơn</div>
    </div>
       <?php if( mysqli_num_rows($ketqua1) > 0){
       while($row = mysqli_fetch_assoc($ketqua1)){?>
            <div class="donhang-row">
            <div class="name"><?php echo $row['hoten']; ?></div>
            <div class="namesp"><?php echo $row['tensp']; ?></div>
            <div class="diachi"><?php echo $row['diachi']; ?></div>
            <div class="sdt"><?php echo $row['sdt']; ?></div>
            <div class="soluong"><?php echo $row['soluong']; ?></div>
            <div class="tongtien"><?php echo number_format($row['tongtien'],0,',','.').'₫'; ?></div>
            <div class="trangthai">Chờ xác nhận</div>
            <div class="sua"><a href="suadonhang.php?id=<?php echo $row['id']; ?>">Sửa</a></div>
            <div class="huydo"><a href="xoadonhang.php?id=<?php echo $row['id']; ?>">Xóa</a></div>
        </div>
        <?php } ?>
       </div>
     <?php }
     else{
        echo "<div> <p style = 'text-align:center;padding:10px'>Hiện tại chưa có đơn hàng nào cần xử lý</p></div>"; }
 
    ?>  
    <h3 style="font-size:20px ;color:blueviolet">Đơn hàng đang giao</h3>
       <div class="donhang-container">
    <div class="donhang-header">
        <div class="name">Họ tên khách</div>
        <div class="namesp">Tên sản phẩm</div>
        <div class="diachi">Địa chỉ</div>
        <div class="sdt">Số điện thoại</div>
        <div class="soluong">Số lượng</div>
        <div class="tongtien">Tổng tiền</div>
        <div class="trangthai">Trạng thái</div>
        <div class="sua">Sửa</div>
    </div>

       <?php if( mysqli_num_rows($ketqua2) > 0){
       while($row = mysqli_fetch_assoc($ketqua2)){?>
            <div class="donhang-row">
            <div class="name"><?php echo $row['hoten']; ?></div>
            <div class="namesp"><?php echo $row['tensp']; ?></div>
            <div class="diachi"><?php echo $row['diachi']; ?></div>
            <div class="sdt"><?php echo $row['sdt']; ?></div>
            <div class="soluong"><?php echo $row['soluong']; ?></div>
            <div class="tongtien"><?php echo number_format($row['tongtien'],0,',','.').'₫'; ?></div>
            <div class="sua"><a href="suadonhang.php?id=<?php echo $row['id']; ?>">Sửa</a></div>
            <div class="trangthai">Đang giao</div>
        
        </div>

        <?php } ?>
       </div>
     <?php }
     else{
        echo "<div> <p style = 'text-align:center;padding:10px'>Hiện tại chưa có đơn hàng nào cần xử lý</p></div>"; }
    ?>
    <h3 style="font-size:20px ;color:brown">Đơn hàng đã hoàn tất</h3>
       <div class="donhang-container">
    <!-- Header -->
    <div class="donhang-header">
        <div class="name">Họ tên khách</div>
        <div class="namesp">Tên sản phẩm</div>
        <div class="diachi">Địa chỉ</div>
        <div class="sdt">Số điện thoại</div>
        <div class="soluong">Số lượng</div>
        <div class="tongtien">Tổng tiền</div>
        <div class="trangthai">Trạng thái</div>
        
    </div>

       <?php if( mysqli_num_rows($ketqua3) > 0){
       while($row = mysqli_fetch_assoc($ketqua3)){?>
            <div class="donhang-row">
            <div class="name"><?php echo $row['hoten']; ?></div>
            <div class="namesp"><?php echo $row['tensp']; ?></div>
            <div class="diachi"><?php echo $row['diachi']; ?></div>
            <div class="sdt"><?php echo $row['sdt']; ?></div>
            <div class="soluong"><?php echo $row['soluong']; ?></div>
            <div class="tongtien"><?php echo number_format($row['tongtien'],0,',','.').'₫'; ?></div>
            <div class="trangthai">Hoàn tất</div>
        </div>
        <?php } ?>
       </div>
     <?php }
     else{
        echo "<div> <p style = 'text-align:center;padding:10px'>Hiện tại chưa có đơn hàng nào cần xử lý</p></div>"; }?>
    </div>
    </div>
 <?php }include "../includes/footer.php";?>
</body>
</html>
