<?php

  include 'conn.php';
  $id = $_GET["id"];
  $sql ="SELECT * from user where email = '".$id."'";
  $result = $conn->query($sql);
  $getResult = array();

  while($row = $result->fetch_assoc()) {
      array_push($getResult,$row);

  }

  echo json_encode($getResult);

?>
