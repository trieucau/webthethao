<?php
include_once("controllers/cUser.php");
$p = new CUser();
$userbyid = $p->getOneUser($_REQUEST['iduser']);
$row = $userbyid->fetch_assoc();

if (isset($_REQUEST["p"]) && $_REQUEST["p"] == 'xoand') {
    if ($userbyid->num_rows >= 1) {
        // Kiểm tra xem có đang xóa chính tài khoản đang đăng nhập không
        if ($_SESSION['fullname'] == $row['fullname']) {
            echo "<script>alert('Tài khoản admin hiện tại đang sử dụng!!! Bạn đăng nhập tài khoác để xóa');</script>";
            header("refresh:0; url=admin.php?p=qlnguoidung");
            exit();
        }

        $kq = $p->removeUser($_REQUEST['iduser']);
        if ($kq === true) {
            echo "<script>alert('Xóa người dùng thành công!!!'); </script>";
        } elseif ($kq === -1) {
            echo "<script>alert('Lỗi kết nối server');</script>";
        } else {
            echo "<script>alert('Xóa người dùng thất bại!!! vui lòng thử lại'); </script>";
        }
    } else {
        echo "<script>alert('Không tìm thấy người dùng để xóa!');</script>";
    }

    // Điều hướng sau mọi trường hợp
    header("refresh:0; url=admin.php?p=qlnguoidung");
}
