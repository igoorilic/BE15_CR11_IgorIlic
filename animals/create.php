<?php
session_start();
require_once '../components/db_connect.php';

if (isset($_SESSION['user']) != "") {
  header( "Location: ../home.php");
  exit;
}

if (!isset ($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header( "Location: ../index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <?php require_once '../components/boot.php'?>
       <title>PHP CRUD  |  Add Animal</title>
       <style>
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 60% ;
           }       
       </style>
   </head>
   <body>
       <fieldset>
           <legend class='h2'>Add Animal</legend>
           <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
               <table class='table'>
                   <tr>
                       <th>Location</th>
                       <td><input class='form-control' type="text" name="location"  placeholder="Location" /></td>
                   </tr>    
                   <tr>
                       <th>Description</th>
                       <td><input class='form-control' type="text" name= "description" placeholder="Description" step="any" /></td>
                   </tr>
                   <tr>
                       <th>Size</th>
                       <td><input class='form-control' type="number" name= "size" placeholder="Size" step="any" /></td>
                   </tr>
                   <tr>
                       <th>Age</th>
                       <td><input class='form-control' type="number" name= "age" placeholder="Age" step="any" /></td>
                   </tr>
                   <tr>
                       <th>Hobbies</th>
                       <td><input class='form-control' type="text" name= "hobbies" placeholder="Hobbies" step="any" /></td>
                   </tr>
                   <tr>
                       <th>Breed</th>
                       <td><input class='form-control' type="text" name= "breed" placeholder="Breed" step="any" /></td>
                   </tr>
                   <tr>
                       <th>Picture</th>
                       <td><input class='form-control' type="file" name="picture" /></td>
                   </tr>
                   <tr>
                       <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                       <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>