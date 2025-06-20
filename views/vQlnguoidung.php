<div class="wapperQLSP">
<h3>Danh sách Người dùng</h3>
<?php

    include_once("controllers/cUser.php");
    $dem = 1;
    $p = new CUser();
    $resUserAll = $p -> getAllUser();

    
    echo "<table style='border-collapse: collapse;'>
            <tr>
                <th>STT</th>
                <th>Tên tài khoản</th>
                <th>Họ tên</th>
                <th>Gioi tính</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>";
    while($row = $resUserAll -> fetch_assoc()){
        $gender = $row['rote'] ? "name" : "nữ";
        echo "<tr>
            <td>".$dem++."</td>
            <td>".$row['username']."</td>
            <td>".$row['fullname']."</td>
            <td>".$gender."</td>
            <td>".$row['rote']." </td>
            <td>Xóa | Sửa</td>
        </tr>";
    }
    echo "</table>";
?>

<!-- <table>
    <tr>
        <th>Stt</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Gía  bán</th>
        <th>Gía gốc</th>
        <th>Loại </th>
        <th>Thao tác</th>
    </tr>
    <tr>
        <td>Stt</td>
        <td>Tên sản phẩm</td>
        <td>Hình ảnh</td>
        <td>Gía  bán</td>
        <td>Gía gốc</td>
        <td>Loại </td>
        <td>Xóa | Sửa</td>
    </tr>
</table> -->
</div>

