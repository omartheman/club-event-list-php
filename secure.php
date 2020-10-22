<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pass = $_POST['pass'];
  $user = $_POST['user'];

  if($user == "ringo" && $pass == "turtles") 
  {
    header("location: /code_club/admin.php");
  } else 
  {
    if(isset($_POST))
    { 
      header('location: /code_club/hv.php');
    }
  }
}

?>