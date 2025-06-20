<?php
      session_start();
    include_once("controllers/cProduct.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/dangnhap.css">
    <link rel="stylesheet" href="public/css/quanli.css">
    <link rel="stylesheet" href="public/css/sanpham.css">
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
                    if(isset( $_SESSION['login']) && $_SESSION['login'] ==true ){
                        if($_SESSION['gender'] == 1){
                            $gender = "anh ";
                        }else{
                            $gender = "chị ";
                        }
                        echo "Chào mừng " . $gender . $_SESSION['fullname'] . " trở lại";
                    }
                ?>
                <form action="" method="get" >
                    <input type="text" name="txtseacher"> 
                    <button type="submit">Tim</button>
                </form>
            </div>
        </div>
        <div class="main">
            <div class="left">
                <div class="dropdown">
                    <button class="dropbtn">Quản lí Loại</button>
                    <div class="dropdown-content">
                        <a href="admin.php?p=qlloai">Danh sách Loại</a>
                        <a href="#">Thêm Loại</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Quản lí Sản Phẩm</button>
                    <div class="dropdown-content">
                        <a href="admin.php?p=qlsanpham">Danh sách Sản Phẩm</a>
                        <a href="#">Thêm Sản Phẩm</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Quản lí Người Dùng</button>
                    <div class="dropdown-content">
                        <a href="admin.php?p=qlnguoidung">Danh sách Người dùng</a>
                        <a href="#">Thêm Người dùng</a> 
                    </div>
                </div>
        
            </div>
            <div class="right">

                <?php
                    $page = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
                
                    switch($page){
                        case 'dangnhap': include_once('views/vDangnhap.php'); break;
                        case 'dangxuat': include_once('views/vDangxuat.php'); break;
                        case 'qlloai': include_once('views/vQlloai.php'); break;
                        case 'qlsanpham': include_once('views/vQlsanpham.php'); break;
                        case 'qlnguoidung': include_once('views/vQlnguoidung.php'); break;
                        case 'quanli': header( "refresh:0;url=admin.php" ); break;
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

