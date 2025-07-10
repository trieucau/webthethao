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

    public function selectOneCate($id)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "select * from  loaisanpham where IDLoai = '$id'";

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

    public function updateCate($id, $name)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "UPDATE loaisanpham SET TenLoai = '$name'
                    where IDLoai = $id";

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

    public function deleteCate($id)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "DELETE FROM loaisanpham WHERE IDLoai= $id";

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

    public function selectCatebyName($name)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "SELECT * FROM loaisanpham 
              WHERE TenLoai LIKE '%$name%' ";

            $dataCat = mysqli_query($conn, $sql);

            $p->closeConnect($conn);

            return $dataCat;
        } else {
            return -1; //loi ket noi
        }
    }
}
