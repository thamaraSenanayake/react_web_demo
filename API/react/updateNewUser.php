<?php
    // Getting the received JSON into $json variable.
    $json = file_get_contents('php://input');
    
    // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
    
    include 'conn.php';
    
    $firstName= $obj["firstName"];
    $password= $obj["password"];
    $lastName= $obj["lastName"];
    $email= $obj["email"];
    $getResult = "";
    $userName = $obj["userName"];
    $accountType = $obj["accountType"];
    $planCreate = $obj["planCreate"];
    $planEdit = $obj["planEdit"];
    $planDelete = $obj["planDelete"];
    $postCreate = $obj["postCreate"];
    $postEdit = $obj["postEdit"];
    $postDelete = $obj["postDelete"];

    $CommunityCreate = $obj["CommunityCreate"];
    $CommunityEdit = $obj["CommunityEdit"];
    $CommunityDelete = $obj["CommunityDelete"];

    $StoreCreate = $obj["StoreCreate"];
    $StoreEdit = $obj["StoreEdit"];
    $StoreDelete = $obj["StoreDelete"];

    if(isset($email) && isset($password)){
    
        $sql = "UPDATE `user` SET `firstName`='".$firstName."',`lastName`='".$lastName."',`email`='".$email."',`password`='".$password."',`role`='".$accountType."',`planCreate`='".$planCreate."',`planEdit`='".$planEdit."',`planDelete`='".$planDelete."',`postCreate`='".$postCreate."',`postEdit`='".$postEdit."',`postDelete`='".$postDelete."',`CommunityCreate`='".$CommunityCreate."',`CommunityEdit`='".$CommunityEdit."',`CommunityDelete`='".$CommunityDelete."',`StoreCreate`='".$StoreCreate."',`StoreEdit`='".$StoreEdit."',`StoreDelete`='".$StoreDelete."' WHERE `userName`='".$userName."'";
        $result = $conn->query($sql);
            
        if($result){
            $getResult = 1;
        }
        else{
            $getResult = 'Error in insert';
        }
    }
    else{
      $getResult = "ERROR";
    }



    echo json_encode($getResult);


?>
