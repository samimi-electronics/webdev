<?php
    $db_host = 'localhost';
    $db_user = 'phpmyadmin';
    $db_passwd = '';
    $db = 'php_testbench';
    
    $conn = new mysqli($db_host, $db_user, $db_passwd, $db);
    if($conn->connect_errno){
        die('Could not establish connection to the database');
    }
    
    //$response['data'] = $_POST;
    //$imgurl = '';
    
    $imgUpldDir = 'uploads/';
    $imgUploaded = false;
    $validExt = array('jpg', 'jpeg', 'png');
    $response['error'] = false;

    // Upload Images
    for($i = 0; $i < $_POST['numOfEntries']; $i++){

        $fname[$i] = $_POST['fname-' . $i];
        $lname[$i] = $_POST['lname-' . $i];
        $radioVal[$i] = $_POST['radioVal-' . $i];

        if(isset($_FILES['image-' . $i]['name'])){
            
            $img = $_FILES['image-' . $i]['name'];
            $imgExt = strtolower(pathinfo($img, PATHINFO_EXTENSION));

            if(in_array($imgExt, $validExt)){
            
                $imgNewName = strtolower($fname[$i] . $lname[$i] . time() . '.' . $imgExt);
                $imgPath[$i] = $imgUpldDir . $imgNewName;
            
                if(move_uploaded_file($_FILES['image-' . $i]['tmp_name'], $imgPath[$i])){
                    $message[$i] = 'Image ' . $imgNewName . ' was uploaded successfuly';    
                    $imgUploaded[$i] = true;
                }
                else{
                    $response['error'] = true;
                    $imgUploaded[$i] = false;
                    $message[$i] = 'Error in uploading files...';
                }
            }
            else{
                $response['error'] = true;
                $message[$i] = 'File extention was wrong...';
            }
        }
        else{
            $imgUploaded[$i] = false;
            $message[$i] = 'No image was selected...';
        }

        if($imgUploaded[$i] == true){
            $insertQuery = $conn->query("INSERT INTO `tb1` (`fname`, `lname`, `radioVal`, `imageurl`) VALUES ('$fname[$i]', '$lname[$i]', '$radioVal[$i]', '$imgPath[$i]') ");
            if($insertQuery){
                $message[$i] = 'New record inserted successfully';
            }else{
                $response['error'] = true;
                $message[$i] = $conn->error;
            }
        }
    }
        
        
        
        
        
    

    $conn->close();

    $response['message'] = $message;
    $response['uploadState'] = $imgUploaded;
    header('content-type: application/json');
    echo json_encode($response);
    die();
?>