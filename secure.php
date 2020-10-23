<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pass = $_POST['pass'];
  $user = $_POST['user'];

  if($user == "ringo" && $pass == "turtles") 
  {
    header("location: admin.php");
  } else 
  {
    if(isset($_POST))
    { 
      header('location: index.php');
    }
  }
}

?>