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

    public function getOneCate($id)
    {
        $p = new MCategory();

        $res = $p->selectOneCate($id);

        if ($res->num_rows > 0) {
            return $res;
        } elseif ($res == -1) {
            return -1; //loi ket noi
        } else {
            return -2; //khong ton tai san pham
        }
    }

    public function addCate($name)
    {
        $p = new MCategory();

        $res = $p->insertCate($name);

        return ($res !== -1) ? $res : -1; //kq -1 loi ket noi
    }

    public function editCate($id, $name)
    {
        $p = new MCategory();

        $res = $p->updateCate($id, $name);

        return ($res !== -1) ? $res : -1; //kq -1 loi ket noi
    }

    public function removeCate($id)
    {
        $p = new MCategory();

        $res = $p->deleteCate($id);

        return ($res !== -1) ? $res : -1; //kq -1 loi ket noi
    }
}
