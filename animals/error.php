<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <title>Error</title>
       <?php 
       error_reporting(E_ALL); 
       ini_set('display_errors', TRUE);
       
       session_start();
       require_once '../components/db_connect.php';
       
       if (isset($_SESSION['user']) != "") {
         header( "Location: ../home.php");
         exit;
       }
       
       if (!isset ($_SESSION['adm']) && !isset($_SESSION['user'])) {
         header( "Location: ../index.php");
         exit;
       }?>    
   </head>
   <body>
       <div class="container">  
           <div class="mt-3 mb-3">
               <h1>Invalid Request</h1>
           </div>
           <div class="alert alert-warning" role="alert">
               <p>You've made an invalid request. Please <a href="index.php" class="alert-link">go back</a> to index and try again.</p>
           </div>
       </div>
   </body>
</html>