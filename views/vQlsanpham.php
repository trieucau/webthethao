<div class="wapperQLSP">
    <h3>Danh sách sản phẩm</h3>
    <?php

    include_once("controllers/cProduct.php");
    $dem = 1;
    $p = new CProduct();

    if (isset($_REQUEST['btnTim'])) {
        $name = $_REQUEST['txtsearch'];
        $resProdAll = $p->getProdbyName($name);
    } else {
        $resProdAll = $p->getAllProd();
    }




    echo "<table style='border-collapse: collapse;'>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Gía  bán</th>
                <th>Gía gốc</th>
                <th>Số lượng</th>
                <th>Loại </th>
                <th>Thao tác</th>
            </tr>";

    if ($resProdAll instanceof mysqli_result) {
        while ($row = $resProdAll->fetch_assoc()) {
            echo "<tr>
        <td>" . $dem++ . "</td>
        <td>" . $row['TenSanPham'] . "</td>
        <td><img src = 'img/sp/" . $row['HinhAnh'] . "' alt='" . $row['HinhAnh'] . "'></img></td>
        <td>" . number_format($row['GiaBan'], 0, ",", ".") . " VNĐ</td>
        <td>" . number_format($row['GiaGoc'], 0, ",", ".") . " VNĐ</td>
        <td>" . $row['SoLuong'] . " </td>
        <td>" . $row['TenLoai'] . " </td>
        <td>
            <a href='?p=suasp&idsp=" . $row['IDSanPham'] . "'>Sửa</a> | 
            <a href='?p=xoasp&idsp=" . $row['IDSanPham'] . "'>Xóa</a>
        </td>
    </tr>";
        }
    } else {
        // Trường hợp lỗi (giá trị -1 hoặc -2)
        if ($resProdAll == -1) {
            echo "<tr><td colspan='8' style='color: red; text-align: center;'>Lỗi server!</td></tr>";
        } else {
            echo "<tr><td colspan='8' style='color: red; text-align: center;'>Không tồn tại loại nào!</td></tr>";
        }
    }

    echo "</table>";
    ?>
</div>