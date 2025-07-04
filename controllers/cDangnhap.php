<?php
    include_once("models/mUser.php");
    class CDangnhap{
        public function checkLogin($username , $password ){
            $muser = new MUser();
            $passmd5 = md5($password);

            $user = $muser->selectOneUser($username,  $passmd5 );

            if($user-> num_rows > 0){
               
                while($row = $user->fetch_assoc()){
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['gender'] = $row['gender'];
                     $_SESSION['avatar'] = $row['avatar'];
                }
                
                return true;
            }else{
            
                return false;
            }
        }

    }
?>