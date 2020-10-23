<?php
  
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  include 'db_connection.php';
  $conn = OpenCon();

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
  }
  
  console_log( $id ); // [1,2,3]

  $sql = "DELETE FROM events WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    header('location: admin.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  CloseCon($conn);
?>