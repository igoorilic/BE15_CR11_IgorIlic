<?php
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

session_start();
require_once '../components/db_connect.php' ;

if (isset($_SESSION['user']) != "" ) {
  header("Location: ../home.php");
  exit;
}

if (! isset($_SESSION['adm']) && !isset($_SESSION['user' ])) {
  header("Location: ../index.php");
  exit;
}

$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $tbody .= "<tr>
          <td><img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'</td>
          <td>" . $row['location'] . "</td>
          <td>"  . $row['description'] . "</td>
          <td>" . $row['size'] .  "</td>
          <td>"  . $row['age'] . "</td>
          <td>" . $row['hobbies'] . "</td>
          <td>"  . $row['breed'] . "</td>
          <td><a href='update.php?id="  . $row['animalId'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
          <a href='delete.php?id="  . $row['animalId'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
          </tr>" ;
  };
} else {
  $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>" ;
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta  charset="UTF-8">
  <meta name="viewport"  content="width=device-width, initial-scale=1.0"> 
  <title>PHP CRUD</title>
   <?php  require_once '../components/boot.php' ?> 
  <style type= "text/css">
      .manageProduct  {
          margin: auto;
      }

      .img-thumbnail {
          width: 70px !important;
          height: 70px !important ;
      }

      td {
          text-align: left;
          vertical-align : middle;
      }

      tr {
          text-align: center;
      }
  </style>
</head>

<body>
  <div class= "manageProduct w-75 mt-3">
      <div class ='mb-3'>
          <a href ="create.php"><button class ='btn btn-primary'type="button">Add product</button></a>
            <a  href ="../login/dashboard.php" ><button  class ='btn btn-success'   type = "button" > Dashboard </button></a> 
      </div > 
      <p class = 'h2' > Products </p > 
      <table class = 'table table-striped'> 
          <thead class = 'table-success'> 
              <tr > 
                  <th> Picture </th> 
                  <th> Location </th> 
                  <th> Description </th> 
                  <th> Size</th> 
                  <th> Age </th> 
                  <th> Hoobies </th> 
                  <th> Breed </th> 
                  <th> Action </th> 

              </tr> 
          </thead> 
          <tbody> 
              <?= $tbody; ?> 
          </tbody> 
      </table> 
  </div> 
</body> 
</html>