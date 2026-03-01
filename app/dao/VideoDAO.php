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
    }