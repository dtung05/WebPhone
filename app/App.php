<?php 


Class App{
    private $__controller,$__action,$__params,$__config;
    // hàm lấy dữ liệu
    public static function  inarr($data){
        echo "<pre>";
            print_r($data);
        echo "</pre>";
    }
    public function __construct(){
        $url = $this->getUrl();
        $url = trim($url,'/');// loại bỏ ký tự / ở đầu và cuối chuỗi
        $arrUrl = explode('/',$url);// cắt mảng
        $this->__controller = 'Home';
        $this->__action = 'index';
        if(!empty($arrUrl[0])){
             $this->__controller = ucfirst($arrUrl[0]); // gán tên file controller
        }
        if(!empty($arrUrl[1])){
             $this->__action = $arrUrl[1];// gán tên phương thức controller
        }
        $this->__params = array_slice($arrUrl,2);// tham số truyền vào phương thức
        $this->handleUrl();// gọi phương thức xử lý vào trong
    }
    public function getUrl(){
        if(empty($_SERVER['PATH_INFO'])){
            $url = 'home';       
        }else{
            $url = $_SERVER['PATH_INFO']; // lấy url
        }
        return $url;
    }
    public function handleUrl(){
        if(empty($_SESSION['role'])){
            $_SESSION['role'] = 'client';
        }
        $role = $_SESSION['role'];
        if(file_exists('app/'.$role .'/controllers/'.$this->__controller.'.php')){
            require_once('app/client/controllers/'.$this->__controller.'.php');
            $controller = new $this->__controller(); // khởi tạo đối tượng
            if(method_exists($controller,$this->__action)){
              call_user_func_array([$controller, $this->__action], $this->__params);// gọi ra phương thức trong đối tượng
            }else{
                 require_once 'app/client/views/error/404.php';
                exit();
            }
        }
        else{
            require_once 'app/client/views/error/404.php';
            exit();
        }
    }
 
}
