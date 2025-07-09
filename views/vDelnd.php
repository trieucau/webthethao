<?php
include_once("controllers/cUser.php");
$p = new CUser();
if (isset($_REQUEST["p"]) && $_REQUEST["p"] == 'xoand') {
    $kq = $p->removeUser($_REQUEST['iduser']);
    if ($kq === true) {
        echo "<script>alert('Xóa người dùng thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlnguoidung");
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Xóa người dùng thất bại!!! vui lòng thử lại'); </script>";
    }
}
