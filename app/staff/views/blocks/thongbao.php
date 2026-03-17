<style>
    .thongbao{
      position: fixed;              /* đổi absolute → fixed cho nổi trên màn hình */
      top: 50px;
      right: 10px;
      z-index: 10000000000;
      border: 1px solid black;
      min-width: 400px;             
      border-radius: 5px;
      background: #fff;
      display: flex;
    }

    .thongbao h3{
      text-align: center;
      margin: 5px 0 5px;
      color: brown;
      font-size: 22px;
    }
    .thongbao p{
        font-size: 18px;
        margin: 5px 0 10px 10px;
    }
  </style>
<?php if (!empty($_SESSION['thongbao'])) { ?>
  <div id="thongbao" class="thongbao">
    <div style=" width:1.5%;background-color: brown;"></div>
    <div style="width:98%">
        <h3>Thông báo</h3>
    <p><?= htmlspecialchars($_SESSION['thongbao']); ?></p>
  </div>
<?php 
  unset($_SESSION['thongbao']);
} 
?>
<script>
  function anthongbao(){
    let a = document.getElementById('thongbao');
    setTimeout(() => {
      a.style.display = "none";
    }, 4000); // 4000ms = 4 giây
  }
  // gọi hàm ngay khi load trang
  anthongbao();
</script>

