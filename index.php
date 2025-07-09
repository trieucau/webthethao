<?php
session_start();
include_once("controllers/cProduct.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/form.css">
    <link rel="stylesheet" href="public/css/quanli.css">
    <link rel="stylesheet" href="public/css/sanpham.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="img/banner.jpg" alt="b1" width="100%" height="100%">
        </div>
        <div class="nav">
            <?php
            include_once("partial/vNavbar.php");
            ?>

            <div class="search">
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                    if ($_SESSION['gender'] == 1) {
                        $gender = "anh ";
                    } else {
                        $gender = "chị ";
                    }
                    echo "Chào mừng " . $gender . $_SESSION['fullname'] . " trở lại";
                }
                ?>
                <form action="" method="get">
                    <input type="text" name="txtsearch">
                    <button type="submit" name="btnTim">Tìm</button>
                </form>
                <?php
                if (isset($_SESSION["avatar"])) {
                    echo '<div class="avatar">
                                <img src="img/sp/' . $_SESSION["avatar"] . '" 
                                    width="40px" height="40px" style="border-radius: 50%; border: 1px solid gray; object-fit: cover;">
                                </img>
                            </div>';
                }
                ?>

            </div>
        </div>
        <div class="main">
            <div class="left">
                <?php include_once("partial/vLeft.php") ?>
            </div>
            <div class="right">
                <?php
                $page = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';

                switch ($page) {
                    case 'dangnhap':
                        include_once('views/vDangnhap.php');
                        break;
                    case 'dangxuat':
                        include_once('views/vDangxuat.php');
                        break;
                    case 'dangky':
                        include_once('views/vDangky.php');
                        break;
                    case 'quanli':
                        header("refresh:0;url=admin.php");
                        break;
                    default:
                        include_once('views/vSanPham.php');
                }
                ?>
            </div>
        </div>
        <div class="footer">
            Sinh viên: Phan Thành Triều
        </div>
    </div>
</body>

</html>