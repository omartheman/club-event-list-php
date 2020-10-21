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

<form class='admin-form' method="POST" action="addEvent.php">
  <h2>Add Event</h2>
  <label for="title">Title</label><br/>
  <input type="text" name="title" /><br />
  <label for="description">Description</label><br/>
  <input type="text" name="description" /><br />
  <label for="date">Date</label><br/>
  <input type="date" name="date" /> <br />
  <input type="submit" name="submit" id="submit" value="Go" />
</form>

<h3>Event Added Successfully!</h3>

<?php

  include 'db_connection.php';
  $conn = OpenCon();

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT title, description, date FROM events";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "
      <table class='event-table'>
        <tr>
          <th class='event-table-event-header'>Event</th>
          <th>Description</th>
          <th class='event-table-date-header'>Date</th>
          <th>Delete?</th>
        </tr>";
    while($row = $result->fetch_assoc()) 
    {
      echo "
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
              <td>
                <form class='admin-form' method='POST' action='deleteEvent.php'>
                  <input type='submit' name='delete' id='delete' value='delete' />
                </form>
              </td>
            </tr>";
    } 
    echo "</table>";
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

