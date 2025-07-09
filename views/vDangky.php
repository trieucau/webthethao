<div class="wapperForm">
    <h3>Đăng ký tài khoản</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Họ và tên: </td>
                <td><input type="text" name="fullname" id="" required></td>
            </tr>
            <tr>
                <td>Tên người dùng: </td>
                <td><input type="text" name="username" id="" required></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="pass" id="" required></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="avatar" id="" required></td>
                <td><input type="hidden" name="role" value=1></td>

            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gender" value=1>Nam
                    <input type="radio" name="gender" value=0>Nữ
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnDk">Đăng ký</button>
                    <button type="reset">Nhập lại</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
include_once("controllers/cUser.php");
$p = new CUser();
if (isset($_REQUEST["btnDk"])) {
    echo $_FILES['avatar']['tmp_name'];
    //$username, $password, $fullname, $gender , $rote , $file
    $kq = $p->addUser($_REQUEST['username'], $_REQUEST['pass'], $_REQUEST['fullname'], $_REQUEST['gender'], $_REQUEST['role'], $_FILES['avatar']);
    if ($kq === true) {
        echo "<script>alert('Đăng ký thành công!!!'); </script>";
        header("refresh:0; url=index.php?p=dangnhap");
    } elseif ($kq === -2) {
        echo "<script>alert('Lỗi tải file hình ảnh! Kiểm tra định dạng hoặc kích thước file.');</script>";
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Đăng ký thất bại!!! vui lòng thử lại'); </script>";
    }
}
?>