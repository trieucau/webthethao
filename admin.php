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
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        background-color: #f5f5f5;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        min-height: 100vh;
    }

    .header img {
        width: 100%;
        height: auto;
    }

    .nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background-color: rgb(131, 105, 87);;
        color: white;
    }

    .nav a {
        color: white;
        margin-right: 15px;
        text-decoration: none;
        font-weight: bold;
    }

    .nav .search {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .nav input[type="text"] {
        padding: 6px 10px;
        border-radius: 4px;
        border: none;
    }

    .nav button {
        padding: 6px 12px;
        border: none;
        background-color: #ff6600;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }

    .main {
        display: flex;
        padding: 20px;
        border-bottom: 1px solid #ddd;
    }

    .left {
        width: 25%;
        border-right: 1px solid #ddd;
        padding-right: 15px;
    }

    .left a {
        display: block;
        padding: 10px 0;
        color: #333;
        text-decoration: none;
    }

    .left a:hover {
        text-decoration: underline;
        color: #007BFF;
    }

    .right {
        width: 75%;
        padding-left: 15px;
    }

    .right table {
        width: 100%;
        border-collapse: collapse;
    }

    table, td, th {
    border: 1px solid;
    }

    .dropbtn {
        background-color:rgb(131, 105, 87);
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        width: 100%;
        
    }

    .dropdown {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        right: 0px;
        width: 90%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
    background-color:rgb(240, 141, 76);
    }


    .right td {
        padding: 10px;
        vertical-align: top;
        text-align: center;
        width: 20%;
    }

    .right img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    .right span {
        display: block;
        margin-top: 5px;
        color: #333;
    }

    .footer {
        padding: 20px;
        text-align: center;
        background-color: #eee;
        color: white;
        background-color: rgb(131, 105, 87);
    }


    </style>
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
           <!-- <a href="admin.php?p=qlloai">Quản lí Loại</a>
           <a href="admin.php?p=qlsanpham">Quản lí sản phẩm</a>
           <a href="admin.php?p=qlnguoidung">Quản lí người dùng</a> -->
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

