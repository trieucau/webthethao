<div class="wapperQLSP">
    <h3>Danh sách Loại Sản Phẩm</h3>
    <?php

    include_once("controllers/cCategory.php");
    $dem = 1;
    $p = new CCategory();
    $resCateAll = $p->getAllCate();


    echo "<table style='border-collapse: collapse;'>
            <tr>
                <th>STT</th>
                <th>TenLoai</th>
                <th>Thao tác</th>
            </tr>";
    while ($row = $resCateAll->fetch_assoc()) {

        echo "<tr>
            <td>" . $dem++ . "</td>
            <td>" . $row['TenLoai'] . "</td>
            <td>Xóa | Sửa</td>
        </tr>";
    }
    echo "</table>";
    ?>


</div>