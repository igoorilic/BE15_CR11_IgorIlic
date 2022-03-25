<?php
error_reporting(E_ALL); 
ini_set('display_errors', TRUE);

session_start();
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: index.php");
  exit;
} else if (isset($_SESSION['user']) != "") {
  header("Location: home.php");
} else if (isset($_SESSION['adm']) != "") {
  header("Location: dashboard.php");
}

if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  unset($_SESSION['adm']);
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
}