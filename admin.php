<?php
session_start();
include_once("controllers/cProduct.php");

if (!isset($_SESSION['role_id'])) {
    echo "<script>alert('Bạn chưa thực hiện đăng nhập!!!'); </script>";
    header("refresh:0; url=index.php?p=dangnhap");
} else {
    if ($_SESSION['role_id'] != 2 && $_SESSION['role_id'] != 3) {
        echo "<script>alert('Bạn không có quyền vào trang này!!!'); </script>";
        header("refresh:0; url=index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>

    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/form.css">
    <link rel="stylesheet" href="public/css/quanli.css">
    <link rel="stylesheet" href="public/css/sanpham.css">
    <link rel="stylesheet" href="public/css/dash.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="img/banneradmin.jpg" alt="b1" width="100%" height="100%">
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
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                    <input type="hidden" name="p" value="<?php echo isset($_REQUEST['p']) ? htmlspecialchars($_REQUEST['p']) : ''; ?>">
                    <input type="text" name="txtsearch">
                    <button type="submit" name="btnTim">Tim</button>
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
                <div class="dropdown">
                    <button class="dropbtn">Quản lí Loại</button>
                    <div class="dropdown-content">
                        <a href="admin.php?p=qlloai">Danh sách Loại</a>
                        <a href="admin.php?p=themLoai">Thêm Loại</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Quản lí Sản Phẩm</button>
                    <div class="dropdown-content">
                        <a href="admin.php?p=qlsanpham">Danh sách Sản Phẩm</a>
                        <a href="admin.php?p=themSP">Thêm Sản Phẩm</a>
                    </div>
                </div>
                <?php
                if ($_SESSION['role_id'] == 3) {
                    echo '<div class="dropdown">
                        <button class="dropbtn">Quản lí Người Dùng</button>
                        <div class="dropdown-content">
                            <a href="admin.php?p=qlnguoidung">Danh sách Người dùng</a>
                            <a href="admin.php?p=themND">Thêm Người dùng</a>
                        </div>
                    </div>';
                }
                ?>
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
                    case 'qlloai':
                        include_once('views/vQlloai.php');
                        break;
                    case 'qlsanpham':
                        include_once('views/vQlsanpham.php');
                        break;
                    case 'themSP':
                        include_once('views/vAddsp.php');
                        break;
                    case 'themLoai':
                        include_once('views/vAddloai.php');
                        break;
                    case 'sualoai':
                        include_once('views/vUpdateloai.php');
                        break;
                    case 'xoaloai':
                        include_once('views/vDelloai.php');
                        break;
                    case 'suasp':
                        include_once('views/vUpdatesp.php');
                        break;
                    case 'xoasp':
                        include_once('views/vDelsp.php');
                        break;
                    case 'quanli':
                        header("refresh:0;url=admin.php");
                        break;
                    case 'qlnguoidung':
                    case 'themND':
                    case 'suand':
                    case 'xoand':
                        // CHỈ admin (role_id == 3) mới được phép
                        if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 3) {
                            switch ($page) {
                                case 'qlnguoidung':
                                    include_once('views/vQlnguoidung.php');
                                    break;
                                case 'themND':
                                    include_once('views/vAddnd.php');
                                    break;
                                case 'suand':
                                    include_once('views/vUpdatend.php');
                                    break;
                                case 'xoand':
                                    include_once('views/vDelnd.php');
                                    break;
                            }
                        } else {
                            echo "<script>alert('Bạn không có quyền vào trang này!!!'); </script>";
                            header("refresh:0; url=admin.php");
                        }
                        break;

                    default:
                        include_once('views/vDashboard.php');
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