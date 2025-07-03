<?php
include_once("mConnect.php");

class MCategory
{
    public function selectAllCate()
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "select * from  loaisanpham ";

            $tbCate = mysqli_query($conn, $sql);

            $p->closeConnect($conn);

            return $tbCate;
        } else {
            return -1; //loi ket noi
        }
    }

    public function selectAllOfType($key)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "select * from  loaisanpham where IDLoai = '$key'";

            $tbOneCate = mysqli_query($conn, $sql);

            $p->closeConnect($conn);

            return $tbOneCate;
        } else {
            return -1; //loi ket noi
        }
    }

    public function insertCate($name)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "insert into loaisanpham (TenLoai) values ('$name')";

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
