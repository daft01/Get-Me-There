<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection();
    
    $sql = "INSERT INTO `cars`(`email`, `model`, `year`, `highway`, `city`, `made`) VALUES ('hello123@gmail.com', '". $_POST['model'] . "', " . $_POST['year'] . ", " . $_POST['highway'] . ", " . $_POST['city'] . " , '" . $_POST['make'] . "')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>