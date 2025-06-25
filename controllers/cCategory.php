<?php
include_once("models/mCategory.php");

class CCategory
{
    public function getAllCate()
    {
        $p = new MCategory();

        $res = $p->selectAllCate();

        if ($res->num_rows > 0) {
            return $res;
        } elseif ($res == -1) {
            return -1; //loi ket noi
        } else {
            return -2; //khong ton tai san pham
        }
    }
}
