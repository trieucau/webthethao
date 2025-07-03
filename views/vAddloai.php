<div class="wapperForm">
    <h3>Thêm loại</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên loại: </td>
                <td><input type="text" name="tenloai" id="" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnAddloai">Thêm loại </button>
                    <button type="reset">Nhập lại</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
include_once("controllers/cCategory.php");
$p = new CCategory();
if (isset($_REQUEST["btnAddloai"])) {
    $kq = $p->addCate($_REQUEST['tenloai']);
    if ($kq === true) {
        echo "<script>alert('Thêm loại thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlloai");
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Thêm sản phẩm thât bại!!! vui lòng thử lại'); </script>";
    }
}
?>