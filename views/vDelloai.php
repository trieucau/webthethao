<?php
include_once("controllers/cCategory.php");
$p = new CCategory();
if (isset($_REQUEST["p"]) && $_REQUEST["p"] == 'xoaloai') {
    $kq = $p->removeCate($_REQUEST['idloai']);
    if ($kq === true) {
        echo "<script>alert('Xóa loại thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlloai");
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Xóa loại thât bại!!! vui lòng thử lại'); </script>";
    }
}
