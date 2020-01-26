<?php
    // Getting the received JSON into $json variable.
    $json = file_get_contents('php://input');
    
    // decoding the received JSON and store into $obj variable.
    $obj = json_decode($json,true);
    
    
    include 'conn.php';

    $email= $obj["email"];
    $password= $obj["password"];
    $getResult = "";
    

    if(isset($email) && isset($password)){
    
        $sql = "SELECT * FROM `user` WHERE `email`='".$email."'";
        $result = $conn->query($sql);
        $count=0;
        $getResult = $password;
        
        if ($result->num_rows > 0) {
            
//           
            $sql = "SELECT * FROM `user` WHERE `email` = '".$email."' and `password` = '".$password."'";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                $getResult = 1;
            }
            else{
               $getResult = 'invalid password';
            }

        }
        else{
            $getResult = "Invalid username";
        }
    }
    else{
      $getResult = "ERROR";
    }



    echo json_encode($getResult);


?>
