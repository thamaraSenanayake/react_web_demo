<?php

  include 'conn.php';
  $userId= $_GET["userId"];
  $sql ="SELECT * from user where id = '".$userId."'";
  $result = $conn->query($sql);
  $getResult = array();

  while($row = $result->fetch_assoc()) {
      array_push($getResult,$row);
  }

  echo json_encode($getResult);

?>
