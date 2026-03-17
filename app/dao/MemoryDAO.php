<?php
    class MemoryDAO{
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        public function getMemory($idProduct){
            $sql = "SELECT masp,bonho,gia
                    FROM bonho
                    WHERE masp = :masp
                    ORDER BY gia ASC";
            $query = $this->conn->prepare($sql);
            $query->execute([':masp' => $idProduct]);
            return $query->fetchAll();
        }
        public function addMemory($memory){
            $insert = implode(',',array_fill(0,count($memory)/3,"(?,?,?)"));
            $sql = "INSERT INTO bonho(masp,bonho,gia)
                    Values $insert";
            $query = $this->conn->prepare($sql);
            return $query->execute($memory);
        }
    }