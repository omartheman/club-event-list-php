
<?php



function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

session_start();

if (!isset($_SESSION['username'])) 
{
  //not logged in
  // echo('admin');
  header('Location: index.php');
  console_log($_SESSION['username']);
  console_log('work');
  exit();
} else {

  
  console_log($_SESSION['username']);
  console_log('work');
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
  <body class='container'>


  <div class="row pb-4">
    <img class="img-fluid" src="coding-banner.jpg" alt="Coding Banner">
  </div>

  <a href="index.php">
    <div class='btn btn-primary mb-3 float-right'>
      Back to Homepage
    </div>
  </a>

  <h1>Admin Page</h1>

  <a class='btn btn-warning float-right mb-3' href="logout.php">Logout</a>

  <div class="pb-4 text-center">
    <form class='admin-form w-100' method="POST" action="addEvent.php" autocomplete='off'>
      <h2 class="text-left pt-3">Add Event</h2>

      <div>
        <div class="p-2 text-left">
          <label for="title">Title</label><br/>
          <textarea class="w-100" rows="1" cols="50" type="text" name="title"></textarea><br />
        </div>
        <div class='p-2 text-left'>
          <label for="description">Description</label><br/>
          <textarea class="w-100" rows="3" cols="50" type="text" name="description" /></textarea><br />
        </div>
        <div class='p-2 mb-2 text-left'>
          <label for="date">Date</label><br/>
          <input class="w-100" type="date" name="date" /> <br />
        </div>
      </div>
      <div class='pb-2 w-100 text-center'>
        <input class='w-50 btn btn-success' type="submit" name="submit" id="submit" value="Add Event" />
      </div>
    </form>
  </div>

  <h2 class="mb-3">Code Self Study: Future Events</h2>

  <?php



    include 'db_connection.php';
    $conn = OpenCon();

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT title, description, date, id FROM events ORDER BY date ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "
        <div class='pb-4'>
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
                <div class='admin-form-delete-text'><strong>DELETE EVENT: \"" . $row['title'] . "\"</strong></div>
                <div class='mb-2'>(WARNING: This action cannot be undone.)</div>
                <div class='btn btn-danger'>
                  <label for='delete'>Delete Event #</label>
                  <input class='w-100 btn btn-danger' type='submit' name='delete' id='delete' value='" . $row['id'] . "' />
                </div>
              </form>
            </td>
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

  </body>
  </html>



<?php
}
?>
