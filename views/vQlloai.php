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
                <th>Tên Loại</th>
                <th>Thao tác</th>
            </tr>";
    while ($row = $resCateAll->fetch_assoc()) {

        echo "<tr>
            <td>" . $dem++ . "</td>
            <td>" . $row['TenLoai'] . "</td>
         
            <td>
            <a href='?p=sualoai&idloai=" . $row['IDLoai'] . "'>Sửa</a> | 
            <a href='?p=xoaloai&idloai=" . $row['IDLoai'] . "'>Xóa</a>
        </td>
        </tr>";
    }
    echo "</table>";
    ?>


</div>