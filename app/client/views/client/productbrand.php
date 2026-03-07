
<html>
    <head>
        <title>Danh mục <?php echo $brand;?></title>
        <link rel="stylesheet" href="/assets/css/danhmuc.css">
    </head>
    <body>
        <main style="width:76%; margin-left:13%">
            <br>
            <div style="width:100%">
                <a  class="thea" href="<?= _WEB_ROOT; ?>/home">Trang chủ  | </a>
                <a  class="thea" href="#">Danh mục <?php echo $brand;?> </a>
            </div>
            <br>
            <div class="vien">
                <div class="section-title">
                    <h3> Sản phẩm của hãng <?php echo $brand ?></h3>
                </div>

        <form action="<?= _WEB_ROOT; ?>/Product/ProductBrand/<?= $brand ?>" method="post" style="text-align: right;">
            <label >Sắp xếp theo giá:</label>
            <select name="sapxep" id="">
                <option value="DESC">Giá từ cao đến thấp</option>
                <option value="ASC" <?php if($order == 'ASC' && !empty($order)){ echo "selected";}; ?>>Giá từ thấp đến cao</option>
            </select>
            <input type="hidden" name="danhmuc" value="<?php echo $brand;?>">
            <button type="submit" name="push">Tìm</button>
        </form>
<hr>
<div class="sanpham-grid1">
    <?php foreach($products as $item){ ?>
        <div class="sp-card">
            <a href="<?= _WEB_ROOT; ?>/Product/ProductDetail/<?= $item['masp']; ?>">
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
</div></div>
        </main>
      
    </body>
</html>