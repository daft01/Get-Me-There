<?php
  session_start();
?>

<?php
  /*DELETE FROM  `user` WHERE email =  'a'*/
    include 'dbConnection.php';
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    
    $conn = getDatabaseConnection("get_me_there");
    
    $sql = "DELETE FROM `user` WHERE email = " . $_SESSION['email'];
?>