<div class="wapperSanPham">
    <?php
    include_once("controllers/cProduct.php");
    $dem = 1;
    $p = new CProduct();

    if (isset($_REQUEST['idloai'])) {
        $resProdAll = $p->getOneProdbyType($_REQUEST['idloai']);
    } elseif (isset($_REQUEST['btnTim'])) {
        $name = $_REQUEST['txtsearch'];
        $resProdAll = $p->getProdbyName($name);
    } else {
        $resProdAll = $p->getAllProd();
    }

    echo "<table><tr>";
    // Kiểm tra nếu $resProdAll là mysqli_result
    if ($resProdAll instanceof mysqli_result) {
        if ($resProdAll->num_rows > 0) {
            while ($row = $resProdAll->fetch_assoc()) {
                if ($dem > 5) {
                    echo "</tr><tr>";
                    $dem = 1;
                }
                echo "
                    <td>
                        <img width='100px' src='img/sp/" . $row['HinhAnh'] . "' alt=''><br>
                        <span>" . $row['TenSanPham'] . "</span><br>
                        <span>" . number_format($row['GiaBan'], 0, ",", ".") . " VNĐ</span><br>
                        <span style='color: red' >
                            <del>" . number_format($row['GiaGoc'], 0, ",", ".") . "</del>VNĐ
                        </span><br>
                    </td>";
                $dem++;
            }
        } else {
            echo "<tr><td colspan='5' style='color: red; text-align: center;'>Không tồn tại sản phẩm nào!</td></tr>";
        }
    } else {
        // Trường hợp lỗi (giá trị -1 hoặc -2)
        if ($resProdAll == -1) {
            echo "<tr><td colspan='5' style='color: red; text-align: center;'>Lỗi server!</td></tr>";
        } else {
            echo "<tr><td colspan='5' style='color: red; text-align: center;'>Không tồn tại sản phẩm nào!</td></tr>";
        }
    }
    echo "</table>";
    ?>
</div>