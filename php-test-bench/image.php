<?php

if(isset($_FILES['file']['name'])){
        
    $imageName = $_FILES['file']['name'];
    $imageExtention = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));;
    $validExtensions = array('jpg', 'jpeg', 'png');

    if(in_array($imageExtention, $validExtensions)){
        //$upload_path = 'uploads/' . strtolower(basename($imageName));
        $upload_path = 'uploads/' . time() . '.' .$imageExtention;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)){
            $message = 'Image uploaded';
            $image = $upload_path;
        }else{
            $message = 'Error uploading image, please try again later';
        }
    }else{
        $message = 'Only jpg, jpeg, png filetypes are allowed';
    }
}else{
    $message = 'Choose an image file';
}