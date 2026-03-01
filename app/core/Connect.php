<?php
class Connect{
    private $conn;//  tham số nhận kết nối
    public function __construct($db_config){
        $host =$db_config['host'];
        $user = $db_config['user'];
        $pass  = $db_config['pass'];
        $db = $db_config['db'];
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try{
            $this->conn = new PDO($dsn,$user,$pass,$options);
           
        }catch(PDOException $err){
            throw $err;
        }
    }
    // lấy ra kết nối
    public function getConnect(){
        return $this->conn;
    }

   
}