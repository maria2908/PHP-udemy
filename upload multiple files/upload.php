<?php
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $upload_dir = "uploads/";

    // if(!is_dir($upload_dir)) {
    //     mkdir($upload_dir, 0777, true);
    // }

    foreach($_FILES['files']['name'] as $key => $file_name) {

        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_error = $_FILES['files']['error'][$key];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $target_file = $upload_dir . basename($file_name);
 
        if($file_error === UPLOAD_ERR_OK){
            if($file_size > 5 * 1024 * 1024){
                echo"Error too big";
            } elseif(!in_array($file_type, ['jpg', 'png', 'jpeg', 'pdf'])) {
                echo "EROOR file type $file_name is not allowed";
            } else {
                if(move_uploaded_file($file_tmp, $target_file)){
                    echo"file $file_name uploaded successfully";
                } else {
                    echo"Error: There was an time issue uploading $file_name";
                }
            }
        } else {
            echo"Error: File $file_name failed to upload";
        }

        // echo"<pre>";
        // var_dump($file_tmp);
        // echo"</pre>";
    }
} else {
    echo"No file were uploaded";
}