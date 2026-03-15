

<link rel="stylesheet" href="/Assets/css/donhang.css">

<main class="khung-chinh">
    <div class="headorder">
        <a href="">Tất cả</a>
        <a href="">Chờ xác nhận</a>
        <a href="">Đã giao</a>
        <a href="">Trả hàng</a>
        <a href="">Đã hủy</a>
    </div>
    <hr>
    <?php if(!empty($order)){ ?>
        <?php foreach($order as $row){ ?>
            <div class="donhang-khung">
                <div class="hehe">
                    <h3>Mã đơn: #<?= $row['idorder']; ?></h3>
                    <h3>Trạng thái: <?= $row['trangthai']; ?></h3>
                </div>
                    <?php foreach($row['product'] as $row2){ ?>
                        <div class="donhang-top">
                            <img src="<?= $row2['img'] ?>" alt="<?= $row2['tensp'] ?>">
                            <div class="thongtin-sp">
                                <p class="tensp"><?= $row2['tensp'] ?></p>
                                <div style="display:flex; gap:20px">
                                    <p class="soluong">SL: <?= $row2['soluong'] ?></p>
                                    <p class="tongtien">Thành tiền: <strong><?= number_format($row2['giathanh'],0,',','.') ?>đ</strong></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <div class="donhang-bottom">
                    <p>Địa chỉ: <?= $row['diachi'] ?></p>
                    <p>SĐT: <?= $row['sdt'] ?></p>
                    <p>Ngày đặt: <?= date("d/m/Y H:i", strtotime($row['ngaydat'])) ?></p>
                    <p class="tongtien">Tổng tiền: <?= number_format($row['tongtien'],0,',','.') ?>đ</p>
                </div>
            </div>
        <?php } ?>
    <?php } else{ ?>
        <div class="khongco-donhang">
            <p>Bạn chưa đặt sản phẩm nào</p>
            <a href="../index.php" class="btn-ve-trangchu">Về trang chủ</a>
        </div>
    <?php } ?>

</main>


