<?php
include_once("models/mConnect.php");
    class MUser{
        public function selectOneUser( $username, $password ){
            //tao doi tuong lop connect
            
            $p = new MConnect();

            //tao ket noi
            $conn = $p->openConnect();

            if( $conn == true ){
                $sql = "select * from user where username = '$username' and password = '$password'";
             
                $res = mysqli_query($conn, $sql);

                //dong ket noi
                $p->closeConnect($conn);

                 return $res;
            }
    
        }

        public function selectAllUser(){
            $p = new MConnect();
            $conn = $p ->openConnect();

            if($conn ){
                $sql = "select * from user ";

                $tbUser = mysqli_query( $conn, $sql );

                $p->closeConnect($conn);

                return $tbUser;

            }else{
                return -1; //loi ket noi
            }
        }

        public function insertUser($username, $password, $fullname, $gender , $rote , $avatar )
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "INSERT INTO user (username, password, fullname, gender, rote, avatar) VALUES ('$username', '$password', '$fullname', $gender , $rote , '$avatar')";

            if (mysqli_query($conn, $sql)) {
                $p->closeConnect($conn);
                return true;
            }

            $p->closeConnect($conn);
            return false;
        } else {
            return -1; //loi ket noi
        }
    }

    }


?>