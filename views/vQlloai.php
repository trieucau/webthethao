<div class="wapperQLSP">
    <h3>Danh sách Loại Sản Phẩm</h3>
    <?php

    include_once("controllers/cCategory.php");
    $dem = 1;
    $p = new CCategory();


    if (isset($_REQUEST['btnTim'])) {
        $name = $_REQUEST['txtsearch'];
        $DataCate = $p->getCatebyName($name);
    } else {
        $DataCate = $p->getAllCate();
    }


    echo "<table style='border-collapse: collapse;'>
            <tr>
                <th>STT</th>
                <th>Tên Loại</th>
                <th>Thao tác</th>
            </tr>";

    if ($DataCate instanceof mysqli_result) {
        while ($row = $DataCate->fetch_assoc()) {

            echo "<tr>
            <td>" . $dem++ . "</td>
            <td>" . $row['TenLoai'] . "</td>
         
            <td>
            <a href='?p=sualoai&idloai=" . $row['IDLoai'] . "'>Sửa</a> | 
            <a href='?p=xoaloai&idloai=" . $row['IDLoai'] . "'>Xóa</a>
        </td>
        </tr>";
        }
    } else {
        // Trường hợp lỗi (giá trị -1 hoặc -2)
        if ($DataCate == -1) {
            echo "<tr><td colspan='5' style='color: red; text-align: center;'>Lỗi server!</td></tr>";
        } else {
            echo "<tr><td colspan='5' style='color: red; text-align: center;'>Không tồn tại loại nào!</td></tr>";
        }
    }
    echo "</table>";
    ?>


</div>