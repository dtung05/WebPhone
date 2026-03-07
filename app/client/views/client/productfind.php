
<html>
    <head>
        <title>Kết quả tìm kiếm <?php echo $keyword;?></title>
    </head>
    <body>
        <main style="width:76%; margin-left:13%">
            <br>
            <div style="width:100%">
                <a  class="thea" href="<?= _WEB_ROOT; ?>/home">Trang chủ  | </a>
                <a  class="thea" href="#">Kết quả tìm kiếm với từ khóa <?php echo $keyword?>  </a>
            </div>
            <br>
            <?php if(!empty($products)){ ?>
            <div class="vien">
                <div class="sanpham-grid1">
                    <?php foreach($products as $item ){ ?>
                        <div class="sp-card">
                            <a href="<?= _WEB_ROOT ?>Product/ProductDetail/<?= $item['masp']; ?>">
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
                    <p>Tìm thấy 0 sản phẩm cho từ khóa ' <?php echo $keyword; ?>'' </p>
                    <img src="https://cdn2.cellphones.com.vn/x,webp/media/wysiwyg/Search-Empty.png" alt="" style="margin-top: 20px;"><br><br><br>
                    <strong style="margin-bottom: 10px;display:block">Không có kết quả bạn cần tìm</strong>
                </div>
            <?php } ?>

        </main>
       
    </body>
</html>