<?php
    // Getting the received JSON into $json variable.
    $json = file_get_contents('php://input');
    
    // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
    
    include 'conn.php';
    
    
    $userId= $obj["userId"];
    $city= $obj["city"];
    $getResult = $obj;

    if(isset($userId)){
    
        $sql = "UPDATE `user` SET `city`='".$city."' WHERE `id` = '".$userId."'";
        $result = $conn->query($sql);
        $count=0;
        
        if ($result) {
            
            $getResult = "1";

        }
        else{
            $getResult = "Error in updeting";
        }
    }
    else{
      $getResult = "ERROR";
    }

    echo ($getResult);


?>
