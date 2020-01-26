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

    if(isset($email) && isset($password)){
    
        $sql = "SELECT * FROM `user` WHERE `email`='".$email."'";
        $result = $conn->query($sql);
        $count=0;
        $getResult = "";
        
        if ($result->num_rows == 0) {
            
            $sql = "INSERT INTO `user`(`firstName`, `lastName`, `password`,`email`) VALUES ('".$firstName."','".$lastName."','".$password."','".$email."')";
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
