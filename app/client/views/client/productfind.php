
<html>
    <head>
        <title>Kết quả tìm kiếm <?php echo $keyword;?></title>
    </head>
    <body>
       
      
    ?>
        <main style="width:76%; margin-left:13%">
            <br>
            <div style="width:100%">
                <a  class="thea" href="../index.php">Trang chủ  | </a>
                <a  class="thea" href="#">Kết quả tìm kiếm với từ khóa <?php echo $_POST['timkiem']?>  </a>
            </div>
            <br>
            <?php if(mysqli_num_rows($ketqua) > 0 ){ ?>
            <div class="vien">
                <div class="sanpham-grid1">
                    <?php while($item = mysqli_fetch_assoc($ketqua)){ ?>
                        <div class="sp-card">
                            <a href="/pages/sanpham.php?masp=<?php echo $item['masp']; ?>">
                                <div class="sp-img">
                                    <img src="<?php echo $item['mota']; ?>" alt="ảnh sản phẩm">
                                </div>
                                <div class="sp-info">
                                    <p class="sp-name"><?php echo $item['tensp']; ?></p>
                                    <p class="sp-price"><?php echo number_format($item['gia'],0,',','.'); ?> ₫</p>
                                    <p class="sp-extra">Ưu đãi hấp dẫn • Mua ngay</p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php }else{ ?>
                <div style="text-align:center">     
                    <p>Tìm thấy 0 sản phẩm cho từ khóa ' <?php echo $_POST['timkiem'] ?>'' </p>
                    <img src="https://cdn2.cellphones.com.vn/x,webp/media/wysiwyg/Search-Empty.png" alt="" style="margin-top: 20px;"><br><br>
                    <strong style="margin-bottom: 10px;display:block">Không có kết quả bạn cần tìm</strong>
                </div>
            <?php } ?>

        </main>
        <?php include  "../includes/footer.php"?>
    </body>
</html>