<?php
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

session_start();

if (isset($_SESSION[ 'user']) != "") {
  header("Location: ../home.php");
  exit ;
}

if (!isset($_SESSION['adm']) && !isset ($_SESSION['user'])) {
  header("Location: ../index.php");
  exit ;
}

require_once '../components/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "SELECT * FROM animals WHERE animalId = {$id}";
   $result = mysqli_query($connect, $sql);
   if (mysqli_num_rows($result) == 1) {
       $data = mysqli_fetch_assoc($result);
       $location = $data['location'];
       $description = $data['description'];
       $size = $data['size'];
       $age = $data['age'];
       $hobbies = $data['hobbies'];
       $breed = $data['breed'];

       $picture = $data['picture'];
   } else {
       header("location: error.php");
   }
   mysqli_close($connect);
} else {
   header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
   <head>
       <title>Edit Product</title>
       <?php require_once '../components/boot.php'?>
       <style type= "text/css">
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 60% ;
           }  
           .img-thumbnail{
               width: 70px !important;
               height: 70px !important;
           }     
       </style>
   </head>
   <body>
       <fieldset>
           <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt="<?php echo $breed ?>"></legend>
           <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
               <table class="table">
                   <tr>
                       <th>Location</th>
                       <td><input class="form-control" type="text"  name="location" placeholder ="Location" value="<?php echo $location ?>"  /></td>
                   </tr>
                   <tr>
                       <th>Description</th>
                       <td><input class="form-control" type="text"  name="description" placeholder ="Description" value="<?php echo $description ?>"  /></td>
                   </tr>                   <tr>
                       <th>Size</th>
                       <td><input class="form-control" type="text"  name="size" placeholder ="Size" value="<?php echo $size ?>"  /></td>
                   </tr>                   <tr>
                       <th>Age</th>
                       <td><input class="form-control" type="number"  name="age" placeholder ="Age" value="<?php echo $age ?>"  /></td>
                   </tr>                   <tr>
                       <th>Hobbies</th>
                       <td><input class="form-control" type="text"  name="hobbies" placeholder ="Hobbies" value="<?php echo $hobbies ?>"  /></td>
                   </tr>
                   <tr>
                       <th>Breed</th>
                       <td><input class="form-control" type= "text" name="breed" step="any"  placeholder="Breed" value ="<?php echo $breed ?>" /></td>
                   </tr>
                   <tr>
                       <th>Picture</th>
                       <td><input class="form-control" type="file" name= "picture" /></td>
                   </tr>
                   <tr>
                       <input type= "hidden" name= "animalId" value= "<?php echo $data['animalId'] ?>" />
                        <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
                       <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                       <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>