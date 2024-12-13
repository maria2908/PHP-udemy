<?php

$directory = "uploads";

if(is_dir($directory)) {
    $files = scandir($directory);

    foreach($files as $file) {
        if($file !== "." && $file !== "..") {
            echo "file: $file\n";
        } 
    }
}

//Creating Directory
// if (!file_exists($directory)) {
//     mkdir($directory, 0777, true);
//     echo "Directory created";
// } else {
//     echo 'Directory already exist'; 
// }