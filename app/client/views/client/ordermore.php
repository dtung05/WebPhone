<html>
<head>
</head>
<body>
    <div class="checkout-container">
        <form action="<?= _WEB_ROOT ?>/Order/addOrder" method="post" style="display:flex; width:100%; gap:30px;">
            <!-- LEFT PRODUCT -->
            <div class="product-box">
                <h2>Sản phẩm của bạn</h2>
            <?php foreach($order as $row){ ?>
            <!-- Lấy dữ liệu mã sản phẩm và số lượng -->
            <input type="hidden" name="product[<?= $row['masp']; ?>][masp]" value="<?= $row['masp'];?>">
            <input type="hidden" name="product[<?= $row['masp']; ?>][soluong]" value="<?= $row['soluong'];?>">
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
                <input type="text" name="user[nameuser]" autofocus placeholder="Nhập tên người đặt" required>

                <label>Số điện thoại</label>
                <input type="number" name="user[sdt]" placeholder="Số điện thoại" required>

                <label>Địa chỉ</label>
                <textarea name="user[diachi]" placeholder="Nhập địa chỉ nhận hàng" required></textarea>

                <label>Hình thức thanh toán</label>
                <select name="user[thanhtoan]">
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