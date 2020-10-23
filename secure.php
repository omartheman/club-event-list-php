<?php

if ( session_status() !== 2 ) session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pass = $_POST['pass'];
  $user = $_POST['user'];

  if($user == "ringo" && $pass == "turtles") 
  {
    $_SESSION['username'] = $user;
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