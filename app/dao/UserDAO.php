<?php 
    class UserDAO{
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        // hàm lấy ra thông tin người dùng theo tài khoản;
        public function authLoginDAO($account){
            $sql = "Select hoten, taikhoan, matkhau,chucvu,id
                    from taikhoan
                    where taikhoan = :account";
            $data = ['account' => $account ];
            $query = $this->conn->prepare($sql);
            $query->execute($data);
            return $query->fetch();
        }
    }