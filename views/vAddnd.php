<?php ob_start(); ?>
<div class="wapperForm">
    <h3>Thêm người dùng</h3>
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
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gender" value=1> Nam
                    <input type="radio" name="gender" value=0> Nữ
                </td>
            </tr>
            <tr>
                <td>Vai trò: </td>
                <td>
                    <input type="radio" name="role" value=3> Quản lí
                     <input type="radio" name="role" value=2> Nhân viên
                     <input type="radio" name="role" value=1> Khách hàng
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="avatar" id="" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnAdd">Thêm</button>
                    <button type="reset">Nhập lại</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
include_once("controllers/cUser.php");
$p = new CUser();
if (isset($_REQUEST["btnAdd"])) {
    $kq = $p->addUser($_REQUEST['username'], $_REQUEST['pass'], $_REQUEST['fullname'], $_REQUEST['gender'], $_REQUEST['role'], $_FILES['avatar']);
    if ($kq === true) {
        echo "<script>alert('Thêm người dùng thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlnguoidung");
    } elseif ($kq === -2) {
        echo "<script>alert('Lỗi tải file hình ảnh! Kiểm tra định dạng hoặc kích thước file.');</script>";
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Thêm người dùng thất bại!!! vui lòng thử lại'); </script>";
    }
}
?>