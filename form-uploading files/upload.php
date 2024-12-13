<?php

echo"<pre>";
var_dump($_FILES);

echo"</pre>";

$permanent = "uploads/" . $_FILES['file']['name'];

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    move_uploaded_file($_FILES['file']['tmp_name'], $permanent);
} else {
    echo "File upload error: " . $_FILES['file']['error'];
}