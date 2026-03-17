<?php
    class UserService{
        public function authLoginService($data,$dao){
            $user = $dao->authLoginDAO($data['account']);
            if(!$user){
                $_SESSION['thongbao'] = "Không tìm thấy thông tin tài khoản";
                return false;
            }else{
                if( $user['matkhau'] === $data['password']){
                    $_SESSION['chucvu'] = $user['chucvu'];
                    switch($_SESSION['chucvu']){
                        case 'nhanvien':
                            $_SESSION['role'] = 'staff';
                            break;
                        case 'admin':
                            $_SESSION['role'] = 'admin';
                            break;
                        case 'nguoidung':
                            $_SESSION['role'] = 'nguoidung';
                    }
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['hoten'] = $user['hoten'];
                    $_SESSION['thongbao'] = "Đăng nhập thành công";
                    return true;
                }else{
                    $_SESSION['thongbao'] = 'Tài khoản không hợp lệ';
                    return false;
                }
            }
        }

    }