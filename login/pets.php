<?php 
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

session_start();
require_once "../components/db_connect.php";

$sql = "SELECT animals.* FROM animals 
INNER JOIN pet_adoption 
ON animals.animalId = fk_animalId
WHERE fk_userId = {$_SESSION["user"]}";

$result = mysqli_query($connect,$sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/boot.php" ?>
    <title>Reservations</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Adoptions:</h1>
        <div class="d-flex justify-content-evenly mt-4">
        <?php 
            if(is_array($rows)){              
            foreach($rows as $row){ 
        ?>
        <div class="card" style="width: 18rem;">
            <img src="../pictures/<?= $row["picture"] ?>" class="card-img-top" alt="..." height="100%">
            <div class="card-body">
                <p class="card-text text-success"><?= $row["breed"] ?> Adopted </p>
                <a href="home.php" class="btn btn-success">Home</a>
            </div>
    
        </div>
        <?php }
    } ?>
    </div>
    </div>
</body>
</html>