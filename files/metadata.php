<?php

$file_name = 'data.txt';


if(file_exists($file_name)) {
    echo "file size: " . filesize($file_name) . "bytes\n";
    echo" Last modified: " . date("F d Y H:i:s.", fileatime($file_name)) . "\n";

    if(is_readable($file_name)) {
        echo "it is readable. \n";
    }

    if(is_writable($file_name)) {
        echo "it is writable";
    }

} else {
    echo"File does not exist ";
}

