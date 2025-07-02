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

    public function selectOneProd($id)
    {
        $p = new MConnect();
        $conn = $p->openConnect($id);

        if ($conn) {
            $sql = "select * from sanpham s join loaisanpham l on s.IDLoai = l.IDLoai where IDSanPham = '$id' ";

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
            $sql = "SELECT s.*, l.TenLoai FROM sanpham s 
              INNER JOIN loaisanpham l ON s.IDLoai = l.IDLoai 
              WHERE s.TenSanPham LIKE '%$name%' ";

            $tbProd = mysqli_query($conn, $sql);

            $p->closeConnect($conn);

            return $tbProd;
        } else {
            return -1; //loi ket noi
        }
    }

    public function insertProd($tensp, $pathname, $giagoc, $giaban, $soluong, $idloai)
    {
        $p = new MConnect();
        $conn = $p->openConnect();

        if ($conn) {
            $sql = "INSERT INTO sanpham (TenSanPham,HinhAnh, GiaGoc, GiaBan, SoLuong, IDLoai) VALUES ('$tensp', '$pathname', $giagoc, $giaban, $soluong, $idloai)";

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
