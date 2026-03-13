<html>
<head>
</head>
<body>
    <div class="checkout-container">
        <form action="" method="post" style="display:flex; width:100%; gap:30px;">
            <!-- LEFT PRODUCT -->
            <div class="product-box">
                <h2>Sản phẩm của bạn</h2>
            <?php foreach($order as $row){ ?>
                <div class="product-item">
                    <img src="<?php echo $row['url']; ?>">

                    <div class="product-info">
                        <b><?php echo $row['tensp']; ?></b><br><br>
                        Số lượng: <?php echo $row['soluong']; ?>
                    </div>

                    <div class="product-price">
                        <?php echo number_format($row['gia']); ?> đ
                    </div>
                </div>
            <?php } ?>
            </div>

            <!-- RIGHT ORDER INFO -->
            <div class="order-box">
                <h2>Thông tin nhận hàng</h2>

                <label>Tên người đặt</label>
                <input type="text" name="tennguoidat" autofocus placeholder="Nhập tên người đặt" required>

                <label>Số điện thoại</label>
                <input type="number" name="sdt" placeholder="Số điện thoại" required>

                <label>Địa chỉ</label>
                <textarea name="diachi" placeholder="Nhập địa chỉ nhận hàng" required></textarea>

                <label>Hình thức thanh toán</label>
                <select name="thanhtoan">
                    <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                    <option value="bank">Chuyển khoản ngân hàng</option>
                    <option value="momo">Ví MoMo</option>
                </select>

                <div class="total">
                    Tổng tiền:
                    <span><?php echo number_format($thanhtien); ?> đ</span>
                </div>
                <div style="display: flex;">
                    <button type="submit" name="xacnhan" class="button2">
                        Xác nhận đặt hàng
                    </button>
                    <a href="giohang.php" class="back-btn">
                        Quay về 
                    </a>
                </div>
                
            </div>
        </form>
    </div>
</body>
</html>