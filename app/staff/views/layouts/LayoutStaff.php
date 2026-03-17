
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
       
         
        <?php if(!empty($style)){?>
            <link rel="stylesheet" href="<?= _WEB_ROOT; ?>/public/staff/assets/css/<?= $style; ?>.css">
        <?php }?>
        <link rel="stylesheet" href="<?= _WEB_ROOT; ?>/public/staff/assets/css/admin.css">
         <link rel="stylesheet" href="<?= _WEB_ROOT; ?>/public/AssetALL/css/Header_Footer.css">
    </head>
    <body>
        <?php 
            $check = $this->callView('blocks/header');
        ?>
        <div style="display:flex">
            <div style="width:15%" class="menu">
                <h2 style="color: #333; text-align:center">Chức năng</h2>
                    <ul>
                        <li><a href="createsp.php" style="color: white;background-color: rgba(236, 68, 68, 1); ">Thêm sản phẩm</a></li>
                        <li><a href="suasanpham.php">Sửa sản phẩm</a></li>
                        <li><a href="xoasanpham.php">Xóa sản phẩm</a></li>
                        <li><a href="themdanhmuc.php">Thêm danh mục</a></li>
                        <li><a href="suadanhmuc.php">Sửa danh mục</a></li>
                        <li><a href="donhang.php">Quản lý đơn hàng</a></li>
                        <li><a href="baocao.php">Báo cáo doanh thu</a></li>
                    </ul>
            </div>
            <!-- Cột 2 -->
            <?php $this->callView($content,$data); ?>

        </div>
        <?php 
            $this->callView('blocks/footer');
             $this->callView('blocks/thongbao');
        ?>
        <?php if(!empty($script)){ ?>
            <script src="<?= _WEB_ROOT; ?>/public/client/assets/js/<?= $script; ?>.js"></script>
        <?php } ?>
        <script src="<?= _WEB_ROOT; ?>/public/client/assets/js/login.js"></script>
    </body>
</html>