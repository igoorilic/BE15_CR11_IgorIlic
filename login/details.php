<?php 
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

session_start();
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}
if (isset($_SESSION["user"])) {
  header("Location: home.php");
  exit;
}

require_once "../components/db_connect.php";

if (isset($_GET["id"])){
    $id = $_GET ["id"];
    $sql = "SELECT * FROM animals WHERE animalId = {$id}";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php require_once "../components/boot.php" ?>
    <title>Document</title>
</head>
<body>
<div class="side_wrapper">
  <section class="about-dev">
    <header class="profile-card_header">
      <div class="profile-card_header-container">
        <div class="profile-card_header-imgbox">
          <img style="height: 100%" src="../pictures/<?= $row["picture"] ?>" alt="<?= $row["breed"] ?>" />
        </div>
        <h1><?= $row['breed'] ?> <span><?= $row["size"] ?></span></h1>
      </div>
    </header>
    <div class="profile-card_about">
      <h2>All About Me</h2>
      <p>Age: <?= $row["age"] ?></p>
      <p>Hobbies: <?= $row["hobbies"] ?></p>
      <p>Age: <?= $row["age"] ?></p>
      <p>Location: <?= $row["location"] ?></p>
      <p><?= $row["description"] ?></p>
      <div class="d-flex justify-content-center">
      <a href="home.php" class="btn buttoncolor">Home</a>
      </div>
        <div class="social-row">
          <div class="heart-icon" title="No Health Issues">
 

          </div>
          <div class="paw-icon" title="Gets Along Well With Other Animals">

          </div>

        </div>
    </div>
  </section>
</div>
</body>
</html>