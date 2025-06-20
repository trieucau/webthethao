<?php
    include_once("controllers/cProduct.php");
    $dem = 1;
    $p = new CProduct();
    $resProdAll = $p -> getAllProd();
    echo "<table><tr>";
    while($row = $resProdAll->fetch_assoc()){
        if($dem > 5){
            echo "</tr><tr>";
            $dem=1;
        }
        echo "
            <td>
                <img width='100px' src='img/sp/".$row['HinhAnh']."' alt=''><br>
                <span>".$row['TenSanPham']."</span><br>
                <span>".number_format($row['GiaBan'],0,",",".")." VNĐ</span><br>
                <span style='color: red' >
                    <del>".number_format($row['GiaGoc'],0,",",".")."</del>VNĐ
                </span><br>
            </td>";
        $dem++;
    }

?>