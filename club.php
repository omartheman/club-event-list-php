<?php
if ( session_status() !== 2 ) session_start();
?>
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

<div class="row">
  <img class="img-fluid" src="coding-banner.jpg" alt="Coding Banner">
</div>

<div class='row float-right mb-3'>
  <div class='d-block ml-auto <?php if (!isset($_SESSION['username'])) { ?>border p-3 <?php } ?>'>
    <?php
      if (!isset($_SESSION['username'])) 
      { ?>
        <div class='mb-2 mr-2 ml-auto'>
          <h4 class='mb-2'>Login to Admin Page</h4>
          <p class='mb-2'>( Username: "ringo", Password: "turtles" )</p>
        </div>
        <form class='admin-form ml-auto' method="POST" action="secure.php">
          <div class="mr-2 mb-2">
          Username:
          </div>
          <input class="mr-2 mb-2" type="text" name="user" value="" />
          <div class='mr-2 mb-2'>
            Password:
          </div>
          <input class="mr-2 mb-2" type="password" name="pass" value="" />
      <?php
        }
      ?>

      <div>
         <?php
          if (isset($_SESSION['username'])) 
          { ?>
              
              <a href="admin.php" class="btn btn-primary mt-2 mr-2 mb-2">Return to Admin Page</a>
              <a class='btn btn-warning mb-2 mr-2 mt-2' href="logout.php">Log Out</a>
            <?php
          } else {
            ?>
              <input class="btn btn-primary mr-2 mb-2" type="submit" name="submit" value="Log me in to Admin!" />
            <?php
          }
            ?>
      </div>
    </form>
  </div>
</div>

<h1 class='d-inline-block mt-4 float-left'>Code Self Study: Future Events</h1>


  <?php

    include 'db_connection.php';
    $conn = OpenCon();

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT title, description, date FROM events WHERE date < curdate() ORDER BY date ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "
        <div class='pb-4 clearfix'>
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
</div> <!-- div class=container -->

</body>
</html>

