<?php
    class Home extends Controller{

        public function index(){ // controller của trang chủ
            $Service = parent::callService("ProductService");
            $DAO = parent::callDAO('ProductDAO');

            $data = $Service->indexService($DAO);
           
            $data['content']= 'client/index';
            $data['style'] = 'productbrand';
            $data['script']= 'quangcao';
            $this->callView('layouts/LayoutClient',$data);
        }
        // xử lý đăng nhập
        public function authLogin(){
            $data['account'] = $_POST['taikhoan'];
            $data['password'] = $_POST['matkhau'];
            $Service = $this->callService('UserService');
            $dao = $this->callDAO('UserDAO');
            try{
                 $check =$Service->authLoginService($data,$dao);// Gọi service check 
            }catch(PDOException $err){ // bắt lỗi
                $_SESSION['thongbao'] = $err->getMessage();   
            }if($check){
                if($_SESSION['role'] == 'staff'){
                    header ("location:"._WEB_ROOT.'/Product/index');
                    exit;
                }else{
                    header ("location:"._WEB_ROOT.'/Home/index');
                    exit;
                }
            }else{
                 header ("location:"._WEB_ROOT.'/home');
                exit;
            }
           
            
        }
        // xử lý đăng xuất
        public function logout(){
            session_destroy();
            header ("location:"._WEB_ROOT.'/home');
            exit;
        }
        public function news(){
            $data['content'] = 'client/news';
            $data['style'] = 'news';
            $this->callView('layouts/LayoutClient',$data);
        }
    }