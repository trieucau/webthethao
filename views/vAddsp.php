<div class="wapperForm">
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên sản phẩm: </td>
                <td><input type="text" name="tensp" id="" required></td>
            </tr>
            <tr>
                <td>Giá gốc: </td>
                <td><input type="number" name="goc" id="" required></td>
            </tr>
            <tr>
                <td>Giá bán: </td>
                <td><input type="number" name="ban" id="" required></td>
            </tr>
            <tr>
                <td>Số Lượng: </td>
                <td><input type="number" name="sluong" id="" required></td>
            </tr>
            <tr>
                <td>Loại: </td>
                <td>
                    <?php
                    include_once("controllers/cCategory.php");
                    $c = new CCategory();
                    $allcat = $c->getAllCate();

                    echo '<select name="idloai">';
                    while ($r = $allcat->fetch_assoc()) {
                        echo '<option value="' . $r['IDLoai'] . '">' . $r['TenLoai'] . '</option>';
                    }
                    echo '</select>';

                    ?>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinh" id="" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnAddsp">Thêm sản phẩm </button>
                    <button type="reset">Nhập lại</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
// include_once("controllers/cDangnhap.php");
// $p = new CDangnhap();
// if (isset($_POST["btnDn"])) {
//     if ($p->checkLogin($_POST['textname'], $_POST['textpass'])) {
//         $_SESSION['login'] = true;
//         $gender = $_SESSION['gender'] == 1 ? 'anh' : 'chị';
//         $fullname =  $_SESSION['fullname'];


//         echo "<script>alert('Chào mừng $gender , $fullname quay lại'); </script>";
//         header("refresh:0;url=index.php");
//     } else {
//         echo "<script>alert('Sai thông tin đăng nhập'); </script>";
//     }
// }
?>