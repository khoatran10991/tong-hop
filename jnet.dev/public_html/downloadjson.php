<?php
$file = "json_advance_config/".$_GET['file'];

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/text');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    
    //unlink($file);
    exit;
} else {
	die("Error file !");
}
?>