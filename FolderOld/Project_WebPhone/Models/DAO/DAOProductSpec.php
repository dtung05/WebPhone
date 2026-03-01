<?php 
   
    // require_once "../Classs/ProductSpec.php";
    class DAOProductSpec{
        // private $conn;
        // public function __construct(){
        //     $database = new Database();
        //     $this->conn = $database->connect();
        // }
        public function addProductSpec(ProductSpec $ps,$conn){
            $sql = "INSERT INTO thongsokythuat(masp,manhinh, hedieuhanh,camarasau, camaratruoc,cpu,ram,dungluongpin, thesim, thietke)
                    Values(:masp, :manhinh, :hedieuhanh, :camarasau, :camaratruoc, :cpu, :ram, :dungluongpin, :thesim, :thietke)";
            try{
                $query = $conn->prepare($sql);
                $query->execute(
                [
                    ':masp'=>$ps->getMasp(),
                    ':manhinh'=>$ps->getManhinh(),
                    ':hedieuhanh'=>$ps->getHedieuhanh(),
                    ':camarasau'=>$ps->getCamarasau(),
                    ':camaratruoc'=>$ps->getCammaratruoc(),
                    ':cpu'=>$ps->getCpu(),
                    ':ram'=>$ps->getRam(),
                    ':dungluongpin'=>$ps->getDungluongpin(),
                    ':thesim' =>$ps->getThesim(),
                    ':thietke' => $ps->getThietke(),
                ]
            );
            return true;
            }catch(PDOException $err){
                throw $err;
            }   
        }
    }
?>