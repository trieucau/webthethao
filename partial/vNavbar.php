<div name="navbar">
    <a href="index.php">Trang chủ |</a>
    <?php
    if(isset( $_SESSION['login']) && $_SESSION['login'] ==true ){
        echo '<a href="index.php?p=quanli">Quản lí |</a>';
        echo '<a href="index.php?p=dangxuat">Đăng xuất</a>';
    }else{
            echo ' <a href="index.php?p=dangnhap">Đăng nhập | </a>';
        echo '<a href="index.php?p=dangky">Đăng ký</a>';
    }

    ?>
</div>