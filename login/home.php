<?php
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

session_start();
require_once '../components/db_connect.php';

if (isset($_SESSION['adm'])) {
  header("Location: dashboard.php");
  exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
}

$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$rowu = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql= "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) == 0){
  $rows = "No result";
} else {
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome - <?php echo $rowu['firstName']; ?></title>
  <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <?php require_once '../components/boot.php' ?>
  <style>
      .userImage {
          width: 200px;
          height: 200px;
      }
  </style>
</head>

<body>
  <div class="container text-center ">
      <div class="hero">
          <img class="userImage" src="../pictures/<?php echo $rowu['picture']; ?>" alt="<?php echo $rowu['firstName']; ?>">
          <p class="mt-4" style="--bs-bg-opacity: .5;">Hi <?php echo $rowu['firstName']; ?></p>
      </div>      
      <a href="pets.php" class="btn btn-success">Your adoptions</a>
      <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="btn btn-info">Update your profile</a>
      <a href="logout.php?logout" class="btn btn-danger">Sign Out</a>
  </div>

  <!-- cards begin -->

  <div class="container  text-center">
  <a class="btn mt-4 buttoncolor" href="senior.php">Seniors</a>
  <div class="row row-col-4">
  <?php 
  if(is_array($rows)){              
  foreach($rows as $row){ 
  ?>
    <div class="col">
  <div class="side_wrapper">
  <section class="about-dev">
    <header class="profile-card_header">
      <div class="profile-card_header-container">
        <div class="profile-card_header-imgbox">
          <img style="height: 100% !important" src="../pictures/<?= $row["picture"] ?>" alt="error" />
        </div>
        <h1><?= $row["location"] ?></h1>
      </div>
    </header>
    <div class="profile-card_about">
      <p><?= $row["description"] ?></p>
      <footer class="profile-card_footer">
        <div class="social-row">
          <div class="heart-icon" title="No Health Issues">
            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="hearti" width="32" height="32" viewBox="0 0 32 32">
           <path fill="#444" d="M24 12.977c-3.866 0-7 3.158-7 7.055 0 2.22 1.020 4.197 2.609 5.491-2.056 1.525-3.609 2.488-3.609 2.488s-14-8.652-14-15.622c0-4.2 2.583-8.399 7.5-8.399 4.5 0 6.5 4.296 6.5 4.296s1.75-4.296 6.5-4.296 7.416 4.115 7.416 8.399c0 0.958-0.272 1.943-0.716 2.932-1.281-1.436-3.134-2.344-5.2-2.344zM24 13.984c3.313 0 6 2.707 6 6.047s-2.687 6.048-6 6.048c-3.314 0-6-2.708-6-6.048s2.686-6.047 6-6.047zM21 21.039h2v2.016h2v-2.016h2v-2.016h-2v-2.016h-2v2.016h-2v2.016z"></path>
           </svg>

          </div>
          <div class="paw-icon" title="Gets Along Well With Other Animals">
            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="pawi" width="26" height="28" viewBox="0 0 26 28">
                <path fill="#444" d="M12.187 7.375q0 0.938-0.297 1.773t-0.984 1.445-1.641 0.609q-1.188 0-2.156-0.898t-1.437-2.117-0.469-2.359q0-0.938 0.297-1.773t0.984-1.445 1.641-0.609q1.203 0 2.164 0.898t1.43 2.109 0.469 2.367zM6.844 14.922q0 1.25-0.656 2.172t-1.859 0.922q-1.188 0-2.211-0.867t-1.57-2.086-0.547-2.375q0-1.25 0.656-2.18t1.859-0.93q1.188 0 2.211 0.867t1.57 2.094 0.547 2.383zM13 14.5q1.844 0 3.984 1.523t3.578 3.703 1.437 3.977q0 0.719-0.266 1.195t-0.758 0.703-1.008 0.313-1.188 0.086q-1.062 0-2.93-0.703t-2.852-0.703q-1.031 0-3.008 0.695t-3.133 0.695q-2.859 0-2.859-2.281 0-1.344 0.875-2.992t2.18-3.008 2.93-2.281 3.016-0.922zM16.734 11.203q-0.953 0-1.641-0.609t-0.984-1.445-0.297-1.773q0-1.156 0.469-2.367t1.43-2.109 2.164-0.898q0.953 0 1.641 0.609t0.984 1.445 0.297 1.773q0 1.141-0.469 2.359t-1.437 2.117-2.156 0.898zM23.484 9.578q1.203 0 1.859 0.93t0.656 2.18q0 1.156-0.547 2.375t-1.57 2.086-2.211 0.867q-1.203 0-1.859-0.922t-0.656-2.172q0-1.156 0.547-2.383t1.57-2.094 2.211-0.867z"></path>
                </svg>
          </div>

        </div>
        <p><a class="back-to-profile" href="details.php?id=<?=$row['animalId']?>">Full Adoption Profile</a></p>
        <p><a class="back-to-profile" href="adoption.php?adoptionId=<?=$row['animalId']?>">Adopt me!</a></p>
      </footer>
    </div>
  </section>
</div>
</div>
<?php 
      }
      }
?>
</div>
</div>
  <!-- cards end -->
</body>
</html>