<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hv.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Document</title>
</head>
<body class='container'>
<h1>Admin Page</h1>

<h2>Code Self Study: Future Events</h2>

<div>
  <a href="/hv/hv.php">Back to Homepage</a>
</div>

<form class='admin-form' method="POST" action="addEvent.php" autocomplete='off'>
  <h2>Add Event</h2>
  <label for="title">Title</label><br/>
  <input type="text" name="title" /><br />
  <label for="description">Description</label><br/>
  <input type="text" name="description" /><br />
  <label for="date">Date</label><br/>
  <input type="date" name="date" /> <br />
  <input type="submit" name="submit" id="submit" value="Go" />
</form>

<?php

  include 'db_connection.php';
  $conn = OpenCon();

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT title, description, date, id FROM events";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "
      <table class='event-table'>
        <tr>
          <th class='event-table-event-header'>Event</th>
          <th>Description</th>
          <th class='event-table-date-header'>Date</th>
          <th class='event-table-id'>Id</th>
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
          <td>"
            . $row["id"] .
          "</td>
          <td>
            <form class='admin-form-delete' method='POST' action='deleteEvent.php'>
              <span class='admin-form-delete-text'>DELETE EVENT:</span>
              <input type='submit' name='delete' id='delete' value='" . $row['id'] . "' />
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

