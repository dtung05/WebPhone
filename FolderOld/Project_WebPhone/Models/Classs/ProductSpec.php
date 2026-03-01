<?php 
    class ProductSpec{
        private $masp;
        private $manhinh;
        private $hedieuhanh;
        private $camarasau;
        private $camaratruoc;
        private $cpu;
        private $ram;
        private $dungluongpin;
        private $thesim;
        private $thietke;
        
        public function __construct($masp, $manhinh ,
                                $hedieuhanh , $camarasau ,
                                $camaratruoc,$cpu,$ram,
                                $dungluongpin,$thesim,$thietke){
            $this->masp = $masp;
            $this->manhinh = $manhinh;
            $this->hedieuhanh = $hedieuhanh;
            $this->camarasau = $camarasau;
            $this->camaratruoc = $camaratruoc;
            $this->cpu = $cpu;
            $this->ram = $ram;
            $this->dungluongpin = $dungluongpin;
            $this->thesim = $thesim;
            $this->thietke = $thietke;
        }
        // Hamf lấy thông số sản phẩm ProductSpec
        public function getMasp(){
            return $this->masp;
        }
        public function getManhinh(){
            return $this->manhinh;
        }
        public function getHedieuhanh(){
            return $this->hedieuhanh;
        }
        public function getCamarasau(){
            return $this->camarasau;
        }
        public function getCammaratruoc(){
            return $this->camaratruoc;
        }
        public function getCpu(){
            return $this->cpu;
        }
        public function getRam(){
            return $this->ram;
        }
        public function getDungluongpin(){
            return $this->dungluongpin;
        }
        public function getThesim(){
            return $this->thesim;
        }
        public function getThietke(){
            return $this->thietke;
        }
        // Hành sửa thông tin ProductSpec
        public function setMasp($masp){
            $this->masp = $masp;
        }
        public function setMahinh($manhinh){
            $this->manhinh = $manhinh;
        }
        public function setHedieuhanh($hedieuhanh){
            $this->hedieuhanh = $hedieuhanh;
        }
        public function setCammarasau($camarasau){
            $this->camarasau = $camarasau;
        }
        public function setCamaratruoc($camaratruoc){
            $this->camaratruoc = $camaratruoc;
        }
        public function setCpu($cpu){
            $this->cpu = $cpu;
        }
        public function setRam($ram){
            $this->ram = $ram;
        }
        public function setDungluongpin($dungluongpin){
            $this->dungluongpin = $dungluongpin;
        }
        public function setThesim($thesim){
            $this->thesim = $thesim;
        }
        public function setThietke($thietke){
            $this->thietke = $thietke;
        }

    }
?>