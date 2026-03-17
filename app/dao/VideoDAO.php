<?php 
    class VideoDAO{
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        public function getVideo($idProduct){
            $sql = " Select id,masp,url as urlVideo
                    from videodanhgia
                    where masp = :masp";
            $data = ['masp' => $idProduct];
            $query = $this->conn->prepare($sql);
            $query->execute($data);
            return $query->fetchAll();
        }
        public function addVideo($video){
            $insert = implode(',',array_fill(0,count($video)/2,"(?,?)"));
            $sql = "INSERT INTO videodanhgia(masp,url)
                    VALUES $insert ";
            $query = $this->conn->prepare($sql);
            return $query->execute($video);
        }
    }