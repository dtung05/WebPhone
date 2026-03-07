<?php
    class UserService{
        public function authLoginService($data,$dao){
            $user = $dao->authLoginDAO($data['account']);
            if(!$user){
                $_SESSION['thongbao'] = "Không tìm thấy thông tin tài khoản";
            }else{
                if( $user['matkhau'] === $data['password']){
                    $_SESSION['chucvu'] = $user['chucvu'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['hoten'] = $user['hoten'];
                    $_SESSION['thongbao'] = "Đăng nhập thành công";
                }else{
                    $_SESSION['thongbao'] = 'Tài khoản không hợp lệ';
                }
            }
        }

    }