<?php

class Controller{
    protected static $conn;
    public static function init($db_config){
       $connect = new Connect($db_config);
       self::$conn = $connect->getConnect();
    }
    public static function getConn(){
       return self::$conn;
    }
    // Controller xử lý nhúng service
    public function callService($nameService){ // class  chứa logic xử lý
        if(file_exists(_DIR_ROOT.'/app/services/'.$nameService.'.php')){
            require_once _DIR_ROOT.'/app/services/'.$nameService.'.php';
            if(class_exists($nameService)){
                $Service = new $nameService();
                return $Service;
            }
        }
        return false;
    }
    // Controller xử lý nhúng DAO
    public function callDAO($nameDAO){
        if(file_exists(_DIR_ROOT.'/app/dao/'.$nameDAO.'.php')){
            require_once _DIR_ROOT.'/app/dao/'.$nameDAO.'.php';
            if(class_exists($nameDAO)){
                $DAO = new $nameDAO(self::$conn);
                return $DAO;
            }
        }
        return false;
    }
    // method view cần đổi 1 lần chuỗi ra value (key sang biến);
     public function callView($nameView, $data = []){
        if(file_exists(_DIR_ROOT.'/app/views/'.$nameView.'.php')){
            extract($data);
            require_once _DIR_ROOT.'/app/views/'.$nameView.'.php';
            return true;
        }
        return false;
    }
} 