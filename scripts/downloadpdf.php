<?php
header("Content-Type: application/octet-stream");

$file = "../Suggestions/".$_GET["file"];
header("Content-Disposition: attachment; filename=" . urlencode($file));   
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
flush(); // this doesn't really matter.
$fp = fopen($file, "r"); 
echo filesize($file);
if($fp){
    while (!feof($fp)) 
    { 
        echo fread($fp, filesize($file)); 
        flush(); // this is essential for large downloads 
    } 
// fclose($fp); 
}
?> 