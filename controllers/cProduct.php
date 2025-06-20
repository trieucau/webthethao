<?php
    include_once("models/mProduct.php");

    class CProduct{
        public function getAllProd (){
            $p = new MProduct();

            $res = $p -> selectAllProd();

            if($res -> num_rows > 0){
                return $res;
            }elseif($res == -1){
                return -1; //loi ket noi
            }else{
                return -2; //khong ton tai san pham
            }
            
        }
    }
?>