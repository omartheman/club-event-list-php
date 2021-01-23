<?php 

function OpenCon() 
{
  $dbhost = "localhost";
  $dbuser = "omarnaod_admin";
  $dbpass = "3yeDroplets!";
  $db = "omarnaod_omsh0002";

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("DB connection failed: %s\n" . $conn -> error);

  return $conn;
}

function CloseCon($conn)
{
  $conn -> close();
}

?>