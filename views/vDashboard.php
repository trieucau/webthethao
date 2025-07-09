<?php
include_once("controllers/cUser.php");
include_once("controllers/cProduct.php");

$countuser = (new CUser())->getAllUser()->num_rows;
$countpro  = (new CProduct())->getAllProd()->num_rows;
?>

<div class="DashboardWarpper">
    <h2>Dashboard</h2>

    <div class="card">
        <h3>Người dùng</h3>
        <p>Tổng số: <span id="users"><?= $countuser ?></span></p>
    </div>

    <div class="card">
        <h3>Sản phẩm</h3>
        <p>Tổng số: <span id="products"><?= $countpro ?></span></p>
    </div>
</div>