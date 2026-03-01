<?php
    class CommentDAO{
        private $conn;
        public function __construct($conn){
            $this->conn = $conn;
        }
        public function getComment($idProduct){
            $sql = "
                SELECT dg.id, masp,mataikhoan,sosao,noidung,ngaydanhgia,hoten
                FROM danhgia as dg
                join taikhoan as tk on dg.mataikhoan = tk.id
                WHERE masp = :masp
                ORDER BY ngaydanhgia DESC
                limit 5
            ";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':masp' => $idProduct
            ]);
            return $query->fetchAll();
        }

        public function getDetailComment($idProduct){
            $sql = "SELECT sum(sosao = 1) as one,
                sum(sosao = 2) as two,
                sum(sosao = 3) as three,
                sum(sosao = 4) as four,
                sum(sosao = 5) as five,
                sum(sosao) as sumStart,
                count(id) as sumComment,
                avg(sosao) as avg
                FROM danhgia
                WHERE masp = :masp";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':masp' => $idProduct
            ]);
            return $query->fetch();
        }
        public function addComment( $masp,$mataikhoan,$sosao, $noidung){
            $sql = "INSERT INTO danhgia(masp,mataikhoan,sosao,noidung)
                    VALUES(:masp, :mataikhoan , :sosao, :noidung )";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ':masp' => $masp,
                ':mataikhoan' => $mataikhoan,
                ':sosao' => $sosao,
                ':noidung' => $noidung
            ]);
            return $query;
        }
        public function deleteComment($id,$idUser){
            $sql = " DELETE FROM danhgia
                    WHERE id = :id AND mataikhoan = :mataikhoan";
            $query = $this->conn->prepare($sql);
            $query->execute([
                ":id" => $id,
                ":mataikhoan" => $idUser
            ]);
            return $query->rowCount();
        }
    }