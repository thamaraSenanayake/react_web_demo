<?php

  include 'conn.php';

  $sql ="SELECT * from user";
  $result = $conn->query($sql);
  $getResult = array();

  while($row = $result->fetch_assoc()) {
      array_push($getResult,$row);

  }

  echo json_encode($getResult);

?>
