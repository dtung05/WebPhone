<?php
class Conn {
    private $host = "localhost";
    private $dbname = "Webepdhone";
    private $user = "root";
    private $pass = "";

    public function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
        try {
            
            return new PDO($dsn, $this->user, $this->pass,
            [   
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
            );
        } catch (PDOException $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }
}
class DAOComment{
    private $db;
    function __construct($connect){
        $this->db = $connect;
    }
    
}
$conn = new Conn();
$connect = $conn->connect();
$DAO = new DAOComment($connect);
?>
