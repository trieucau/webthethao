<?php
    include_once("models/mUser.php");

    class CUser{
        public function getAllUser (){
            $p = new MUser();

            $res = $p -> selectAllUser();

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