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
require_once "../components/db_connect.php";

if ($_GET['adoptionId']){
    $adoptionId = $_GET ['adoptionId'];
    $sql = "INSERT INTO `pet_adoption` (fk_userId, fk_animalId) VALUES ($_SESSION[user], $adoptionId)";
    $result = mysqli_query($connect, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= require_once "../components/boot.php" ?>
    <title>Adoption</title>
</head>
<body>
    <div>
    <?php 
    echo "<h1>Congratulations to your new family member!</h1>
    <a class='btn btn-success' href='home.php'>Go back</a>";
    ?>
    </div>
</body>
</html>