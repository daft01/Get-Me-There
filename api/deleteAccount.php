<?php
    include 'dbConnection.php';
    session_start();
    
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    
    $conn = getDatabaseConnection("get_me_there");
    
    if(isset( $_SESSION['email']))
    {
        $sql = "DELETE FROM `users` WHERE email = '" . $_SESSION['email'] ."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        session_destroy();
        echo json_encode(array("message" => true));
    }
    else{
        echo json_encode(array("message" => false));
    }
?>