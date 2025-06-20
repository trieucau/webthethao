<?php

    class MConnect{
       public function openConnect(){
        $host = "localhost";
        $user = "trieu";
        $pass = "21134331";
        $db = "dbhe";

        return mysqli_connect($host,$user,$pass,$db);
       }

       public function closeConnect( $conn ){
            mysqli_close($conn);
       }
    }


?>