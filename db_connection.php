<?php 

function OpenCon() 
{
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "omsh0002";

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("DB connection failed: %s\n" . $conn -> error);

  return $conn;
}

function CloseCon($conn)
{
  $conn -> close();
}

?>