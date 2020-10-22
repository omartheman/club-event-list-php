<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pass = $_POST['pass'];

  if($pass == "i-like-turtles") 
  {
    header("location: /hv/admin.php");
  } else 
  {
    if(isset($_POST))
    { 
      header('location: /hv/hv.php');
    }
  }
}

?>