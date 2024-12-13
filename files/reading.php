<?php

$file_name = 'data.txt';

//Open the file

$file = fopen($file_name, "r");

if($file) {
    $content = fread($file, filesize($file_name));

    echo nl2br($content);
    fclose($file);
} else {
    echo"Unable to open the file";
}

//OR $content = file_get_contents("data.txt"); echo nl2br($content");