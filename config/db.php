<?php
  //create MySql connection
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

  //check connection
  if(mysqli_connect_errno()){
    echo 'Failed to connect to Data Base '.mysqli_connect_errno();
  }
?>
