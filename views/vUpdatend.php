<?php ob_start();

include_once("controllers/cUser.php");
$p = new CUser();

if (isset($_REQUEST['iduser'])) {
    $res = $p->getOneUser($_REQUEST['iduser']);
    $row =  $res->fetch_assoc();
}
?>
<div class="wapperForm">
    <h3>Sửa người dùng</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Họ và tên: </td>
                <td><input type="text" name="fullname" value="<?php if (isset($row['fullname'])) echo $row['fullname']; ?>" id="" required></td>
            </tr>
            <tr>
                <td>Tên người dùng: </td>
                <td><input type="text" name="username" value="<?php if (isset($row['username'])) echo $row['username']; ?>" id="" required></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="pass" value="<?php if (isset($row['password'])) echo $row['password']; ?>" id="" required></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" <?php if (isset($row['gender']) && $row['gender'] == 1) echo "checked"; ?> name="gender" value=1> Nam
                    <input type="radio" <?php if (isset($row['gender']) && $row['gender'] == 0) echo "checked"; ?> name="gender" value=0> Nữ
                </td>
            </tr>
            <tr>
                <td>Vai trò: </td>
                <td>
                    <input type="radio" name="role" <?php if (isset($row['IDRole']) && $row['IDRole'] == 3) echo "checked"; ?> value=3> Quản lí
                     <input type="radio" name="role" <?php if (isset($row['IDRole']) && $row['IDRole'] == 2) echo "checked"; ?> value=2> Nhân viên
                     <input type="radio" name="role" <?php if (isset($row['IDRole']) && $row['IDRole'] == 1) echo "checked"; ?> value=1> Khách hàng
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="avatar" id=""></td>
            </tr>
            <tr>
                <td colspan="2"> <img src="img/sp/<?php if (isset($row['avatar'])) echo $row['avatar']; ?>" width="150px"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnAdd">Sửa</button>
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
    // editUser($id, $username, $password, $fullname, $gender, $role, $avatar, $file)
    $kq = $p->editUser($_REQUEST["iduser"], $_REQUEST['username'], $_REQUEST['pass'], $_REQUEST['fullname'], $_REQUEST['gender'], $_REQUEST['role'], $row['avatar'], $_FILES['avatar']);
    if ($kq === true) {
        echo "<script>alert('Sửa người dùng thành công!!!'); </script>";
        header("refresh:0; url=admin.php?p=qlnguoidung");
    } elseif ($kq === -2) {
        echo "<script>alert('Lỗi tải file hình ảnh! Kiểm tra định dạng hoặc kích thước file.');</script>";
    } elseif ($kq === -1) {
        echo "<script>alert('Lỗi kết nối server');</script>";
    } else {
        echo "<script>alert('Sửa người dùng thất bại!!! vui lòng thử lại'); </script>";
    }
}
?>