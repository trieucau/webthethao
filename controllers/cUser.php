<?php
include_once("models/mUser.php");
include_once("cUpload.php");
class CUser
{
    public function getAllUser()
    {
        $p = new MUser();

        $res = $p->selectAllUser();

        if ($res->num_rows > 0) {
            return $res;
        } elseif ($res == -1) {
            return -1; //loi ket noi
        } else {
            return -2; //khong ton tai
        }
    }


    public function addUser($username, $password, $fullname, $gender, $role, $file)
    {
        $p = new MUser();
        $upload = new CUpload();

        $avatar = $upload->uploadfile($file);

        if ($avatar === false) {
            return -2; // -2 Lỗi tải file
        }

        $passmd5 = md5($password);

        $res = $p->insertUser($username, $passmd5, $fullname, $gender, $role, $avatar);

        return ($res !== -1) ? $res : -1; //kq -1 loi ket noi
    }
}
