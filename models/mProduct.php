<?php
include_once("mConnect.php");

class MProduct
{
    public function selectAllProd()
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "select * from sanpham s join loaisanpham l on s.IDLoai = l.IDLoai ";

            $tbProd = mysqli_query($conn, $sql);

            $p->closeConnect($conn);

            return $tbProd;
        } else {
            return -1; //loi ket noi
        }
    }

    public function selectProdbyType($key)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "select * from sanpham where IDLoai = '$key'";

            $tbProd = mysqli_query($conn, $sql);

            $p->closeConnect($conn);

            return $tbProd;
        } else {
            return -1; //loi ket noi
        }
    }

    public function selectProdbyName($name)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "select * from sanpham  where TenSanPham like N'%$name%'";

            $tbProd = mysqli_query($conn, $sql);

            $p->closeConnect($conn);

            return $tbProd;
        } else {
            return -1; //loi ket noi
        }
    }
}
