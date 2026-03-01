<?php 
    class Database{
        private $DSN = "mysql:host=localhost;dbname=webphone;charset=utf8";
        private $account = "root";
        private $password = "";
        private $options = [
            PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
        ];
        public function connect(){
            return new PDO($this->DSN,
                            $this->account, 
                            $this->password,
                            $this->options);
        }
    }
?>
