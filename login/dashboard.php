<?php
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

session_start();
require_once '../components/db_connect.php';
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}
if (isset($_SESSION["user"])) {
  header("Location: home.php");
  exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
// change query to $id?
$sql = "SELECT * FROM users WHERE status != '$status'";
$result = mysqli_query($connect, $sql);

$tbody = '';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $tbody .= "<tr>
          <td class='text-center'><img class='img-thumbnail rounded-circle' src='../pictures/" . $row['picture'] . "' alt=" . $row['firstName'] . "></td>
          <td class='text-center'>" . $row['firstName'] . " " . $row['lastName'] . "</td>
          <td class='text-center'>" . $row['phoneNumber'] . "</td>
          <td class='text-center'>" . $row['address'] . "</td>
          <td class='text-center'>" . $row['email'] . "</td>
          <td class='text-center'><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
       </tr>";
  }
} else {
  $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adm-Dashboard</title>
  <?php require_once '../components/boot.php' ?>
  <style type="text/css">
      .img-thumbnail {
          width: 70px !important;
          height: 70px !important;
      }

      td {
          text-align: left;
          vertical-align: middle;
      }

      tr {
          text-align: center;
      }

      .userImage {
          width: 100px;
          height: auto;
      }
  </style>
</head>

<body>
  <div class="container">
      <div class="row">
          <div class="col-2">
              <img class="userImage" src="../pictures/admavatar.png" alt="Adm avatar">
              <p class="">Administrator</p>
              <a class="btn btn-success" href="../animals/index.php">Animals</a>
              <a class="btn btn-danger" href="logout.php?logout">Logout</a>
          </div>
          <div class="col-8 mt-2">
              <p class='h2'>Users</p>
              <table class='table table-striped '>
                  <thead class='table-success'>
                      <tr>
                          <th>Picture</th>
                          <th>Name</th>
                          <th>Phone number</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?= $tbody ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</body>
</html>