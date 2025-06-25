 <?php
    include_once("controllers/cCategory.php");
    $c = new CCategory();
    $allcat = $c->getAllCate();

    while ($r = $allcat->fetch_assoc()) {
        echo "<a href='?idloai=" . $r['IDLoai'] . "'>" . $r['TenLoai'] . "</a>";
    }


    ?>