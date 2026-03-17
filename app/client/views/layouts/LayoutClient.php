
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="<?= _WEB_ROOT; ?>/public/AssetALL/css/Header_Footer.css">
        
        <?php if(!empty($style)){?>
            <link rel="stylesheet" href="<?= _WEB_ROOT; ?>/public/client/assets/css/<?= $style; ?>.css">
        <?php }?>
    </head>
    <body>
        <?php 
            $check = $this->callView('blocks/header');
        ?>
        <div>
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