

<div style="flex:1; padding: 5px 10px 70px 20px">
<form class="search-form" action="<?= _WEB_ROOT ?>/Product/FindProduct" method="POST">
    <input type="text" name="keyword" required placeholder="Tìm theo ID hoặc tên sản phẩm...">
    <button>Tra cứu</button>
</form>

<div class="sanpham-grid1">
<?php foreach($products as $item){ ?>
    <div class="sp-card">
        <a href="<?= _WEB_ROOT; ?>/Product/ProductDetail/<?= $item['masp']; ?>">
            <div class="sp-img">
                <img src="<?= $item['mota']; ?>" alt="<?= $item['tensp']; ?>">
            </div>
        </a>
        <div class="sp-info">
            <p class="sp-name"><?= $item['tensp']; ?></p>
            <p class="sp-price"><?= number_format($item['gia'],0,',','.'); ?> ₫</p>
            <div>
                <a href="<?= _WEB_ROOT; ?>/Product/UpdateProduct/<?= $item['masp']?>">Sửa</a>
                <a href="<?= _WEB_ROOT; ?>/Product/DeleteProduct/<?= $item['masp']?>"
                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">Xóa</a>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</div>