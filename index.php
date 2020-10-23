<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hv.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Document</title>
</head>
<body class="container">

<div class="row pb-4">
  <img class="img-fluid" src="coding-banner.jpg" alt="Coding Banner">
</div>
<h1>Code Self Study: Future Events</h1>


  <?php

    include 'db_connection.php';
    $conn = OpenCon();

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT title, description, date FROM events ORDER BY date ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "
        <div class='pb-4'>
          <table class='event-table'>
            <tr>
              <th class='event-table-event-header'>Event</th>
              <th>Description</th>
              <th class='event-table-date-header'>Date</th>
            </tr>";
      while($row = $result->fetch_assoc()) {
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
          </tr>";
        } 
        echo "
            </table>
          </div>
        ";
    } else {
      echo "0 results";
    }

    CloseCon($conn);
  ?>

  <?php
  include 'secure.php';
  ?>
  <div class='pb-5'>
    <form class='admin-form' method="POST" action="secure.php">
      <h2 class='mb-2'>Login to Admin Page</h2>
      <p class='mb-2'>( Username: "ringo", Password: "turtles" )</p>
      <div class="mb-2">
        Username:
        <input type="text" name="user" value="ringo" /><br />
      </div>
      <div class="mb-2">
        Password:
        <input type="password" name="pass" value="turtles" /><br />
      </div>
      <input class="btn btn-primary" type="submit" name="submit" value="Log me in to Admin!" />
    </form>
  </div>
</div> <!-- div class=container -->

</body>
</html>

