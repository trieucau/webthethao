<div class="wapperQLSP">
    <h3>Danh sách Người dùng</h3>
    <?php

    include_once("controllers/cUser.php");
    $dem = 1;
    $p = new CUser();
    $resUserAll = $p->getAllUser();


    echo "<table style='border-collapse: collapse;'>
            <tr>
                <th>STT</th>
                <th>Tên tài khoản</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>";
    while ($row = $resUserAll->fetch_assoc()) {
        $gender = $row['gender'] ? "nam" : "nữ";
        $rote = '';
        switch ($row['rote'] ?? 0) {
            case 1: $rote = "admin"; break;
            case 2: $rote = "saler"; break;
            case 3: $rote = "user"; break;
            default: $role = "unknown";
        }
        echo "<tr>
            <td>" . $dem++ . "</td>
            <td>" . $row['username'] . "</td>
            <td>" . $row['fullname'] . "</td>
            <td>" . $gender . "</td>
            <td>" . $rote. " </td>
            <td>Xóa | Sửa</td>
        </tr>";
    }
    echo "</table>";
    ?>

</div>