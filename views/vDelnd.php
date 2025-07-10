<?php
include_once("controllers/cUser.php");
$p = new CUser();
$userbyid = $p->getOneUser($_REQUEST['iduser']);
$row = $userbyid->num_rows;


if (isset($_REQUEST["p"]) && $_REQUEST["p"] == 'xoand') {
    if ($row < 1) {
        $kq = $p->removeUser($_REQUEST['iduser']);
        if ($kq === true && $row == 1) {
            echo "<script>alert('Xóa người dùng thành công!!!'); </script>";
            header("refresh:0; url=admin.php?p=qlnguoidung");
        } elseif ($kq === -1) {
            echo "<script>alert('Lỗi kết nối server');</script>";
        } else {
            echo "<script>alert('Xóa người dùng thất bại!!! vui lòng thử lại'); </script>";
        }
    } else {
        echo "<script>alert('Tài khoản admin hiện tại đang sử dụng!!! Bạn đăng nhập tài khác để xóa'); </script>";
        header("refresh:0; url=admin.php?p=qlnguoidung");
    }
}
