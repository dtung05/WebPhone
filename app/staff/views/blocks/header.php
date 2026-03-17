
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  </head>
  <body >
    <header style="background-color: brown">
      <div class="dautrang">
        <div style="display: inline">
          <div class="tachcot" style="text-align: center">
            <h2 style="width: 33%; margin-top: 5px;color:azure">Thu cũ đổi mới</h2>
            <h2 style="width: 33%; margin-top: 5px;color:azure">Trả trước 0đ Trả Góp 0%</h2>
            <h2 style="width: 33%; margin-top: 5px;color:azure">Bảo hành 100% Đổi Mới</h2>
          </div>
        </div>
        <div style="margin: 0 0 5px 0">
          <div class="tachcot" style="gap: 1%">
          <!-- Logo -->
          <div
              style="display: flex;-items: center;margin: 0 0 13px 15px;width: 10%;">
              <h1 style="margin: 0; color: red">D</h1>
              <div style="margin-left: 8px">
                <h3 style="margin: 0; display: inline">didongviet</h3>
                <p style="margin: 0; font-size: 11px; color: #ccbfbf">
                  Uy tín tạo niềm tin
                </p>
              </div>
            </div>

            <div class="danhmuc" style="margin-left: 10px;">
                <button class="button1">Danh mục sản phẩm</button>
                
                <ul class="danhmuc-content">
                  <li><a href="<?= _WEB_ROOT; ?>/Product/ProductBrand/iphone">Iphone</a></li>
                  <li><a href="<?= _WEB_ROOT; ?>/Product/ProductBrand/xiaomi">Xiaomi</a></li>
                </ul>
            </div>
            <div style="flex: 1">
              <form action="<?= _WEB_ROOT; ?>/Product/ProductFind" method="post">
                <div class="timkiem">
                  <input
                    type="search"
                    name="keyword"
                    id="keyword"
                    placeholder="Tìm kiếm sản phẩm..."
                    style="width: 88%; padding-left: 10px;  outline: none; box-shadow: none;border-radius: 5px" required
                  />
                  <input type="submit" style="width: 10%" value="Tìm"/>
                </div>
              </form>
              <a ></a>
            </div>
            <div style="width: 40%; gap: 2%; margin-bottom: 10px" class="tachcot">
              <a href="<?= _WEB_ROOT; ?>/home" class="nutbamthea" > Trang chủ</a>
              <a class="nutbamthea" href="<?= _WEB_ROOT; ?>/home/News" >Tin tức</a>
              <a class="nutbamthea" href="<?= _WEB_ROOT; ?>/Cart" >Giỏ hàng</a>
              
              <!-- Code xử lý phần đăng nhập -->
              <?php if(!isset($_SESSION['id']) || !isset($_SESSION['hoten']) || !isset($_SESSION['chucvu'])){?>
                <button class="button1" onclick="modangnhap()">Đăng nhập </button>
              <?php }else{?>
                  <div class="account-box" >
                    <button class="button1">Tài khoản</button>
                    <ul  class="account-content">
                  <!-- Trường hợp 1 -->
                  <?php if($_SESSION['chucvu'] == 'nguoidung'){ ?>
                        <li><a href="">Thông tin</a></li>
                  <!-- Trường hợp 2 -->
                  <?php }else if($_SESSION['chucvu'] == 'nhanvien'){ ?>
                        <li><a href="">Quản lý</a></li>
                  <?php }else if($_SESSION['chucvu'] == 'admin'){ ?>
                        <li><a href="">QL</a></li>
                   <?php } ?>
                        <li><a  href="<?php echo _WEB_ROOT; ?>/home/logout" >Đăng xuất</a></li>
                      </ul>
                   </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </header>





    <form action="<?= _WEB_ROOT; ?>\home\authLogin" class="formdkdn" id="dangky" method="post">
      <legend>Đăng ký ngay - quyền lợi liền tay</legend><br>
      <p>Bạn đã có tài khoản?</p>
      <a href="#" onclick="modangnhap()" style="text-decoration: none;font-weight: bold;">đăng nhập</a>
      <br>
      <label for="hoten">Họ và Tên: </label>
      <input type="text" name="hoten" id="hoten" required placeholder="Nhập vào họ và tên"/><br />
      <label for="email">Email: </label>
      <input type="email" name="email" id="email" required placeholder="Nhập vào email"/><br />
      <label for="taikhoan">Tên tài khoản: </label>
      <input type="text" name="taikhoan" id="taikhoan" required placeholder="Nhập vào tên đăng nhập"/><br />
      <label for="matkhau">Mật khẩu: </label>
      <input type="password" name="matkhau1" id="matkhau1"required placeholder="Nhập vào mật khẩu" /><br />
      <label for="xacnhan">Xác nhận: </label>
      <input type="password" name="matkhau2" id="matkhau2" required placeholder="Xác nhận lại mật khẩu"/><br /><br>
      <span style="font-size: 13px; text-align:center">Bằng việc đăng kí, bạn đã đồng ý với Di Động Việt về<br>
      <p style="font-size: 13px;color:red;display:inline">điều khoản dịch vụ</p>& <p style="font-size: 13px;color:red;display:inline">Chính sách bảo mật</p></span><br>
      <button name = "pushdata" >Đăng ký</button>
      <button style="margin-left: 20px" type="button" onclick="dongdangky()">Thoát</button>
    </form>
    <form action="<?= _WEB_ROOT; ?>\home\authLogin" class="formdkdn" id="dangnhap"method="post" >
      <legend>Đăng nhập</legend>
      <br>
      <p>Bạn chưa có tài khoản?</p>
      <a href="#" onclick="modangky()" style="text-decoration: none;font-weight: bold;" >đăng ký</a>
      <br>
      <label for="taikhoan">Tên tài khoản: </label>
      <input type="text" name="taikhoan" id="taikhoan" required placeholder="Tên đăng nhập" /><br />
      <label for="matkhau">Mật khẩu: </label>
      <input type="password" name="matkhau" id="matkhau" required placeholder="Mật khẩu" /><br /><br />
      <button name = "checklogin">Đăng nhập</button>
      <button style="margin-left: 20px" type="button" onclick="dongdangnhap()">Thoát</button>
    </form>
  </body>

</html>
