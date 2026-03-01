<body >
    <div style="width:80%; margin-left:10%;background-color:#fff" >

    <div style="display:flex;gap:10px">
        <div style="width:33%; margin-left:20px;">
            <h2><?php echo $product['tensp']; ?></h2>
            <div class="khung-slider" style="text-align:center">
                <div class="anh-truot" id="anh-truot">

              <?php foreach ($img as $row){ ?>
                <img src="<?= $row['urlImg']; ?>" alt="Ảnh điện thoại">
              <?php } ?> 
                </div>
            <button class="nut-trai" onclick="anhTruoc()">&#10094;</button>
            <button class="nut-phai" onclick="anhSau()">&#10095;</button>
            </div>
        </div>
<div class="chon-phien-ban">
    <h3>Chọn phiên bản để xem giá :</h3>
    <h4>Số lượng tồn kho: <?php echo $product['soluong']?></h4>
    <form  method="post">
        <?php
        foreach ($memory as $row){ ?>
           <label class='option'>
                <input type='radio' name='bonho' value='<?=  $row['gia']; ?>' checked>
                <span class='ten'><?= $row['bonho']; ?></span>
                <span class='gia'> <?=  number_format($row['gia'], 0, ',', '.'); ?>đ </span>
            </label>
        <?php } ?>
        <input type="hidden" name="masp" value="<?= $product['masp'];?>">
        <label class="ten">Số lượng:</label>
        <input type="number" name="soluong" value="1" min="1" required style="padding: 6px;border-radius: 5px;">
        <br><br>
        <button type="submit" class="nut-dat" name="giohang" formaction="<?= _WEB_ROOT; ?>/Cart/moreCart">🛒 Thêm giỏ hàng</button>
        <button type="submit" class="nut-dat" name="dathang1">📦 Đặt hàng</button>
    </form>
    <div>
        <div >
                <p style="font-size: 13px; border:1px solid black; width:100%;padding:10px 2px; "> - Máy mới nguyên seal 100%, chính hãng Apple Việt Nam <br>
                    - Di Động Việt là đại lý uỷ quyền chính thức của Apple Việt Nam <br><br>
                    <strong>Bộ sản phẩm:</strong> Thân máy, Hộp, Cáp, Cây lấy sim, Sách hướng dẫn
                </p>
            <p style="font-size: 13px; border:1px solid black; width:100%; padding: 10px 2px;" >
                    - Độc quyền tại Di Động Việt: Bảo hành Hư lỗi - Đổi mới trong vòng 33 ngày. Bảo hành chính hãng 12 tháng.
                </p>
        </div>
    </div>
</div>
<div style="flex:1;padding:15px">
<h3 style="margin-bottom: 15px;color: #333;font-size: 18px;">Sản phẩm hãng </h3>
<!-- Nhúng sản phẩm liên quan -->
<div class="splienquan">
    <?php foreach ($products as $row) { ?>
    <a href="<?= _WEB_ROOT; ?>/Product/ProductDetail/<?= $row['masp'] ?>">
        <span><img src='<?php echo $row['mota']?>' alt="ảnh mô tả"></span>
        <?= $row['tensp'] ?>
    </a><br>
    <?php } ?>
</div>

</div>
    </div> 
        <div style="display:flex;gap:15px;padding: 0 5px 0">
             <div class="thongso">
            <?php { ?>
                <h3>Bảng Thông Số Kỹ Thuật</h3>
                <table>
                    <tr><th>Màn hình</th><td><?php echo $product['manhinh']; ?></td></tr>
                    <tr><th>Hệ điều hành</th><td><?php echo $product['hedieuhanh']; ?></td></tr>
                    <tr><th>Camera sau</th><td><?php echo $product['camarasau']; ?></td></tr>
                    <tr><th>Camera trước</th><td><?php echo $product['camaratruoc']; ?></td></tr>
                    <tr><th>CPU</th><td><?php echo $product['cpu']; ?></td></tr>
                    <tr><th>RAM</th><td><?php echo $product['ram']; ?></td></tr>
                    <tr><th>Dung lượng pin</th><td><?php echo $product['dungluongpin']; ?></td></tr>
                    <tr><th>Thẻ SIM</th><td><?php echo $product['thesim']; ?></td></tr>
                    <tr><th>Thiết kế</th><td><?php echo $product['thietke']; ?></td></tr>
                </table>
            <?php } ?>
            </div>
            <div style="flex:1">
                <h3 style="text-align: center;font-size: 22px;margin-bottom: 15px;color: #222;font-weight: bold;">Video Đánh Giá</h3>
                <?php $row = $video[0];  ?>
                <div style="display:block">
                <iframe width="100%" height="350px" src="<?php echo $row['urlVideo'];?>"
                    title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write;
                    encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div style="display:flex;gap:10px">
                <?php for($i = 1 ; $i <= 2 ; $i++) {?> 
                    <div style="flex:1">
                    <iframe width="100%" height="250px" src="<?php echo $video[$i]['urlVideo'];?>"
                    title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write;
                    encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <?php }?>
                </div>
                <?php ?>
            </div>
        </div>
        <div>


       <h2 style="color: #050505; font-size: 20px; font-weight: 700; margin: 20px 0 0 0;">
        💬 Đánh giá sản phẩm <?php echo htmlspecialchars($product['tensp']); ?>
</h2>
  <div style="display:flex; padding: 0 5px 0;gap:20px">
    <!-- Form viết đánh giá -->
    <div class="form-danhgia">
      <div class="form-header">
       
        <form method="post" action = "<?= _WEB_ROOT; ?>./Product/addComment"  style="width: 100%;">
            <div style="display: flex;">
              <textarea name="noidung" placeholder="Viết đánh giá của bạn..." rows="1" required style="height: 144px;"></textarea>
              <div>
                <div class="star-rating">
                  <select name="sosao" required  >
                    <option value="5">✭✭✭✭✭</option>
                    <option value="4">✭✭✭✭</option>
                    <option value="3">✭✭✭</option>
                    <option value="2">✭✭</option>
                    <option value="1">✭</option>
                  </select>
                </div>
                  <!-- Gửi kèm mã sản phẩm lên trên -->
                  <input type="hidden" name= 'masp' value="<?= $product['masp'] ?>"/>
                  <button type="submit" name="guibinhluan"style="margin-bottom:13px">Comment</button>
              </div>
            </div>
    
        </form>
      </div>
    </div>
    <!-- Form thống kê  -->
    <div style="width:60%;display:flex; gap:10px;height: 200px;margin-top:0">
      <div style="width:25%">
        <h3>Tổng hợp đánh giá</h3>
        <h4 style="font-size: 35px;text-align:center;margin:5px 0 5px"><?= round($star['avg'],1) ?></h4>
        <p style="margin: 4px 0 0 0;text-align:center"><?= $star['sumComment'];?> lượt đánh giá</p>
        <p style="text-align:center; margin-top:0px;font-size:30px">
          <?php 
            $tyle=round($star['avg'],1);
            if ($tyle < 5 ){
              for(  $i = 1 ; $i <$tyle ; $i ++){
                echo "✭";
              }for($i = $tyle ; $i < 5 ; $i ++){
                echo "✰";
              }
            }
        ?>
        </p>
      </div>
      <div style="flex:1; margin-top:10px;padding-right:10px"> <!-- Bảng thông số -->
        <div class="thongsodanhgia">
          
          <div style="display: flex;margin-top:0px">
            <p>1⭐</p>
            <div class="tsdg1" >
              <div class="tsdg2" style="width:<?= $star['tyle'][0]; ?>%;"></div>
            </div>
            <p style="margin:0 0 5px 5px;"> <?= $star['one'] ?></p>
          </div>
          <div style="display: flex;margin-top:0px">  
            <p>2⭐</p>
            <div class="tsdg1" >
              <div class="tsdg2" style="width:<?= $star['tyle'][1]; ?>%;"></div>
            </div>
            <p style="margin:0 0 5px 5px;"> <?= $star['two'] ?></p>
          </div>
<div style="display: flex;margin-top:0px">
            <p>3⭐</p>
            <div class="tsdg1" >
              <div class="tsdg2" style="width:<?= $star['tyle'][2] ?>%;"></div>
            </div>
            <p style="margin:0 0 5px 5px;"> <?= $star['three'] ?></p>
</div>
<div style="display: flex;margin-top:0px">
            <p>4⭐</p>
            <div class="tsdg1" >
              <div class="tsdg2" style="width:<?= $star['tyle'][3] ?>%;"></div>
            </div>
            <p style="margin:0 0 5px 5px;"> <?= $star['four'] ?></p>
</div>
<div style="display: flex;margin-top:0px">
            <p>5⭐</p>
            <div class="tsdg1" >
              <div class="tsdg2" style="width:<?= $star['tyle'][4] ?>%;"></div>
            </div>
            <p style="margin:0 0 5px 5px;"> <?= $star['five'] ?></p>
</div>         
          
        </div>

      </div>
    </div>
  </div>        
<!-- Danh sách đánh giá -->
<div class="danhgia-list">
  <?php 
  if(!empty($comment)> 0){ 
    foreach($comment as $row) { ?>
      <div class="danhgia-item">
        <div class="danhgia-header">
          <div >
            <img style="width:40px" src="data:image/jpeg;base64,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" alt="">
          </div>
          <div class="danhgia-content">
            <div class="user-info" style="margin-bottom:0px">
              <span class="user-name" style="margin-bottom:0px" ><?php echo htmlspecialchars($row['hoten']); ?></span>
              
            </div>
            <div class="comment-text">
              <?php echo nl2br(htmlspecialchars($row['noidung'])); ?>
              
            </div>
            <div>
              <span class="comment-time" style="margin-bottom:0px" ><?php echo date("d/m/Y", strtotime($row['ngaydanhgia'])); ?></span>
              <?php 
                if(isset($_SESSION['id'])){
                  if ($_SESSION['id'] == $row['mataikhoan']){ ?>
                    <a href="<?= _WEB_ROOT; ?>/Product/DeleteComment/<?= $row['id'];?>/<?= $row['masp'] ?>" class="xoa">Xóa</a>
              <?php }}?>
            </div>
          </div>
        </div>
      </div>
  <?php } 
  } else { ?>
    <div class="no-reviews">
      Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá sản phẩm này!
    </div>
  <?php } ?>
  
</div>

</div>
</div>

</body>
 
</html>

