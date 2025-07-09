<?php ob_start();

include_once("controllers/cProduct.php");
$p = new CProduct();

if (isset($_REQUEST['idsp'])) {
    $resProdOne = $p->getOneProd($_REQUEST['idsp']);
    $row =  $resProdOne->fetch_assoc();
}
?>
<div class="wapperForm">
    <h3>Sửa sản phẩm</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Tên sản phẩm: </td>
                <td><input type="text" name="tensp" value="<?php if (isset($row['TenSanPham'])) echo $row['TenSanPham']; ?> " id="" required></td>
            </tr>
            <tr>
                <td>Giá gốc: </td>
                <td><input type="number" name="goc" value=<?php if (isset($row['GiaGoc'])) echo $row['GiaGoc']; ?> id="" required></td>
            </tr>
            <tr>
                <td>Giá bán: </td>
                <td><input type="number" name="ban" value=<?php if (isset($row['GiaBan'])) echo $row['GiaBan']; ?> id="" required></td>
            </tr>
            <tr>
                <td>Số Lượng: </td>
                <td><input type="number" name="sluong" value=<?php if (isset($row['SoLuong'])) echo $row['SoLuong']; ?> id="" required></td>
            </tr>
            <tr>
                <td>Loại: </td>
                <td>
                    <?php
                    include_once("controllers/cCategory.php");
                    $c = new CCategory();
                    $allcat = $c->getAllCate();

                    echo '<select name="idloai"  >';
                    if ($allcat instanceof mysqli_result) {
                        while ($r = $allcat->fetch_assoc()) {
                            if ($r['TenLoai'] == $row['TenLoai']) {
                                echo '<option selected class="active" value="' . $r['IDLoai'] . '">' . $r['TenLoai'] . '</option>';
                            } else {
                                echo '<option value="' . $r['IDLoai'] . '">' . $r['TenLoai'] . '</option>';
                            }
                        }
                    } else {
                        echo '<option value="null">Không có dữ liệu</option>';
                    }
                    echo '</select>';

                    ?>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinh"></td>
            </tr>
            <tr>
                <td colspan="2"> <img src="img/sp/<?php if (isset($row['HinhAnh'])) echo $row['HinhAnh']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnUpdatesp">Sửa sản phẩm </button>
                    <button type="reset">Nhập lại</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
include_once("controllers/cProduct.php");
$p = new CProduct();
if (isset($_REQUEST["btnUpdatesp"])) {
    $kq = $p->editProd($_REQUEST['idsp'], $_REQUEST['tensp'], $_FILES['hinh'], $row['HinhAnh'], $_REQUEST['goc'], $_REQUEST['ban'], $_REQUEST['sluong'], $_REQUEST['idloai']);
    if ($kq === true) {
        echo "<script>alert('Sửa sản phẩm thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlsanpham");
    } elseif ($kq === -2) {
        echo "<script>alert('Lỗi tải file hình ảnh! Kiểm tra định dạng hoặc kích thước file.');</script>";
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Thêm sản phẩm thât bại!!! vui lòng thử lại'); </script>";
    }
}
?>