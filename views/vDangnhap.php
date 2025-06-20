<div class="wapperLogin">
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên người dùng: </td>
                <td><input type="text" name="textname" id="" required></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="textpass" id="" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="btnDn">Đăng nhập</button>
                    <button type="reset">Nhập lại</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
    include_once("controllers/cDangnhap.php");
    $p = new CDangnhap();
    if(isset($_POST["btnDn"])){
        if( $p->checkLogin($_POST['textname'], $_POST['textpass'])){
            $_SESSION['login'] = true; 
            $gender = $_SESSION['gender'] == 1?'anh':'chị';
            $fullname =  $_SESSION['fullname'];

           
            echo "<script>alert('Chào mừng $gender , $fullname quay lại'); </script>"; 
            header( "refresh:0;url=index.php" ); 

        }else{
            echo "<script>alert('Sai thông tin đăng nhập'); </script>"; 
        
        }
    }
?>  