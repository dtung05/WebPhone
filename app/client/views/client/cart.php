
<html>
<head>
    
    <title>Giỏ hàng</title>
</head>
<body>

<div class="cart-page" style="margin-top:0">
<main class="maingh">
<div class="cart-header">
    <div class="cart-nav">
        <h2>Giỏ hàng của bạn</h2>
        <div class="cart-nav-right">
            <a href="<?= _WEB_ROOT; ?>/Order/getListOrder" class="thea">
                Đơn hàng
            </a>
            <a href="<?= _WEB_ROOT; ?>/Order/getListOrder" class="thea">
                Lịch sử
            </a>
        </div>
    </div>
</div>
    <?php if (!empty($cart)) { ?>
        <form action="xulydonhang.php" method="post">
            <div class="giohang-header">
                <div class="giohang-col-40" style="text-align: center;"><p>Sản phẩm</p></div>
                <div class="giohang-col-20"><p>Đơn Giá</p></div>
                <div class="giohang-col-10"><p>Số lượng</p></div>
                <div class="giohang-col-20"><p>Thành tiền</p></div>
                <div class="giohang-col-10"><p>Thao tác</p></div>
            </div>

    <div class="giohang-container">
       <?php foreach($cart as $row) {  
        $url = $row['mota'];?>
        <div class="giohang-item">
        <div class="giohang-col-5">
            <input type="checkbox" name="chonsp[]" value="<?= $row['masp'] ?>">
        </div>
        <!-- ảnh + tên sản phẩm và số lượng -->
        <div class="giohang-col-35" style="display:flex">
            <img src="<?= $url ?>" alt="<?= $row['tensp'] ?>"
                 style="width:80px; height:auto; display:block; margin-bottom:5px;">
            <div>
                <p><?= $row['tensp'] ?></p>
                <p style="font-size:12px;font-weight:550">
                    SL: <?= $row['tonkho'] ?>
                </p>
            </div>
        </div>
        <!-- Đơn giá sản phẩm -->
         <div class="giohang-col-20">
             <p class="gia-unit" data-masp="<?= $row['masp'] ?>">
                 <?= number_format($row['dongia'], 0, ',', '.') ?> đ
             </p>
             <input type="hidden" name="gia[<?= $row['masp'] ?>]" value="<?= $row['dongia'] ?>">
         </div>
        <!-- Số lượng mua -->
        <div class="giohang-col-10">
            <input type="number" class="giohang-input"
                   name="soluong[<?= $row['soluong'] ?>]"
                   value="<?= $row['soluong'] ?>" min="1"
                   data-masp="<?= $row['masp'] ?>">
        </div>
        <!-- thành tiền -->
        <div class="giohang-col-20">
            <p class="thanh-tien" data-masp="<?= $row['masp'] ?>">
                <?= number_format($row['dongia'] * $row['soluong'], 0, ',', '.') ?> đ
            </p>
        </div>
        <!-- Nút xóa -->
        <div class="giohang-col-10">
            <a href="<?= _WEB_ROOT; ?>/Cart/deleteCart/<?= $row['id'] ?>" class="btn-xoa"
            onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?')">
                Xóa
            </a>
        </div>
        <input type="hidden" name="magiohang" value="<?= $row['id'] ?>">
    </div>

<?php } ?>
        <div style="text-align:right; margin-top:20px;">
            <button type="submit" name="dathang" class="btn-dathang">📦 Đặt hàng</button>
        </div>
    </form>
    <?php } else {
       ?>
        <div style="text-align:center; padding:10px 10px;width:100%">
            <img src="https://didongviet.vn/images/pc/noresults.png" 
                 alt="Không có sản phẩm" 
                 style="width:40%;height:300px;margin-bottom:0px;">
            <p style="font-size:18px; color:#333; margin-bottom:5px;">Không có sản phẩm nào</p>
            <a href="/index.php" 
               style="display:inline-block; padding:10px 20px; background:#c82333; color:#fff; text-decoration:none; border-radius:5px;">
               Về trang chủ
            </a>
            <p style="margin-top:20px; color:#555; font-size:14px;">
                Khi cần trợ giúp, vui lòng gọi 
                <a href="tel:18006018" style="color:#007bff; text-decoration:none;">1800.6018</a> 
                (7:30 - 21:30)
            </p>
        </div>
    <?php } ?>
    
    </div>
</main>

</div>

<script>
    document.querySelectorAll('.giohang-input').forEach(input => {
        input.addEventListener('input', function() {
            const masp = this.dataset.masp;
            const soluong = parseInt(this.value);
            const gia = parseFloat(
                document.querySelector(`.gia-unit[data-masp='${masp}']`)
                .innerText.replace(/\D/g, '')
            );
            const thanhTienElem = document.querySelector(`.thanh-tien[data-masp='${masp}']`);
            const tong = gia * soluong;
            thanhTienElem.innerText = tong.toLocaleString('vi-VN') + 'đ';
        });
    });
    </script>
</body>
</html>
