<?php
include_once("config.php"); // nhúng file config

class MConnect
{
    public function openConnect()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Kiểm tra lỗi kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        return $conn;
    }

    public function closeConnect($conn)
    {
        mysqli_close($conn);
    }
}
