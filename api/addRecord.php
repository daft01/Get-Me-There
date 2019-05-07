<?php
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("get_me_there");
    
    $sql = "INSERT INTO `records`(`email`, `origin`, `destination`) VALUES ('" . $_POST["email"] . "', '" . $_POST["origin"] . "', '" . $_POST["destination"] . "')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo json_encode(array());
    
?>