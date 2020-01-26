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
    
        $sql = "SELECT * FROM `user` WHERE `email`='".$email."'";
        $result = $conn->query($sql);
        $count=0;
        $getResult = "";
        
        if ($result->num_rows == 0) {
            
            $sql = "INSERT INTO `user`(`userName`,`firstName`, `lastName`, `email`, `password`, `role`,`planCreate`, `planEdit`, `planDelete`, `postCreate`, `postEdit`, `postDelete`, `CommunityCreate`, `CommunityEdit`, `CommunityDelete`, `StoreCreate`, `StoreEdit`, `StoreDelete`) VALUES ('".$userName."','".$firstName."','".$lastName."','".$email."','".$password."','".$accountType."','".$planCreate."','".$planEdit."','".$planDelete."','".$postCreate."','".$postEdit."','".$postDelete."','".$CommunityCreate."','".$CommunityEdit."','".$CommunityDelete."','".$StoreCreate."','".$StoreEdit."','".$StoreDelete."')";
            $result = $conn->query($sql);
            
            if($result){
                $getResult = 1;
            }
            else{
               $getResult = 'Error in insert';
            }

        }
        else{
            $getResult = "Duplicate username";
        }
    }
    else{
      $getResult = "ERROR";
    }



    echo json_encode($getResult);


?>
