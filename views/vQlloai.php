<div class="wapperQLSP">
<h3>Danh sách Loại Sản Phẩm</h3>
<?php

    include_once("controllers/cCategory.php");
    $dem = 1;
    $p = new CCategory();
    $resCateAll = $p -> getAllCate();

    
    echo "<table style='border-collapse: collapse;'>
            <tr>
                <th>STT</th>
                <th>TenLoai</th>
                <th>Thao tác</th>
            </tr>";
    while($row = $resCateAll  -> fetch_assoc()){
        
        echo "<tr>
            <td>".$dem++."</td>
            <td>".$row['TenLoai']."</td>
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

