<?php

  include 'db_connection.php';
  $conn = OpenCon();

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  if(isset($_POST['submit']))
  {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
  }

  $sql = "INSERT INTO events (title, description, date)
  VALUES ('$title', '$description', '$date')";


  if ($conn->query($sql) === TRUE) {
    header('location: admin.php');
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  CloseCon($conn);
?>