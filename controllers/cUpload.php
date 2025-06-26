<?php
class CUpload
{
    public function uploadfile($file)
    {
        $size = $file['size'];
        $type = $file['type'];
        $temp = $file['tmp_name'];
        $name = $file['name'];

        if (!$this->checkSize($size) || !$this->checkType($type)) {
            return false;
        }

        $folder = "img/sp/";
        $dir = pathinfo($name, PATHINFO_FILENAME);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $date = date("YmdHis");
        $newFileName = $dir . $date . '.' . $ext;

        $dich =  $folder . $newFileName;

        if (move_uploaded_file($temp, $dich)) {
            return $newFileName;
        }
        return  false;
    }

    public function checkSize($size)
    {
        return $size > 0 && $size <= 3 * 1024 * 1024;
    }
    public function checkType($type)
    {
        $arrType = ["image/jpg", "image/jpeg", "image/png"];
        return in_array($type, $arrType);
    }
}
