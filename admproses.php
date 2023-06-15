<?php
    include('config.php');
    $path = "file/"; // nama direktori tempat menyimpan file yang diupload
    $full_path = $path.$_GET['file_name'];
    
    if ($fd = fopen ($full_path, "r")) {
        $fsize = filesize($full_path);
        $path_parts = pathinfo($full_path);
        $ext = strtolower($path_parts["extension"]);
        switch ($ext) {
            case "jpg":
                header("Content-type: application/jpg");
                header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
                break;
            case "jpeg":
                header("Content-type: application/jpeg");
                header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
                break;
            case "png":
                header("Content-type: application/png");
                header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
                break;
            default:
                header("Content-type: application/octet-stream");
                header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
                break;
        }
        header("Content-length: $fsize");
        while (!feof($fd)) {
            $buffer = fread($fd, 2048);
            echo $buffer;
        }
    }
    fclose ($fd);
    exit;
