<?php
include_once("controllers/cProduct.php");
$p = new CProduct();
if (isset($_REQUEST["p"]) && $_REQUEST["p"] == 'xoasp') {
    $kq = $p->removeProd($_REQUEST['idsp']);
    if ($kq === true) {
        echo "<script>alert('Xóa sản phẩm thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlsanpham");
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Thêm sản phẩm thât bại!!! vui lòng thử lại'); </script>";
    }
}
?>