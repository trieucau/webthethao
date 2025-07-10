<div class="wapperQLSP">
    <h3>Danh sách Người dùng</h3>
    <?php

    include_once("controllers/cUser.php");
    $dem = 1;
    $p = new CUser();

    if (isset($_REQUEST['btnTim'])) {
        $name = $_REQUEST['txtsearch'];
        $resUserAll = $p->getUserbyName($name);
    } else {
        $resUserAll = $p->getAllUser();
    }




    echo "<table style='border-collapse: collapse;'>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>        
                <th>Tên tài khoản</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>";
    if ($resUserAll instanceof mysqli_result) {
        while ($row = $resUserAll->fetch_assoc()) {
            $gender = $row['gender'] ? "nam" : "nữ";
            $role = '';
            switch ($row['IDRole'] ?? 0) {
                case 3:
                    $role = "Quản lí";
                    break;
                case 2:
                    $role = "Nhân viên";
                    break;
                case 1:
                    $role = "Khách hàng";
                    break;
                default:
                    $role = "unknown";
            }
            echo "<tr>
            <td>" . $dem++ . "</td>
             <td><img src = 'img/sp/" . $row['avatar'] . "' alt='" . $row['avatar'] . "'></img></td>
            <td>" . $row['username'] . "</td>
            <td>" . $row['fullname'] . "</td>
            <td>" . $gender . "</td>
            <td>" . $role . " </td>
             <td>
            <a href='?p=suand&iduser=" . $row['id'] . "'>Sửa</a> | 
            <a href='?p=xoand&iduser=" . $row['id'] . "'>Xóa</a>
        </td>
        </tr>";
        }
    } else {
        if ($resUserAll == -1) {
            echo "<tr><td colspan='7' style='color: red; text-align: center;'>Lỗi server!</td></tr>";
        } else {
            echo "<tr><td colspan='7' style='color: red; text-align: center;'>Không Họ và tên đã tìm kiếm!</td></tr>";
        }
    }
    echo "</table>";
    ?>

</div>