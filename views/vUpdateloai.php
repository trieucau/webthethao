<?php ob_start();

include_once("controllers/cCategory.php");
$p = new CCategory();

if (isset($_REQUEST['idloai'])) {
    $resProdOne = $p->getOneCate($_REQUEST['idloai']);
    $row =  $resProdOne->fetch_assoc();
}
?>
<div class="wapperForm">
    <h3>Sửa loại</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên loại: </td>
                <td><input type="text" name="tenloai" value="<?php if (isset($row['TenLoai'])) echo $row['TenLoai']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnUpdateloai">Sửa loại </button>
                    <button type="reset">Nhập lại</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
include_once("controllers/cCategory.php");
$p = new CCategory();
if (isset($_REQUEST["btnUpdateloai"])) {
    $kq = $p->editCate($_REQUEST['idloai'], $_REQUEST['tenloai']);
    if ($kq === true) {
        echo "<script>alert('Sửa loại thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlloai");
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Sửa loại thất bại!!! vui lòng thử lại'); </script>";
    }
}
?>