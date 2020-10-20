<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hv.css">
  <title>Document</title>
</head>
<body>

<h1>Admin Page</h1>

<h2>Code Self Study: Future Events</h2>

<?php

  include 'db_connection.php';
  $conn = OpenCon();

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  // $sql = "INSERT INTO test_table (firstName, title)
  // VALUES ('omar', 'badass')";


  // if ($conn->query($sql) === TRUE) {
  //   echo "New record created successfully";
  // } else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }

  $sql = "SELECT title, description, date FROM events";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<table class='event-table'>
              <tr>
                <th class='event-table-event-header'>Event</th>
                <th>Description</th>
                <th class='event-table-date-header'>Date</th>
              </tr>
              <tr>
                <td>"
                  . $row["title"] . 
                "</td>
                <td>"
                  . $row["description"] . 
                "</td>
                <td>"
                  . $row["date"] .
                "</td>
              </tr> 
            </table>";
      } 
  } else {
    echo "0 results";
  }

  CloseCon($conn);
?>

<?php
include 'secure.php';
?>



</body>
</html>

