<?php
include_once("models/mProduct.php");

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
}
