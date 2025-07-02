<?php
include_once("models/mProduct.php");
include_once("cUpload.php");


class CProduct
{
    public function getAllProd()
    {
        $p = new MProduct();

        $res = $p->selectAllProd();


        if ($res instanceof mysqli_result) {
            if ($res->num_rows > 0) {
                return $res;
            } else {
                return -2; //khong ton tai san pham
            }
        } else {
            return -1; //loi ket noi
        }
    }

    public function getOneProd($id)
    {
        $p = new MProduct();

        $res = $p->selectOneProd($id);


        if ($res instanceof mysqli_result) {
            if ($res->num_rows > 0) {
                return $res;
            } else {
                return -2; //khong ton tai san pham
            }
        } else {
            return -1; //loi ket noi
        }
    }

    public function getOneProdbyType($key)
    {
        $p = new MProduct();

        $res = $p->selectProdbyType($key);

        if ($res instanceof mysqli_result) {
            if ($res->num_rows > 0) {
                return $res;
            } else {
                return -2; //khong ton tai san pham
            }
        } else {
            return -1; //loi ket noi
        }
    }

    public function getProdbyName($name)
    {
        $p = new MProduct();

        $res = $p->selectProdbyName($name);

        if ($res instanceof mysqli_result) {
            if ($res->num_rows > 0) {
                return $res;
            } else {
                return -2; //khong ton tai san pham
            }
        } else {
            return -1; //loi ket noi
        }
    }

    public function addProd($tensp, $file, $giagoc, $giaban, $soluong, $idloai)
    {
        $p = new MProduct();
        $upload = new CUpload();

        $pathname = $upload->uploadfile($file);

        if ($pathname === false) {
            return -2; // -2 Lỗi tải file
        }

        $res = $p->insertProd($tensp,  $pathname, $giagoc, $giaban, $soluong, $idloai);

        return ($res !== -1) ? $res : -1; //kq -1 loi ket noi
    }
}
