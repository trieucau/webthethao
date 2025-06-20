<?php
include_once("mConnect.php");

class MCategory{
    public function selectAllCate(){
        $p = new MConnect();
        $conn = $p ->openConnect();

        if($conn ){
            $sql = "select * from  loaisanpham ";

            $tbCate = mysqli_query( $conn, $sql );

             $p->closeConnect($conn);

            return $tbCate;

        }else{
            return -1; //loi ket noi
        }
    }

}



?>