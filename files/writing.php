<?php

$file_name = 'data.txt';

//Open the file

$file = fopen($file_name, "a");

if($file) {
    fwrite($file, "Hi\n");
    fclose($file);
    echo"file written successfully";
} else {
    echo"Unable to write the file";
}

