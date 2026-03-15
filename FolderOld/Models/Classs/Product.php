<?php 
class Product{
    private $masp;
    private $tensp;
    private $gia;
    private $mota;
    private $soluong;
    private $danhmuc_id;
    public function __construct($masp, $tensp, $gia, $mota,$soluong, $danhmuc_id){
        $this->masp = $masp;
        $this->tensp = $tensp;
        $this->gia = (double)$gia;
        $this->mota = $mota;
        $this->soluong = (int) $soluong;
        $this->danhmuc_id = $danhmuc_id;
    }
    public function getMasp() {
        return $this->masp;
    }
    public function getTensp() {
        return $this->tensp;
    }
    public function getGia() {
        return $this->gia;
    }
    public function getMota() {
        return $this->mota;
    }
    public function getSoluong() {
        return $this->soluong;
    }
    public function getDanhmucId() {
        return $this->danhmuc_id;
    }
    public function setMasp($masp) {
    $this->masp = $masp;
    }
    public function setTensp($tensp) {
        $this->tensp = $tensp;
    }
    public function setGia($gia) {
        $this->gia = (float) $gia;
    }
    public function setMota($mota) {
        $this->mota = $mota;
    }
    public function setSoluong($soluong) {
        $this->soluong = (int) $soluong;
    }
    public function setDanhmucId($danhmuc_id) {
        $this->danhmuc_id = $danhmuc_id;
    }

}

?>